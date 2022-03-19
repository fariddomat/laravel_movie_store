<div class="header-w3-agileits" id="home">
    <div class="inner-header-agile">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a href="/"><span>M</span>ovie <span>S</span>tore</a></h1>
            </div>
            <!-- navbar-header -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li>
                        <form action="" >
                            <input name="Search" class="form-control" type="search" placeholder="Search..." style="margin-top: 5px;">
                        </form>
                </li>
                    <li class="  {{ Request::is('/') ? 'active' : '' }} "><a href="/">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle   {{ Request::is('category/*') ? 'active' : '' }} " data-toggle="dropdown">Category <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <li>
                                @foreach ($categories as $item)
                                <div class="col-sm-4">
                                    <ul class="multi-column-dropdown">
                                        <li><a href="{{ route('movie.category', ['id'=>$item->id]) }}">{{$item->name}}</a></li>
                                    </ul>
                                </div>
                                @endforeach

                                <div class="clearfix"></div>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle   {{ Request::is('country/*') ? 'active' : '' }} " data-toggle="dropdown">Country <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <li>
                                @foreach ($countries as $item)
                                <div class="col-sm-4">
                                    <ul class="multi-column-dropdown">
                                        <li><a href="{{ route('movie.country', ['id'=>$item->id]) }}">{{$item->name}}</a></li>
                                    </ul>
                                </div>
                                @endforeach

                                <div class="clearfix"></div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('index') }}#top">Top Movies</a></li>
                    <li><a href="{{ route('index') }}#latest">Latest Movies</a></li>
                    @auth
                    <li class="dropdown">
                        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                          <div class=""  style="margin-left: 25px;
                          margin-top: 2px;
                          margin-bottom: 2px;">
                            @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
                            <a class="dropdown-item" href="{{ route('admin.home') }}">Dashboard</a>
                            @endif
                            @auth
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('movie.favorite') }}">My favorite</a>
                            @endauth
                            <div class="dropdown-divider"></div>

                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                              </a>
                          </div>
                        </div>
                      </li>
                    @endauth
                </ul>

            </div>
            <div class="clearfix"> </div>
        </nav>

    </div>

</div>
