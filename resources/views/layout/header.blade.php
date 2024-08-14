<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home*') ? 'active' : '' }}" aria-current="page" href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mahasiswa*') ? 'active' : '' }}" href="{{ url('mahasiswa') }}">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dosen*') ? 'active' : '' }}" href="{{ url('dosen') }}" >Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prodi*') ? 'active' : '' }}" href="{{ url('prodi') }}" >Prodi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('berita*') ? 'active' : '' }}" href="{{ url('berita') }}" >Berita</a>
                    </li>
                </ul>
                
                {{-- search --}}
                <form class="d-flex" role="search" method="GET">
                    
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" 
                    value="{{ request('search') }}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="/login" aria-disabled="true">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>