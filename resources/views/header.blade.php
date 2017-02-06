<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>MS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>School Management</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ URL::asset('assets/admin') }}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ $login_user['name'] }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ URL::asset('assets/admin') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                            <p>
                                {{ $login_user['name'] }}
                                <small>Member since {{ date('M. Y',strtotime($login_user['created_at'])) }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="javascript:void(0);" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <a class="btn btn-default btn-flat" href="{{ url('/auth/logout') }}">Sign out</a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->

            </ul>
        </div>
    </nav>
</header>