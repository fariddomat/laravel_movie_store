@extends('admin.app')

@section('content')


    <div class="tile mb-4">
        <div class="row">
            <div class="col-12">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" id="search" autofocus
                                    value="{{ request()->search }}" aria-describedby="helpId" placeholder="Search">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>
                                Search</button>
                            @if (auth()->user()->hasPermission('create_categories'))

                                <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary"><i
                                        class="fa fa-plus" aria-hidden="true"></i> Add</a>

                            @else
                                <a href="#" class="btn btn-outline-secondary disabled" disabled><i class="fa fa-plus"
                                        aria-hidden="true"></i> Add</a>

                            @endif
                        </div>
                    </div>
                </form>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Categories</h4>
                        <p class="card-category"> </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if ($categories->count() > 0)
                            
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>Movies Count</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $index => $category)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->movies_count }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermission('update_categories'))

                                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                            class="btn btn-outline-warning" style="display: inline-block"><i
                                                                class="fa fa-edit"></i> Edit</a>
                                                    @else
                                                        <a href="#" class="btn btn-outline-warning disabled" disabled
                                                            style="display: inline-block"><i class="fa fa-edit"></i>
                                                            Edit</a>
                                                    @endif
                                                    @if (auth()->user()->hasPermission('delete_categories'))

                                                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                            method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-outline-danger delete"
                                                                style="display: inline-block"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i> Delete</button>
                                                        </form>
                                                    @else
                                                        <button class="btn btn-outline-danger  disabled" disabled
                                                            style="display: inline-block"><i class="fa fa-trash"
                                                                aria-hidden="true"></i> Delete</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="text-center m-auto">{{ $categories->appends(request()->query())->links() }}
                                </div>
                            @else
                                <h3 style="font-weight: 400">Sorry no record found !</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endsection
