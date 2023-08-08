<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            @auth

            <div class="sb-sidenav-menu-heading">Menu Pengguna</div>

            <a class="nav-link" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="/profile">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Profile
            </a>

            {{-- Menu Users --}}
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Pengurusan Pengguna
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('users.index') }}">Senarai Pengguna</a>
                    <a class="nav-link" href="{{ route('users.create') }}">Tambah Pengguna</a>
                </nav>
            </div>

            {{-- Menu Permohonan --}}
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePermohonan" aria-expanded="false" aria-controls="collapsePermohonan">
                <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                Pengurusan Permohonan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePermohonan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('permohonan.index') }}">Senarai Permohonan</a>
                    <a class="nav-link" href="{{ route('permohonan.create') }}">Permohonan Baru</a>
                </nav>
            </div>

            @endauth

            @guest

            <div class="sb-sidenav-menu-heading">Menu Pelawat</div>

            <a class="nav-link" href="{{ route('pinjaman.create') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                Permohonan Pinjaman
            </a>

            <a class="nav-link" href="{{ route('pinjaman.status') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                Semak Status
            </a>

            @endguest

        </div>
    </div>

    @yield('sidebar-additional')

    <div class="sb-sidenav-footer">
        @auth
        <div class="small">Logged in as:</div>
        {{ auth()->user()->name }}
        @endauth

        @guest
        <div class="d-grid gap-2">
            <a href="{{ route('login') }}" class="btn btn-primary">Sila Login</a>
        </div>

        @endguest
    </div>
</nav>
