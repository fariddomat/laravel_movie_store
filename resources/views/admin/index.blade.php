@extends('admin.app')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="fa fa-film"></i>
              </div>
              <p class="card-category">Movies</p>
              <h3 class="card-title">{{ $movies }}
                <small></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa  fa-play-circle"></i>
                <a href="{{ route('admin.movies.create') }}" style="position: absolute;
                right: 15px;
                bottom: 5px;">Upload new movie</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="fa fa-users"></i>
              </div>
              <p class="card-category">Users</p>
              <h3 class="card-title">{{$users}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-user"></i>
                @if (Auth::user()->hasRole('super_admin'))
                <a href="{{ route('admin.users.create') }}" style="position: absolute;
                right: 15px;
                bottom: 5px;" >Add new user</a>
                @else
                <a href="#" style="position: absolute;
                right: 15px;
                bottom: 5px; cursor: not-allowed" >Add new user</a>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="fa fa-table"></i>
              </div>
              <p class="card-category">Categories</p>
              <h3 class="card-title">{{$categories}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-table"></i>
                <a href="{{ route('admin.categories.create') }}" style="position: absolute;
                right: 15px;
                bottom: 5px;">Add new category</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa  fa-location-arrow"></i>
              </div>
              <p class="card-category">Countries</p>
              <h3 class="card-title">{{$countries}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-location-arrow"></i>
                <a href="{{ route('admin.countries.create') }}" style="position: absolute;
                right: 15px;
                bottom: 5px;">Add new country</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">High Views Movies</h4>
                <p class="card-category">Top movies</p>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-info">
                    <th>ID</th>
                    <th>Name</th>
                    <th>views</th>
                    <th>categories</th>
                  </thead>
                  <tbody>

                    @foreach ($high_views_movies as $i=>$item)
                    <tr>
                      <td>{{$i+1}} </td>
                      <td><a href="{{ route('movie.show', ['id'=>$item->id]) }}">{{$item->name}}</a></td>
                      <td>{{$item->views}}</td>
                      <td> @foreach ($item->categories as $index => $item)
                        {{ $item->name }}
                        @if ($index > 0)
                            |
                        @endif
                    @endforeach</td>
                    </tr>
                    @endforeach


                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>

    </div>
  </div>
@endsection
