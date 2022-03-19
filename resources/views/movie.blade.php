@extends('layouts._app')

@section('content')

    <!--//banner-bottom-->

    <!-- breadcrumb -->
    <div class="w3_breadcrumb">
        <div class="breadcrumb-inner">
            <ul>
                <li><a href="/">Home</a><i>//</i></li>

                <li>Movie</li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumb -->
    <!--/content-inner-section-->
    <div class="w3_content_agilleinfo_inner">
        <div class="agile_featured_movies">
            <div class="inner-agile-w3l-part-head">
                <h3 class="w3l-inner-h-title">{{ $movie->name }} </h3>
                <p class="w3ls_head_para">
                    @foreach ($movie->categories as $index => $item)
                        {{ $item->name }}
                        @if ($index < $movie->categories->count() - 1)
                            |
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="latest-news-agile-info">
                <div class="col-md-8 latest-news-agile-left-content">


                    <div class="">
                        <h3 class="title text-success text-uppercase">Description</h3>
                        <p style="margin: 10px;margin-left: 25px;">
                            {{ $movie->description }}
                        </p>
                        <h4 class="text-uppercase side-t-w3l-agile" style="margin-top: 15px">Director <Span
                                class=" text-primary" style="background: transparent;">{{ $movie->director }}</Span>
                        </h4>
                        <h4 class="text-uppercase  side-t-w3l-agile" style="margin-top: 15px">Writer <Span
                                class=" text-primary" style="background: transparent;;">{{ $movie->writer }}</Span>
                        </h4>
                        <h4 class="text-uppercase  side-t-w3l-agile" style="margin-top:15px;margin-bottom: 15px">Stars
                            <Span class=" text-primary" style="background: gold;">
                                <?php
                                $new_array = [];
                                if ($movie->stars) {
                                    $new_array = explode(',', $movie->stars);
                                }
                                ?>
                                @if (is_array($new_array) && count($new_array) > 0)
                                    @foreach ($new_array as $index => $info)
                                        {{ $info }}
                                        @if ($index < count($new_array) - 1)
                                            |
                                        @endif
                                    @endforeach
                                @endif


                            </Span>
                        </h4>
                        <h4 class="text-uppercase  side-t-w3l-agile" style="margin-top: 15px; ">Rating: <Span
                                class=" text-primary" style="background: transparent;;">
                                <div class="block-stars">
                                    <select disabled id="example-1to10" name="Rating" autocomplete="off">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}"
                                                {{ $movie->rating == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </Span></h4>
                        <h4 class="text-uppercase  side-t-w3l-agile" style="margin-top: 15px; ">Users Rating: <Span
                                class=" text-primary" style="background: transparent;;">
                                <div class="block-stars">
                                    <ul class="w3l-ratings">
                                        @for ($i = 1; $i <= $rating_average; $i++)

                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        @endfor
                                        @for ($i = $rating_average; $i < 5; $i++)

                                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                        @endfor
                                    </ul>
                                </div>
                            </Span></h4>
                    </div>



                    <div class="single video_agile_player movie">

                        <div class="video-grid-single-page-agileits movie__bg ">

                            <div class="">
                                <div id="player"></div>
                            </div><!-- end of col -->
                        </div>
                        <h4>{{$movie->name}} | Official Movie </h4>
                        <h5>Views: {{$movie->views}} <i class="fa fa-eye"></i></h5><br>
                    </div>
                    <div class="single-agile-shar-buttons">
                        @auth
                            <a href="{{ route('download', ['id' => $movie->id]) }} " class="btn btn-warning"
                                style="margin-bottom: 7px;"><i class="fa fa-download" style="margin-right: 5px;"></i>
                                Download</a>

                            <a href="#" class="btn btn-danger text-capitalize movie__fav-btn" style="margin-bottom: 7px;">
                                <span
                                    class="fa fa-heart movie__fav-icon movie-{{ $movie->id }} {{ $movie->is_favored ? 'text-danger' : '' }}"
                                    data-movie-id="{{ $movie->id }}"
                                    data-url="{{ route('movies.toggle_favorite', $movie->id) }}" style="margin-right: 5px;">
                                </span>
                                @if ($movie->is_favored)
                                    Remove from favorite
                                @else
                                    Add to favorite
                                @endif
                            </a>

                            <div class="col-lg-12">
                                <div class="form-singel">
                                    <div class="rate-wrapper">
                                        <div class="rate-label" style="padding-top: 8px;">Your
                                            Rate:</div>
                                        <div class="rate">

                                            <form action="{{ route('movies.rateMovie') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <fieldset class="rating2">
                                                    <input class="rating2" type="radio" id="star5" name="rating"
                                                        value="5" {{ $rate == 5 ? 'checked' : '' }} />
                                                    <label for="star5">5 stars</label>
                                                    <input class="rating2" type="radio" id="star4" name="rating"
                                                        value="4" {{ $rate == 4 ? 'checked' : '' }} />
                                                    <label for="star4">4 stars</label>
                                                    <input class="rating2" type="radio" id="star3" name="rating"
                                                        value="3" {{ $rate == 3 ? 'checked' : '' }} />
                                                    <label for="star3">3 stars</label>
                                                    <input class="rating2" type="radio" id="star2" name="rating"
                                                        value="2" {{ $rate == 2 ? 'checked' : '' }} />
                                                    <label for="star2">2 stars</label>
                                                    <input class="rating2" type="radio" id="star1" name="rating"
                                                        value="1" {{ $rate == 1 ? 'checked' : '' }} />
                                                    <label for="star1">1 star</label>
                                                </fieldset>
                                                <input class="rate_id" type="hidden" name="id" required=""
                                                    value="{{ $movie->id }}">
                                                {{-- <span class="review-no">422 reviews</span> --}}
                                                {{-- <br /> --}}
                                                {{-- <button class="btn btn-success" type="submit">Submit rating</button> --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endauth
                        <h5>Share This :</h5>
                        <div class="social-btn-sp" style="float: left">

                            {!! $shareButtons !!}

                        </div>

                    </div>
                    <br>

                    <div class="response" style="margin-top: 60px;">
                        <h4>Responses</h4>
                        @include('replies', ['comments' => $movie->comments, 'movie_id' => $movie->id])

                    </div>
                    <div class="all-comments-info">
                        <h5>LEAVE A COMMENT</h5>
                        <div class="agile-info-wthree-box">
                            @auth
                                <form method="post" action="{{ route('comment.add') }}">
                                    @csrf
                                    <div class="col-md-12 form-info">
                                        <input type="hidden" name="movie_id" value="{{ $movie->id }}" />
                                        <textarea placeholder="Message" name="comment" required=""></textarea>
                                        <input type="submit" value="SEND">
                                    </div>
                                    <div class="clearfix"> </div>
                                </form>
                            @else
                                <h5 class="" style="color: #fe423f">Login to add comments.</h5>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="col-md-4 latest-news-agile-right-content">
                    <h4 class="side-t-w3l-agile">Recommended <span>Movies</span></h4>
                    <div class="w3ls-recent-grids">
                        @foreach ($related_movies as $item)
                            <div class="w3l-recent-grid">
                                <div class="wom">
                                    <a href="{{ route('movie.show', ['id' => $item->id]) }}"><img
                                            src="{{ $item->poster_path }}" alt=" " class="img-responsive"></a>
                                </div>
                                <div class="wom-right">
                                    <h5><a href="{{ route('movie.show', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                    </h5>
                                    <p>{{ $item->description }}.</p>
                                    <ul class="w3l-sider-list">
                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i>On {{ $item->year }}
                                        </li>
                                        <li><i class="fa fa-eye" aria-hidden="true"></i> {{ $item->views }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        @endforeach
                    </div>



                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <!--//content-inner-section-->

    @push('scripts')


        <script>
            @if ($movie->path== 'public/movies_upload/1.mp4')
                var file =
                "[Auto]{{ Storage::url('public/movies/1/1_0_100.m3u8') }}," +
                "[360]{{ Storage::url('public/movies/1/1_0_100.m3u8') }}," +
                "[480]{{ Storage::url('public/movies/1/1_1_250.m3u8') }}," +
                "[720]{{ Storage::url('public/movies/1/1_2_500.m3u8') }}";
            @else
                var file =
                "[Auto]{{ Storage::url('movies/' . $movie->id . '/' . $movie->id . '_0_100.m3u8') }}," +
                "[360]{{ Storage::url('movies/' . $movie->id . '/' . $movie->id . '_0_100.m3u8') }}," +
                "[480]{{ Storage::url('movies/' . $movie->id . '/' . $movie->id . '_1_250.m3u8') }}," +
                "[720]{{ Storage::url('movies/' . $movie->id . '/' . $movie->id . '_2_500.m3u8') }}";
            @endif
            var player = new Playerjs({
                id: "player",
                file: file,
                poster: "{{ $movie->image_path }}",
                default_quality: "Auto",
            });

            let viewsCounted = false;

            function PlayerjsEvents(event, id, data) {
                if (event == "duration") {
                    duration = data;
                }
                if (event == "time") {
                    time = data;
                }
                let percent = (time / duration) * 100;

                if (percent > 10 && !viewsCounted) {
                    $.ajax({
                        url: "{{ route('movies.increment_views', $movie->id) }}",
                        method: 'POST',
                        success: function() {
                            let views = parseInt($('#movie__views').html());
                            $('#movie__views').html(views + 1);
                            console.log('+');
                        },
                    }); //end of ajax call
                    viewsCounted = true;
                } //end of if
            } //end of player event function
        </script>
    @endpush


    @push('scripts')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('input[type=radio][name=rating]').change(function(e) {
                e.preventDefault();
                // alert($('.rating:checked').val());
                $.ajax({
                    type: 'POST',
                    url: '/movies/rateMovie',
                    data: {
                        rating: $('.rating2:checked').val(),
                        id: $('.rate_id').val(),
                    },
                    success: function(response) {
                        alert("Your rate saved !");
                    }
                });
            });
        </script>

        <script>
            $(function() {
                function ratingEnable() {
                    $('#example-1to10').barrating('show', {
                        theme: 'bars-1to10'
                    });


                }

                ratingEnable();
            });
        </script>
    @endpush

    <!--/footer-bottom-->

@endsection
