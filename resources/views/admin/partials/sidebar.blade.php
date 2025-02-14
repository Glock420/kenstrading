  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('dist/img/kenslogo.jpg') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ session('fullname') }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="/admin"
                          class="nav-link {{ Request::is('admin*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

                  {{-- Cars --}}
                  <li class="nav-item">
                      <a href="/cars"
                          class="nav-link {{(Route::current()->getName()) == 'cars' ? 'active' : ''}}">
                          <i class="nav-icon fas fa-car"></i>
                          <p>
                              Cars
                          </p>
                      </a>
                  </li>

                  {{-- Rentals --}}
                  <li class="nav-item">
                      <a href="/rentals" class="nav-link {{(Route::current()->getName()) == 'rentals' ? 'active' : ''}}">
                          <i class="nav-icon fas fa-car-side"></i>
                          <p>
                              Rentals
                          </p>
                      </a>
                  </li>

                  {{-- Customers --}}
                  <li class="nav-item">
                      <a href="/customers"
                          class="nav-link {{(Route::current()->getName()) == 'customers' ? 'active' : ''}}">
                          <i class="nav-icon fa fa-users"></i>
                          <p>
                              Customers
                          </p>
                      </a>
                  </li>

                  @if(session('acctype') == 'Admin')
                  {{-- User Accounts --}}
                  <li class="nav-item">
                      <a href="/accountlist" class="nav-link {{ Request::is('accountlist*') ? 'active' : '' }}">
                      <i class="nav-icon fa fa-user"></i>
                          <p>
                              User Accounts
                          </p>
                      </a>
                  </li>
                  @endif

                  {{-- Logout --}}
                  <li class="nav-item">

                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" class="nav-link">
                          <i class="nav-icon fa fa-location-arrow"></i>
                          <p>
                              Logout
                          </p>
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>

                  </li>


              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
