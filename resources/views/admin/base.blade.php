@include('admin.layouts.header')
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('my-home') }}" class="site_title"><i class="fa fa-paw"></i> <span>Admin CMS!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
 
            @include('admin.layouts.menu')


            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
           @include('admin.layouts.sidebar')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
      @include('admin.layouts.top-nav')
        <!-- /top navigation -->

        <!-- page content -->
       @yield('content')
        <!-- /page content -->

        <!-- footer content -->
      @include('admin.layouts.footer')
        <!-- /footer content -->
      </div>
    </div>

    @include('admin.layouts.scripts')