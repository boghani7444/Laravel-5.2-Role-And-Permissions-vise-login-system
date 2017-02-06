<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ URL::asset('assets/admin') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php $permission = \Illuminate\Support\Facades\Auth::user(); ?>
            <li class="{{ $menu == "dashboard" ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            @if($permission->can(['role_permission','manage_roles','create_roles','update_roles','delete_roles','manage_permissions','create_permissions','update_permissions','delete_permissions']))
            <li class="{{ $menu == "role_permission" ? 'active' : '' || $menu == "roles" ? 'active' : '' || $menu == "permissions" ? 'active' : '' }} treeview">
                <a href="javascript:void(0);"><i class="fa fa-cogs"></i> <span>Roles/Permissions</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($permission->can('role_permission'))
                    <li class="{{ $menu == "role_permission" ? 'active' : '' }}"><a href="{{ url('role_permission') }}"><i class="fa fa-list"></i>Panel</a></li>
                    @endif
                    @if($permission->can(['manage_roles','create_roles','update_roles','delete_roles']))
                    <li class="{{ $menu == "roles" ? 'active' : '' }}"><a href="{{ URL::route('roles.index') }}"><i class="fa fa-plus"></i>Roles</a></li>
                    @endif
                    @if($permission->can(['manage_permissions','create_permissions','update_permissions','delete_permissions']))
                    <li class="{{ $menu == "permissions" ? 'active' : '' }}"><a href="{{ URL::route('permissions.index') }}"><i class="fa fa-plus"></i>Permissions</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if($permission->can(['manage_users','create_users','update_users','delete_users']))
            <li class="{{ $menu == "users" ? 'active' : '' }}"><a href="{{ URL::route('users.index') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
            @endif
            <li><a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>