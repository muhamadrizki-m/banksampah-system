<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Bank Sampah</title>
@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/layout.css') }}">
@endpush
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @stack('styles')   
    
</head>

<body>

<div class="topbar">
    <div class="topbar-brand">
        <i class="bi bi-recycle"></i>
        Bank Sampah Admin
    </div>

    <div class="topbar-actions">
        <div class="top-user-wrap" id="userMenuWrap">
            <div class="top-user" id="userMenuToggle">
                <div class="top-user-avatar">
                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                </div>
                <span class="top-user-name">{{ auth()->user()->name }}</span>
                <i class="bi bi-chevron-down"></i>
            </div>

            <div class="user-dropdown" id="userDropdown">
                <div class="dropdown-header">
                    <div class="dh-name">{{ auth()->user()->name }}</div>
                    <div class="dh-email">{{ auth()->user()->email }}</div>
                </div>

                {{-- Sesuaikan route ini dengan route profil kamu jika ada --}}
                <a href="{{ route('profile.edit') ?? '#' }}">
                    <i class="bi bi-person"></i> Profil Saya
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="shell">

    <div class="sidebar">
        <h6>Menu</h6>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/nasabah" class="nav-link {{ request()->is('admin/nasabah*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> Nasabah
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/waste-types" class="nav-link {{ request()->is('admin/waste-types*') ? 'active' : '' }}">
                    <i class="bi bi-trash3"></i> Jenis Sampah
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/waste-transactions" class="nav-link {{ request()->is('admin/waste-transactions*') ? 'active' : '' }}">
                    <i class="bi bi-arrow-left-right"></i> Transaksi Sampah
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/groceries" class="nav-link {{ request()->is('admin/groceries*') ? 'active' : '' }}">
                    <i class="bi bi-gift"></i> Hadiah
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/redemptions" class="nav-link {{ request()->is('admin/redemptions*') ? 'active' : '' }}">
                    <i class="bi bi-ticket-perforated"></i> Penukaran
                </a>
            </li>

        </ul>
    </div>

    <div class="content-area">

        @if(session('success'))
            <div class="alert-success">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>

</div>

<script>
    // ============ Dropdown user menu / logout ============
    const userMenuToggle = document.getElementById('userMenuToggle');
    const userDropdown    = document.getElementById('userDropdown');

    userMenuToggle.addEventListener('click', function(e){
        e.stopPropagation();
        userDropdown.classList.toggle('show');
        userMenuToggle.classList.toggle('open');
    });

    document.addEventListener('click', function(e){
        if(!document.getElementById('userMenuWrap').contains(e.target)){
            userDropdown.classList.remove('show');
            userMenuToggle.classList.remove('open');
        }
    });

    document.addEventListener('keydown', function(e){
        if(e.key === 'Escape'){
            userDropdown.classList.remove('show');
            userMenuToggle.classList.remove('open');
        }
    });
</script>

</body>
</html>