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
    
          <li class="nav-item mr-2">

            @if(app()->getLocale()=='en')
                  <a href="{{ str_replace('/en/', '/ar/', request()->fullUrl()) }}" class="btn btn-warning"><i class="nav-icon fa fa-language"></i>
                               اللغة العربية
                  </a>
            @else
            <a href="{{ str_replace('/ar/', '/en/', request()->fullUrl()) }}" class="btn btn-warning"><i class="nav-icon fa fa-language"></i>
                               English
                  </a>
            @endif
                 
        </li>
        <li class="nav-item">
             <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="nav-icon far fa-user"></i>
                            {{ __('admin.logout') }}
                        </button>
                        {{-- <a href="#" class="nav-link" type="submit"></a> --}}
                    </form>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">--}}
{{--                <i class="fas fa-th-large"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('dashboard')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-Commerce V1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('storage/'. auth()->user()->photo )}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

      

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="
                    @if(app()->getLocale() == 'en')
                    {{url('/en/admin')}}
                    @else
                    {{url('/ar/admin')}}
                    @endif
                    " class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('admin.dashboard') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="
                    @if(app()->getLocale() == 'en')
                    {{url('/en/admin/users')}}
                    @else
                    {{url('/ar/admin/users')}}
                    @endif
                    " class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('admin.users') }}
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="
                    @if(app()->getLocale() == 'en')
                    {{url('/en/admin/roles')}}
                    @else
                    {{url('/ar/admin/roles')}}
                    @endif
                    " class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('admin.roles') }}
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="
                       @if(app()->getLocale() == 'en')
                    {{url('/en/admin/permissions')}}
                    @else
                    {{url('/ar/admin/permissions')}}
                    @endif
                    " class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('admin.permissions') }}
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

              
            

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
