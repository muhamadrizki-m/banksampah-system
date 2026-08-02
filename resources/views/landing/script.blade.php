<script>
    // Header scroll effect
    const header = document.getElementById('siteHeader');
    window.addEventListener('scroll', () => {
      header.classList.toggle('scrolled', window.scrollY > 12);
    });

    // Mobile menu toggle
    const burgerBtn = document.getElementById('burgerBtn');
    const mobilePanel = document.getElementById('mobilePanel');
    burgerBtn.addEventListener('click', () => {
      const isOpen = mobilePanel.classList.toggle('open');
      burgerBtn.classList.toggle('open', isOpen);
      burgerBtn.setAttribute('aria-expanded', isOpen);
    });
    mobilePanel.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        mobilePanel.classList.remove('open');
        burgerBtn.classList.remove('open');
        burgerBtn.setAttribute('aria-expanded', 'false');
      });
    });

    // Active nav link on scroll
    const sections = ['tentang', 'cara-kerja', 'harga', 'tukar-poin', 'galeri', 'lokasi'].map(id => document.getElementById(id));
    const navAnchors = document.querySelectorAll('.navlinks a');
    const setActive = () => {
      let current = null;
      sections.forEach(sec => {
        if (sec && window.scrollY >= sec.offsetTop - 140) current = sec.id;
      });
      navAnchors.forEach(a => {
        a.classList.toggle('active', a.getAttribute('href') === '#' + current);
      });
    };
    window.addEventListener('scroll', setActive);
    setActive();

    // Scroll ke section dengan offset agar tidak tertutup header sticky
    function scrollToSection(target) {
      const headerOffset = header.offsetHeight;
      const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;
      window.scrollTo({
        top: targetPosition,
        behavior: 'smooth'
      });
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        const hash = this.getAttribute('href');
        if (hash.length < 2) return;
        const target = document.querySelector(hash);
        if (!target) return;
        e.preventDefault();
        scrollToSection(target);
        history.pushState(null, '', hash);
      });
    });

    // Jika halaman dibuka langsung dengan hash di URL (mis. #galeri),
    // pastikan posisi scroll tetap memperhitungkan tinggi header
    window.addEventListener('load', () => {
      if (location.hash) {
        const target = document.querySelector(location.hash);
        if (target) {
          setTimeout(() => scrollToSection(target), 0);
        }
      }
    });

    // Carousel
    (function() {
      const track = document.getElementById('carouselTrack');
      const slides = Array.from(track.children);
      const dotsWrap = document.getElementById('carouselDots');
      const prevBtn = document.getElementById('carouselPrev');
      const nextBtn = document.getElementById('carouselNext');
      const carouselEl = document.getElementById('galeriCarousel');
      let index = 0;
      let autoplayTimer;

      slides.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.setAttribute('aria-label', 'Slide ' + (i + 1));
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goTo(i));
        dotsWrap.appendChild(dot);
      });
      const dots = Array.from(dotsWrap.children);

      function update() {
        track.style.transform = 'translateX(-' + (index * 100) + '%)';
        dots.forEach((d, i) => d.classList.toggle('active', i === index));
      }

      function goTo(i) {
        index = (i + slides.length) % slides.length;
        update();
        restartAutoplay();
      }

      function next() {
        goTo(index + 1);
      }

      function prev() {
        goTo(index - 1);
      }

      nextBtn.addEventListener('click', next);
      prevBtn.addEventListener('click', prev);

      function startAutoplay() {
        autoplayTimer = setInterval(next, 5000);
      }

      function restartAutoplay() {
        clearInterval(autoplayTimer);
        startAutoplay();
      }
      startAutoplay();

      carouselEl.addEventListener('mouseenter', () => clearInterval(autoplayTimer));
      carouselEl.addEventListener('mouseleave', startAutoplay);

      // Touch swipe
      let startX = 0;
      track.addEventListener('touchstart', e => {
        startX = e.touches[0].clientX;
      }, {
        passive: true
      });
      track.addEventListener('touchend', e => {
        const diff = e.changedTouches[0].clientX - startX;
        if (Math.abs(diff) > 40) {
          diff < 0 ? next() : prev();
        }
      }, {
        passive: true
      });
    })();
  </script>