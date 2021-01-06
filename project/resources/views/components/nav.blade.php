<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" href="/"><img src="{{ asset('logo.svg') }}" alt="Findit logo" width="120"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
    <ul class="navbar-nav">
      @yield('nav')
    </ul>
    <ul class="navbar-nav">
      @if(Auth::check())
        <li class="nav-item dropdown" id="notif">
          <a class="nav-link" v-on:click="notifsRead" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span v-if="notifUnread" class="badge badge-danger">@{{ unReadNotifs }}</span>
            <span v-if="notifUnread" class="sr-only">unread notifications</span>
          </a>
          <div class="p-0 dropdown-menu dropdown-menu-right notifications" aria-labelledby="navbarDropdown">
            <div class="card">
              <div class="card-header">
                Notifications
              </div>
              <ul class="list-group list-group-flush">
                <notif v-for="notif in notifications" v-bind:notification="notif"></notif>
              </ul>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->firstname }}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/user/profile">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout">Logout</a>
          </div>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Log in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
      @endif
    </ul>
  </div>
</nav>