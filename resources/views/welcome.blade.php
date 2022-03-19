@include("layouts._header")

<body>
    <!--/main-header-->
    <!--/banner-section-->
    <div id="demo-1"
        data-zs-src='["{{ asset('home/images/cover4.jpg') }}", "{{ asset('home/images/cover3.jpg') }}", "{{ asset('home/images/cover2.jpg') }}","{{ asset('home/images/cover1.jpg') }}"]'
        data-zs-overlay="dots">
        <div class="demo-inner-content">
            <!--/header-w3l-->

            @include('layouts._nav')

            <!--//header-w3l-->
            <!--/banner-info-->
            <div class="baner-info">
                <h3>Latest <span>On</span>Line <span>Mo</span>vies</h3>
                <h4>In space no one can hear you scream.</h4>
                <a class="" style="background-color: #fe423f;
                color: white;
                padding: 10px;
                border-radius: 7px;" href="#top">
                    Explore Movie
                </a>
            </div>
            <!--/banner-ingo-->
        </div>
    </div>
    <!--/banner-section-->
    <!--//main-header-->
    <!--/banner-bottom-->

    @include('layouts._login_register_bar')



    <!--/content-inner-section-->
    <div class="w3_content_agilleinfo_inner" id="top">
        <div class="agile_featured_movies">
            <!--/agileinfo_tabs-->
            <div class="agileinfo_tabs">
                <!--/tab-section-->
                <div id="horizontalTab">
                    <ul class="resp-tabs-list" style="width: max-content;">
                        <li>Top movies</li>

                    </ul>
                    <div class="resp-tabs-container">
                        <div class="tab1">
                            <div class="tab_movies_agileinfo">
                                <div class="w3_agile_featured_movies">
                                    <div class="col-md-5 video_agile_player">
                                        <div class="video-grid-single-page-agileits">
                                            <div data-video="f2Z65fobH2I" id="video">
                                                <a href="{{ route('movie.show', ['id'=>$top_movies[0]->id]) }}">
                                                    <img
                                                    src="{{ $top_movies[0]->image_path }}" alt=""
                                                    class="img-responsive" style="max-height: 355px;" />
                                                </a> </div>
                                        </div>



                                        <div class="player-text">
                                            <p class="fexi_header">{{ $top_movies[0]->name }}</p>
                                            <p class="fexi_header_para"><span class="conjuring_w3">Story
                                                    Line<label>:</label></span>{{ $top_movies[0]->description }}....</p>
                                            <p class="fexi_header_para"><span>Release
                                                    On<label>:</label></span>{{ $top_movies[0]->year }} </p>
                                            <p class="fexi_header_para">
                                                <span>Category<label>:</label> </span>
                                                @foreach ($top_movies[0]->categories as $index => $item)
                                                    <a href="genre.html">{{ $item->name }}</a>
                                                    @if ($index < $top_movies[0]->categories->count() - 1)
                                                        |
                                                    @endif

                                                @endforeach
                                            </p>
                                            <p class="fexi_header_para fexi_header_para1"><span>Star
                                                    Rating<label>:</label></span>
                                                @for ($i = 1; $i <= $top_movies[0]->rating; $i++)
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                @endfor
                                                @for ($i = $top_movies[0]->rating; $i < 5; $i++)
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                @endfor
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-7 wthree_agile-movies_list">
                                        @foreach ($top_movies as $index => $item)
                                            @if ($index > 0)
                                                <div class="w3l-movie-gride-agile " >
                                                    <a href="{{ route('movie.show', ['id' => $item->id]) }}"
                                                        class="hvr-sweep-to-bottom"><img
                                                            src="{{ $item->poster_path }}" title="Movies Pro"
                                                            class="img-responsive" alt=" ">
                                                        <div class="w3l-action-icon"><i class="fa fa-play-circle-o"
                                                                aria-hidden="true"></i></div>
                                                    </a>
                                                    <div class="mid-1 agileits_w3layouts_mid_1_home " >
                                                        <div class="w3l-movie-text">
                                                            <h6><a
                                                                    href="{{ route('movie.show', ['id' => $item->id]) }}">{{ Str::of($item->name)->limit(16) }}
                                                                </a></h6>
                                                        </div>
                                                        <div class="mid-2 agile_mid_2_home">
                                                            <p>{{$item->views}} <i class="fa fa-eye"></i></p>
                                                            <div class="block-stars">
                                                                <ul class="w3l-ratings">
                                                                    @for ($i = 1; $i <= $item->rating; $i++)

                                                                        <li><a href="#"><i class="fa fa-star"
                                                                                    aria-hidden="true"></i></a></li>
                                                                    @endfor
                                                                    @for ($i = $item->rating; $i < 5; $i++)

                                                                        <li><a href="#"><i class="fa fa-star-o"
                                                                                    aria-hidden="true"></i></a></li>
                                                                    @endfor
                                                                </ul>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="ribben">
                                                        <p>{{$item->views}} <i class="fa fa-eye"></i></p>
                                                    </div> --}}
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="cleafix"></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!--//tab-section-->
            <h3 class="agile_w3_title" id="latest"> Latest <span>Movies</span></h3>
            <!--/movies-->
            <div class="w3_agile_latest_movies">

                <div id="owl-demo" class="owl-carousel owl-theme">
                    @foreach ($latest_movies as $item)
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                                <a href="{{ route('movie.show', ['id' => $item->id]) }}"
                                    class="hvr-sweep-to-bottom"><img src="{{ $item->poster_path }}"
                                        title="Movies Pro" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href={{ route('movie.show', ['id' => $item->id]) }}">{{ Str::of($item->name)->limit(18) }}
                                            </a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>{{$item->views}} <i class="fa fa-eye"></i></p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                @for ($i = 1; $i <= $item->rating; $i++)

                                                    <li><a href="#"><i class="fa fa-star"
                                                                aria-hidden="true"></i></a></li>
                                                @endfor
                                                @for ($i = $item->rating; $i < 5; $i++)

                                                    <li><a href="#"><i class="fa fa-star-o"
                                                                aria-hidden="true"></i></a></li>
                                                @endfor

                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben one">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!--//movies-->



                <!--//top-movies-->
            </div>
        </div>
        <!--//content-inner-section-->

        <!--/footer-bottom-->

        @include('layouts._footer')
