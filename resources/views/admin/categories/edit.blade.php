@extends('admin.app')

@section('content')

<div class="tile mb-4">

    <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">Create Category</h4>
            <p class="card-category">add new category</p>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
                @csrf
                @method('put')
                @include('admin.layouts._error')


                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text"
                class="form-control col-md-6" name="name" id="name"  value="{{old('name',$category->name)}}"  aria-describedby="helpId" placeholder="">
                </div>
              <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>

</div>

@endsection
