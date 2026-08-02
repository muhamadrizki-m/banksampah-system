<header id="siteHeader">
    <nav class="wrap">
      <div class="logo">
        <div class="logo-mark">
          <svg viewBox="0 0 32 32" fill="none">
            <path d="M10 18C10 13 13 10 16 10C19 10 22 13 22 18" stroke="#EAF2FE" stroke-width="2.4" stroke-linecap="round" />
            <path d="M16 10V22" stroke="#BFDBFE" stroke-width="2.4" stroke-linecap="round" />
          </svg>
        </div>
        <div class="logo-text">
          Bank Sampah Lestari
          <small>Dikelola warga</small>
        </div>
      </div>
      <div class="navlinks">
        <a href="#tentang">Tentang</a>
        <a href="#cara-kerja">Cara Kerja</a>
        <a href="#harga">Harga Sampah</a>
        <a href="#tukar-poin">Tukar Poin</a>
        <a href="#galeri">Galeri</a>
        <a href="#lokasi">Lokasi</a>
      </div>
      <div class="nav-right">
        <a href="{{ route('login') }}" class="nav-cta">Login</a>
        <button class="burger" id="burgerBtn" aria-label="Buka menu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>
      <div class="mobile-panel" id="mobilePanel">
        <a href="#tentang">Tentang</a>
        <a href="#cara-kerja">Cara Kerja</a>
        <a href="#harga">Harga Sampah</a>
        <a href="#tukar-poin">Tukar Poin</a>
        <a href="#galeri">Galeri</a>
        <a href="#lokasi">Lokasi</a>
        <a href="{{ auth()->check()
        ? (auth()->user()->role === 'admin'
            ? route('admin.dashboard')
            : route('nasabah.dashboard'))
        : route('login') }}"
          class="nav-cta"
          style="text-align:center;margin-top:8px;">
          {{ auth()->check() ? 'Dashboard' : 'Login' }}
        </a>
      </div>
    </nav>
  </header>