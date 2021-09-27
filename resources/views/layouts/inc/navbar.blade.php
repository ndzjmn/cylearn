<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a href="/" a class="navbar-brand">CyLearn</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/about-us">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/contact-us">Contact Us</a>
        </li>
      </ul>
     <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <ul class="navbar-nav me-5 mb-2 mb-lg-0">
        <li class="nav-item dropdown">
        @if (Route::has('login'))
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
            <li><a class="dropdown-item" href="#">Support</a></li>
          </ul>
        </li>
      </ul>
      @endauth
    </div>
  </div>
</nav>
