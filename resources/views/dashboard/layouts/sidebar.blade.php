<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ url('/dashboard') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>

            {{-- untuk memberi authorization --}}
            {{-- @can('admin')  --}}
            
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('dashboard-mahasiswa*') ? 'active' : '' }}" href="{{ url('/dashboard-mahasiswa') }}">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Mahasiswa
                </a>
            </li>
            {{-- @endcan --}}


            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard-dosen*') ? 'active' : '' }}" href="{{ url('/dashboard-dosen') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Dosen
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard-prodi*') ? 'active' : '' }}" href="{{ url('/dashboard-prodi') }}">
                    <span data-feather="share-2" class="align-text-bottom"></span>
                    Prodi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard-kategori*') ? 'active' : '' }}" href="{{ url('/dashboard-kategori') }}">
                    <span data-feather="star" class="align-text-bottom"></span>
                    Kategori
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('dashboard-berita*') ? 'active' : '' }}" href="{{ url('/dashboard-berita') }}">
                    <span data-feather="heart" class="align-text-bottom"></span>
                    Berita
                </a>
            </li>

            {{-- @can('admin') --}}
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('dashboard-user*') ? 'active' : '' }}" href="{{ url('/dashboard-user') }}">
                    <span data-feather="key" class="align-text-bottom"></span>
                    User
                </a>
            </li>

            {{-- @endcan --}}


            
        </ul>

        {{-- <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Year-end sale
                </a>
            </li>
        </ul> --}}
    </div>
</nav>
