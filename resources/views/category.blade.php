@extends('layouts._app')

@section('content')

    <!-- breadcrumb -->
    <div class="w3_breadcrumb">
        <div class="breadcrumb-inner">
            <ul>
                <li><a href="/">Home</a><i>//</i></li>

                <li>Category</li>
            </ul>
        </div>
    </div>


    <!--/content-inner-section-->
    <div class="w3_content_agilleinfo_inner">
        <div class="agile_featured_movies">

            <h3 class="agile_w3_title">{{$category->name}} <span>Movies</span>
                <form action="" style="float: revert;
                max-width: 250px;
                margin-top: 25px;" >
                <input name="Search2" class="form-control form-category" type="search" placeholder="Search by category" style="margin-top: 5px;">
                <input type="hidden" id="selector-category" name="selector-category" value="{{$category->id}}">
            </form>
            </h3>
            <!--/requested-movies-->
            <div class="wthree_agile-requested-movies">
                @if ($movies->count() > 0)
                    @foreach ($movies as $item)
                        <div class="col-md-2 w3l-movie-gride-agile requested-movies">
                            <a href="{{ route('movie.show', ['id' => $item->id]) }}" class="hvr-sweep-to-bottom"><img
                                    src="{{ $item->poster_path }}" title="Movies Pro" class="img-responsive" alt=" ">
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a href="{{ route('movie.show', ['id' => $item->id]) }}">{{ Str::of($item->name)->limit(25) }}</a>
                                    </h6>
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>{{ $item->views }} <i class="fa fa-eye"></i></p>
                                    <div class="block-stars">
                                        <ul class="w3l-ratings">
                                            @for ($i = 1; $i <= $item->rating; $i++)
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            @endfor
                                            @for ($i = $item->rating; $i < 5; $i++)

                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <h2 style="margin: 0 auto"><i class="fa fa-film"></i> No movies to show</h2>
                @endif

                <div class="clearfix"></div>
            </div>
            <!--//requested-movies-->
            <div class="blog-pagenat-wthree">
                <ul>
                    {{$movies->links()}}

                </ul>

                <!--//requested-movies-->
                <h3 class="agile_w3_title"> Top  <span> Movies</span></h3>
                <!--/movies-->
                <div class="w3_agile_latest_movies">

                    <div id="owl-demo" class="owl-carousel owl-theme">
                        @foreach ($top_movies as $item)
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                                <a href="{{ route('movie.show', ['id'=>$item->id]) }}" class="hvr-sweep-to-bottom"><img src="{{$item->poster_path}}"
                                        title="Movies Pro" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle-o"
                                            aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="{{ route('movie.show', ['id'=>$item->id]) }}">{{Str::of($item->name)->limit(25)}} </a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>{{$item->views}} <i class="fa fa-eye"></i></p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                @for ($i=1;$i<=$item->rating ;$i++)
                                                <li><a href="#"><i class="fa fa-star"
                                                    aria-hidden="true"></i></a></li>
                                                @endfor
                                                @for ($i=$item->rating;$i<5 ;$i++)

                                                <li><a href="#"><i class="fa fa-star-o"
                                                    aria-hidden="true"></i></a></li>
                                                @endfor
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben one">
                                    <p>TOP</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <!--//movies-->
            </div>
        </div>
    </div>
    <!--//content-inner-section-->


    @endsection
