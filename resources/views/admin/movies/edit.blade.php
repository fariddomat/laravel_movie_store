@extends('admin.app')

@section('content')
    <div class="tile mb-4">

        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Upload Movie</h4>
                    <p class="card-category">add new Movie</p>
                </div>
                <div class="card-body">
                    <div class="app-title">
                        <ul class="app-breadcrumb breadcrumb">
                            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        </ul>
                    </div>


                    <div class="tile mb-4">
                        <form id="movie__properties" method="post"
                            action="{{ route('admin.movies.update', ['movie' => $movie->id, 'type' => 'update']) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            @include('admin.layouts._error')


                            {{-- name --}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="movie__name" value="{{ old('name', $movie->name) }}"
                                    class="form-control">
                            </div>

                            {{-- description --}}
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description"
                                    class="form-control">{{ old('description', $movie->description) }}</textarea>
                            </div>

                            {{-- poster --}}
                            <div class="">
                                <label>Poster</label>
                                <input type="file" name="poster" class="form-control-file">
                                <img src="{{ $movie->poster_path }}"
                                    style=" margin-top: 10px; width: 255px; height: 378px;" alt="">
                            </div>

                            {{-- image --}}
                            <div class="">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{ $movie->image_path }}" style=" margin-top: 10px; width: 300px; height: 300;"
                                    alt="">
                            </div>

                            {{-- categories --}}
                            <div class="form-group">
                                <label>Category</label>
                                <select name="categories[]" class="form-control select2" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ in_array($category->id, $movie->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Countries --}}
                            <div class="form-group">
                                <label for="countries">Countries</label>
                                <select class="form-control select" name="country_id" id="countries">
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $movie->country_id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Director --}}
                            <div class="form-group">
                                <label for="director">Director</label>
                                <input type="text" class="form-control" name="director"
                                    value="{{ old('director', $movie->director) }}" id="movie__director"
                                    aria-describedby="helpId" placeholder="">
                            </div>
                            {{-- Writer --}}
                            <div class="form-group">
                                <label for="writer">Writer</label>
                                <input type="text" class="form-control" name="writer"
                                    value="{{ old('writer', $movie->writer) }}" id="writer" aria-describedby="helpId"
                                    placeholder="">
                            </div>
                            {{-- Stars --}}
                            <div class="form-group">
                                <label for="stars">Stars</label>
                                <input type="text" class="form-control" data-role="tagsinput" name="stars" value="<?php
                                    $new_array = [];
                                    if ($movie->stars) {
                                        $new_array = explode(',', $movie->stars);
                                    }
                                    ?>
                     @if (is_array($new_array) && count($new_array)> 0)
                                @foreach ($new_array as $info)
                                    {{ $info }},
                                @endforeach
                                @endif" id="stars" aria-describedby="helpId"
                                placeholder="Star names separated by ,">
                            </div>

                            {{-- year --}}
                            <div class="form-group">
                                <label>Year</label>
                                <input type="number" min="1900" max="{{ date('Y') }}" name="year"
                                    value="{{ old('year', $movie->year) }}" class="form-control">
                            </div>

                            {{-- rating --}}
                            <div class="form-group">
                                <label>Rating</label>
                                <input type="number" min="1" max="5" name="rating"
                                    value="{{ old('rating', $movie->rating) }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                            </div>

                        </form><!-- end of form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
                @endsection
