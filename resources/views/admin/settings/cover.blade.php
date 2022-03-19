@extends('admin.app')

@section('content')
    <div class="tile mb-4">

        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Cover</h4>
                    <p class="card-category">Change Home Screen covers</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.change_cover') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @include('admin.layouts._error')



                        <div class="col-md-4">
                            <label>Cover 1</label>
                            <input type="file" name="cover4" class="form-control-file">
                            <img src="{{asset('home/images/cover4.jpg')}}"
                                style=" margin-top: 10px; width: 255px; height: 378px;" alt="">
                        </div>
                        <div class="col-md-4">
                            <label>Cover 2</label>
                            <input type="file" name="cover3" class="form-control-file">
                            <img src="{{asset('home/images/cover3.jpg')}}"
                                style=" margin-top: 10px; width: 255px; height: 378px;" alt="">
                        </div>
                        <div class="col-md-6">
                            <label>Cover 3</label>
                            <input type="file" name="cover2" class="form-control-file">
                            <img src="{{asset('home/images/cover2.jpg')}}"
                                style=" margin-top: 10px; width: 255px; height: 378px;" alt="">
                        </div>
                        <div class="col-md-6">
                            <label>Cover 4</label>
                            <input type="file" name="cover1" class="form-control-file">
                            <img src="{{asset('home/images/cover1.jpg')}}"
                                style=" margin-top: 10px; width: 255px; height: 378px;" alt="">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
            @endsection
