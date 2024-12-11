<nav class="navbar navbar-expand-lg bg-primary text-white">
  <div class="container-fluid py-3 px-5">
    <a class="navbar-brand fw-bold text-white" href="/">PERPUSONE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-white"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('/') ? 'active bg-light text-dark rounded' : '' }}" aria-current="page" href="/">Beranda</a>
        </li>
        {{-- @dd( Request::route()) --}}
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('books*') ? 'active bg-light text-dark rounded' : '' }}" href="/books">Koleksi</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('booking*') ? 'active bg-light text-dark rounded' : '' }}" href="/booking">Peminjaman</a>
        </li>
        @endauth
      </ul>

      @auth
      <div class="dropdown-center">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ auth()->user()->name }}
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Profil</a></li>
          <li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item">Logout</button>
            </form>
          </li>
        </ul>
      </div>
      @else
      <a href="/login" class="btn btn-warning mx-2">Login <i class="bi bi-box-arrow-in-right"></i></a>
      @endauth
    </div>
  </div>
</nav>

<style>
  .navbar {
    background: linear-gradient(90deg, #007bff, #0056b3);
  }

  .navbar-brand {
    font-size: 1.5rem;
    letter-spacing: 1px;
  }

  .nav-link {
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .nav-link:hover {
    background-color: #ffffff;
    color: #007bff !important;
    border-radius: 5px;
  }

  .dropdown-menu {
    background-color: #f8f9fa;
  }

  .dropdown-item:hover {
    background-color: #007bff;
    color: #fff;
  }
</style>
