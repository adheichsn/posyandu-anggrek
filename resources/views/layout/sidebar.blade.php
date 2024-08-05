<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <img class="w-100 rounded float-left" src="{{ asset('img/logo.jpg') }}" alt="Logo Posyandu">
        </div>
        <div class="sidebar-brand-text mx-3">Posyandu Anggrek1 </div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    @if (Auth::user()->role != 'bendahara')
        <hr class="sidebar-divider">
        {{-- User --}}
        <div class="sidebar-heading">
            User
        </div>
        <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-user-alt"></i>
                @if (Auth::user()->role == 'user' || Auth::user()->role == 'ketua_rt')
                    <span>Profile {{ Auth::user()->username }}</span>
                @else
                    <span>Data Semua User</span>
                @endif
            </a>

        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Main Menu
        </div>
        <li class="nav-item {{ Request::is('anggota') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('anggota.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Masyarakat</span></a>
        </li>
        {{-- <li class="nav-item {{ Request::is('peralatan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('peralatan.index') }}">
                <i class="fas fa-fw fa-medkit"></i>
                <span>Data Peralatan</span></a>
        </li> --}}
        <li class="nav-item {{ Request::is('jadwal') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('jadwal.index') }}">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Data Jadwal</span></a>
        </li>
        <li class="nav-item {{ Request::is('pelayanan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pelayanan.index') }}">
                <i class="fas fa-fw fa-ambulance"></i>
                <span>Data Pelayanan</span></a>
        </li>
    @endif
    @if (Auth::user()->role == 'bendahara' || Auth::user()->role == 'admin' || Auth::user()->role == 'ketua_rt')
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Keuangan
        </div>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('keuangan.index', ['type' => 'in']) }}">
                <i class="fas fa-fw fa-cash-register"></i>
                <span>Data Pemasukan</span></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('keuangan.index', ['type' => 'out']) }}">
                <i class="fas fa-fw fa-money-bill"></i>
                <span>Data Pengeluaran</span></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('keuangan.index') }}">
                <i class="fas fa-fw fa-file"></i>
                <span>Laporan Keuangan</span></a>
        </li>
    @endif


    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
