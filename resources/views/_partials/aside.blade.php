
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('img/scale.png')}}" alt="Causelist" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('home')}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt text-yellow"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('causelist.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-file text-red"></i>
                  <p>
                    Cases
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('courts.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home text-purple"></i>
                  <p>
                    Courts
                  </p>
                </a>
              </li>



          <li class="nav-item">
          <a href="{{ route('judges.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users text-blue"></i>
              <p>
                Judges
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('users.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user text-pink"></i>
              <p>
               Users
              </p>
            </a>
          </li>

          <li class="nav-item">



            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
               Logout
              </p>

            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
