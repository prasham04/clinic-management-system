 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('AdminAssets')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">VCare</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.major.index') }}" class="nav-link {{ (request()->is('admin/majors*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                Majors
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.doctor.index') }}" class="nav-link {{ (request()->is('admin/doctors*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Doctors
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.booking.index') }}" class="nav-link {{ (request()->is('admin/bookings*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Bookings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ (request()->is('admin/users*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.contact.index') }}" class="nav-link {{ (request()->is('admin/contacts*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Contacts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.settings.edit') }}" class="nav-link {{ (request()->is('admin/settings*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>