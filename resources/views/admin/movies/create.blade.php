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
                        <div class="d-flex justify-content-center align-items-center flex-column"
                            style="height: 25vh; border: 1px solid black; cursor: pointer; display: {{ $errors->any() ? 'none' : '' }} !important;"
                            onclick="document.getElementById('movie__file-input').click()" id="movie__input-wrapper">
                            <i class="fa fa-video-camera fa-2x" aria-hidden="true"></i>
                            <p>click to upload</p>
                        </div>
                        <input type="file" name="" data-movie-id="{{ $movie->id }}"
                            data-url="{{ route('admin.movies.store') }}" id="movie__file-input" style="display: none">

                        <form id="movie_properties"
                            action="{{ route('admin.movies.update', ['movie' => $movie->id, 'type' => 'publish']) }}"
                            method="POST" style="display: {{ $errors->any() ? 'block' : 'none' }}"
                            enctype="multipart/form-data">

                            @csrf
                            @method('put')
                            @include('admin.layouts._error')
                            {{-- progress bar --}}
                            <div class="form-group" style="display: {{ $errors->any() ? 'none' : '' }} !important;">
                                <label id="movie__upload-status">Uploading</label>
                                <div class="progress" style="height: 25px !important;">
                                    <div class="progress-bar" id="movie__upload-progress" role="progressbar" style="background-color: rgb(13, 219, 13) !important;"></div>
                                </div>
                            </div>
                            {{-- Name --}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $movie->name) }}" id="movie__name" aria-describedby="helpId"
                                    placeholder="">
                            </div>
                            {{-- description --}}
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description"
                                    rows="3">{{ old('description') }}</textarea>
                            </div>
                            {{-- poster --}}
                            <div class="">
                                <label for="poster">Poster</label>
                                <input type="file" class="form-control-file" name="poster" value="{{ old('poster') }}"
                                    id="poster" placeholder="" aria-describedby="fileHelpId">
                            </div>
                            {{-- image --}}
                            <div class="">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" name="image" value="{{ old('image') }}"
                                    id="image" placeholder="" aria-describedby="fileHelpId">
                            </div>
                            {{-- Categories --}}
                            <div class="form-group">
                                <label for="categories">Categories</label>
                                <select multiple class="form-control select2" name="categories[]" id="categories">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ in_array($category->id, $movie->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $category->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            {{-- Countries --}}
                            <div class="form-group">
                                <label for="countries">Countries</label>
                                <select class="form-control select" name="country_id" id="countries">
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Director --}}
                            <div class="form-group">
                                <label for="director">Director</label>
                                <input type="text" class="form-control" name="director"
                                    value="{{ old('director', $movie->director) }}" id="movie__director" aria-describedby="helpId"
                                    placeholder="">
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
                                <input type="text" class="form-control"  data-role="tagsinput" name="stars"
                                    value="{{ old('stars', $movie->stars) }}" id="stars" aria-describedby="helpId"
                                    placeholder="Star names separated by ,">
                            </div>
                            {{--  data-role="tagsinput" --}}
                            {{-- year --}}
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="number"  min="1900" max="{{ date('Y') }}"  class="form-control" name="year" value="{{ old('year') }}"
                                    id="year" aria-describedby="helpId" placeholder="">
                            </div>
                            {{-- rating --}}
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <input type="text" class="form-control" name="rating" value="{{ old('rating') }}"
                                    id="rating" min="1" max="5" aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="form-group">
                                <button id="movie__submit-btn"
                                    style="display: {{ $errors->any() ? 'block' : 'none' }} !important;" type="submit"
                                    class="btn btn-primary"><i class="fa fa-plus"
                                        aria-hidden="true"></i> Publish</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
