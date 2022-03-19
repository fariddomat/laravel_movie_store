
    <div class="sidebar" data-color="purple" data-background-color="white" >

      <div class="logo"><a href="{{ route('admin.home') }}" class="simple-text logo-normal">
          Dashboard
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}  ">
            <a class="nav-link" href="{{ route('admin.home') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          @if (Auth::user()->hasRole('super_admin') )
          <li class="nav-item  {{ Request::is('admin/users*') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
          @endif

          <li class="nav-item   {{ Request::is('admin/movies*') ? 'active' : '' }} ">
            <a class="nav-link " href="{{ route('admin.movies.index') }}">
              <i class="fa fa-film"></i>
              <p>Movies</p>
            </a>
          </li>

          <li class="nav-item   {{ Request::is('admin/categories*') ? 'active' : '' }} ">
            <a class="nav-link " href="{{ route('admin.categories.index') }}">
              <i class="material-icons">content_paste</i>
              <p>Categories</p>
            </a>
          </li>

          <li class="nav-item   {{ Request::is('admin/countries*') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.countries.index') }}">
              <i class="material-icons">location_ons</i>
              <p>Countries</p>
            </a>
          </li>
          <li class="nav-item   {{ Request::is('admin/settings/cover*') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.setting.cover') }}">
              <i class="material-icons">images</i>
              <p>Home Cover</p>
            </a>
          </li>
          <li class="nav-item   {{ Request::is('admin.settings.reports*') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.settings.reports') }}">
              <i class="material-icons">reports</i>
              <p>Reports</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel">
