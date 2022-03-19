@include('layouts._header')

<body>
    <!--/main-header-->
    <!--/banner-section-->

    @isset ($movie)
   <div id="demo-1" class="banner-inner"
   style="background: url({{ asset('/storage/images/' . $movie->image) }}) no-repeat 0px 0px; background-size: cover ;min-height: 300px !important;">
   <div class="banner-inner-dott" style="min-height: 300px !important;">

   @else
   <div id="demo-1" class="banner-inner"
   style="background: url({{ asset('/storage/images/cover.jpg') }}) no-repeat 0px 0px; background-size: cover ;min-height: 300px !important;">
   <div class="banner-inner-dott" style="min-height: 300px !important;">

   @endisset
            <!--/header-w3l-->
            @include("layouts._nav")

            <!--//header-w3l-->
        </div>
    </div>
    <!--/banner-section-->
    <!--//main-header-->
    <!--/banner-bottom-->

    @include("layouts._login_register_bar")

    <!--//banner-bottom-->

    {{-- Content --}}
    @yield('content')

    <!--/footer-bottom-->

    @include('layouts._footer')
