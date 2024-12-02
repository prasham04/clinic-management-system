@include('admin.inc.head')


<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('AdminAssets')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
  
    @include('admin.inc.navbar')

    @include('admin.inc.breadcrumb')
  
   @include('admin.inc.sidebar')

   @yield('content')

   
      @include('admin.inc.footer')
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
<!-- ./wrapper -->


@include('admin.inc.scripts')