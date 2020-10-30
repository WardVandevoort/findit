<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
    <ul class="navbar-nav">
      @yield('nav')
    </ul>
    <ul class="navbar-nav">
      @if(Auth::check())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->firstname }}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/user/profile">Profiel</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout">Afmelden</a>
          </div>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Inloggen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Registreren</a>
        </li>
      @endif
    </ul>
  </div>
</nav>