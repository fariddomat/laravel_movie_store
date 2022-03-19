<div class="contact-w3ls" id="contact">
    <div class="footer-w3lagile-inner">

        <div class="footer-grids w3-agileits">
            <div class="col-md-2 footer-grid">
                <h4>Release</h4>
                <ul>
                    <li><a href="#" title="Release 2016">2021</a></li>
                    <li><a href="#" title="Release 2015">2020</a></li>
                    <li><a href="#" title="Release 2014">2019</a></li>
                    <li><a href="#" title="Release 2013">2018</a></li>
                    <li><a href="#" title="Release 2012">2017</a></li>
                    <li><a href="#" title="Release 2011">2016</a></li>
                </ul>
            </div>
            <div class="col-md-2 footer-grid">
                <h4>Movies</h4>
                <ul>
                    @for ($i = 0; $i < 6; $i++)

                        <li><a
                                href="{{ route('movie.category', ['id' => $categories[$i]->id]) }}">{{ $categories[$i]->name }}</a>
                        </li>
                    @endfor

                </ul>
            </div>


            <div class="col-md-2 footer-grid">
                <h4>Review Movies</h4>
                <ul class="w3-tag2">
                    @foreach ($categories as $item)

                        <li><a href="{{ route('movie.category', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
                    @endforeach

                </ul>


            </div>
            <div class="col-md-2 footer-grid">
                <h4>Latest Movies</h4>
                @for ($i = 0; $i < 4; $i++)
                    <div class="footer-grid1">
                        <div class="footer-grid1-right">
                            <a
                                href="{{ route('movie.show', ['id' => $latest_movies[$i]->id]) }}">{{ $latest_movies[$i]->name }}</a>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                @endfor



            </div>
            <div class="col-md-2 footer-grid">
                <h4 class="b-log"><a href="index.html"><span>M</span>ovie <span>S</span>tore</a></h4>
                @for ($i = 0; $i < 6; $i++)
                    <div class="footer-grid-instagram">
                        <a href="{{ route('movie.show', ['id' => $latest_movies[$i]->id]) }}"><img
                                src="{{ $latest_movies[$i]->poster_path }}" alt=" " class="img-responsive"></a>
                    </div>
                @endfor

                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>

            <br><br>
        </div>
        <h3 class="text-center follow">Connect <span>Us</span></h3>
        <ul class="social-icons1 agileinfo">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul>

    </div>

</div>
<div class="w3agile_footer_copy">
    <p>© 2021 Movie UOK. All rights reserved</p>
</div>
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;">
    </span></a>



<script src="{{ asset('home/js/jquery-1.11.1.min.js') }}"></script>
<!-- Dropdown-Menu-JavaScript -->
<script>
    $(document).ready(function() {
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //Dropdown-Menu-JavaScript -->


<script type="text/javascript" src="{{ asset('home/js/jquery.zoomslider.min.js') }}"></script>
<!-- search-jQuery -->
<script src="{{ asset('home/js/main.js') }}"></script>
<script src="{{ asset('home/js/simplePlayer.js') }}"></script>
<script>
    $("document").ready(function() {
        $("#video").simplePlayer();
    });
</script>

<!-- pop-up-box -->
<script src="{{ asset('home/js/jquery.magnific-popup.js') }}" type="text/javascript"></script>
<!--//pop-up-box -->

<div id="small-dialog2" class="mfp-hide">
    <iframe src="/"></iframe>
</div>
<script>
    $(document).ready(function() {
        $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
<script src="{{ asset('home/js/easy-responsive-tabs.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<link href="{{ asset('home/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all">
<script src="{{ asset('home/js/owl.carousel.js') }}"></script>

<script src="{{ asset('js/custom/movie.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds
            autoPlay: true,
            navigation: true,

            items: 5,
            itemsDesktop: [640, 4],
            itemsDesktopSmall: [414, 3]

        });

    });
</script>

<!--/script-->
<script type="text/javascript" src="{{ asset('home/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/js/easing.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 900);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        /*
        							var defaults = {
        					  			containerID: 'toTop', // fading element id
        								containerHoverID: 'toTopHover', // fading element hover id
        								scrollSpeed: 1200,
        								easingType: 'linear'
        					 		};
        							*/

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!--end-smooth-scrolling-->
<script src="{{ asset('home/js/bootstrap.js') }}"></script>


{{-- player   js --}}
<script src="{{ asset('js/playerjs.js') }}"></script>


<script src="{{ asset('home/js/jquery.barrating.min.js') }}"></script>

<script src="{{ asset('plugins/easyautocomplete/jquery.easy-autocomplete.min.js') }}"></script>


@if ($errors->count() > 0)
    @if ($errors->has('email') || $errors->has('password'))
        <script>
            $(function() {
                $('#myModal4').modal({
                    show: true
                });
            });
        </script>
    @endif
@endif

<script type="text/javascript">
    $('#registerForm ').on('submit', function(e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#registerForm  input").removeClass("is-invalid");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "{{ route('register') }}",
            data: formData,
            success: () => window.location.assign("/"),
            error: (response) => {
                let errors = response.responseJSON.errors;
                Object.keys(errors).forEach(function(key) {
                    $("#" + key + "Input").addClass("is-invalid");
                    $("#" + key + "Error").children("strong").text(errors[key][0]);
                });
            }
        })
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var options = {

        url: function(search) {

            return "/search/?search=" + search;
        },
        getValue: "name",
        template: {
            type: 'iconLeft',
            fields: {
                iconSrc: "poster_path",
            }
        },
        list: {
            onChooseEvent: function() {
                var value = $('.form-control[type="search"]').getSelectedItemData();
                var url = window.location.origin + "/movie/" + value
                    .id;
                window.location.replace(url);
            }
        }
    };
    $('.form-control[type="search"]').easyAutocomplete(options);

    var options2 = {

        url: function(search) {
            selector = document.getElementById("selector-category").value;
            return "/searchCategory/?search=" + search + "&category=" + selector;
        },
        getValue: "name",
        template: {
            type: 'iconLeft',
            fields: {
                iconSrc: "poster_path",
            }
        },
        list: {
            onChooseEvent: function() {
                var value = $('.form-category[type="search"]').getSelectedItemData();
                var url = window.location.origin + "/movie/" + value
                    .id;
                window.location.replace(url);
            }
        }
    };
    $('.form-category[type="search"]').easyAutocomplete(options2);

    var options3 = {

        url: function(search) {
            selector = document.getElementById("selector-country").value;
            return "/searchCountry/?search=" + search + "&country=" + selector;
        },
        getValue: "name",
        template: {
            type: 'iconLeft',
            fields: {
                iconSrc: "poster_path",
            }
        },
        list: {
            onChooseEvent: function() {
                var value = $('.form-country[type="search"]').getSelectedItemData();
                var url = window.location.origin + "/movie/" + value
                    .id;
                window.location.replace(url);
            }
        }
    };
    $('.form-country[type="search"]').easyAutocomplete(options3);

    $(document).ready(function() {
        $("#banner .movies").owlCarousel({
            loop: true,
            nav: false,
            items: 1,
            dots: false,
        });
        $(".listing .movies").owlCarousel({
            loop: true,
            nav: false,
            stagePadding: 50,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            },
            dots: false,
            margin: 15,
            loop: true,
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
        });
    });
</script>

@stack('scripts')


</body>

</html>
