<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Kampusku</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- <form class="flex-grow-1" action="/dashboard-mahasiswa" method="GET">
      <input class="form-control form-control-dark  w-100 rounded-0 border-0" name="search" type="search" placeholder="Search" aria-label="Search">
    </form> --}}

    <ul class="navbar-nav">
      <li class="nav-item px-3">
        <form action="/logout" method="post">
        @csrf
        <button class="nav-link" type="submit">Log out</button>
      </form>
      </li>
    </ul>
    
  </header>