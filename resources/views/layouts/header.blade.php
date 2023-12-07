
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        @if(Auth::check())
        <a class="nav-link" href="{{url('/logout')}}" role="button">
          <i class="fas fa-sign-out-alt"></i> Log out
        </a>
        @else
        <a class="nav-link" href="{{url('/login')}}" role="button">
          <i class="fas fa-sign-in-alt"></i> Login
        </a>
        @endif
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->