<!DOCTYPE html>
<html>

<head>
    <title>Movie Store</title>
    <link rel="shortcut icon" href="{{ asset('Film-Reel.ico') }}" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Movie UOK web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- //for-mobile-apps -->
    <link href="{{ asset('home/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up -->
    <link href="{{ asset('home/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- //pop-up -->
    <link href="{{ asset('home/css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/zoomslider.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}" />
    <link href="{{ asset('home/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/easyautocomplete/easy-autocomplete.min.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('home/js/modernizr-2.6.2.min.js') }}"></script>
    <!--/web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!--//web-fonts-->

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
<style>

    .rating2 {
            float: left;
            border: none;
        }

        .rating2:not(:checked)>input {
            position: absolute;
            top: -9999px;
            clip: rect(0, 0, 0, 0);
        }

        .rating2:not(:checked)>label {
            float: right;
            width: 1em;
            padding: 0 .1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 200%;
            line-height: 1.2;
            color: #ddd;
        }

        .rating2:not(:checked)>label:before {
            content: '★ ';
        }

        .rating2>input:checked~label {
            color: #f70;
        }

        .rating2:not(:checked)>label:hover,
        .rating2:not(:checked)>label:hover~label {
            color: gold;
        }

        .rating2>input:checked+label:hover,
        .rating2>input:checked+label:hover~label,
        .rating2>input:checked~label:hover,
        .rating2>input:checked~label:hover~label,
        .rating2>label:hover~input:checked~label {
            color: #ea0;
        }

        .rating2>label:active {
            position: relative;
        }


</style>

<style>
    .br-theme-bars-1to10 .br-widget {
    height: 35px;
    white-space: nowrap
}

.br-theme-bars-1to10 .br-widget a {
    display: block;
    width: 12px;
    padding: 5px 0;
    height: 28px;
    float: left;
    background-color: #fbedd9;
    margin: 1px;
    text-align: center
}

.br-theme-bars-1to10 .br-widget a.br-active,
.br-theme-bars-1to10 .br-widget a.br-selected {
    background-color: #EDB867
}

.br-theme-bars-1to10 .br-widget .br-current-rating {
    font-size: 20px;
    line-height: 2;
    float: left;
    padding: 0 20px 0 20px;
    color: #EDB867;
    font-weight: 400
}

.br-theme-bars-1to10 .br-readonly a {
    cursor: default
}

.br-theme-bars-1to10 .br-readonly a.br-active,
.br-theme-bars-1to10 .br-readonly a.br-selected {
    background-color: #f2cd95
}

.br-theme-bars-1to10 .br-readonly .br-current-rating {
    color: #f2cd95
}

.br-current-rating{
display: none;
}
@media print {
    .br-theme-bars-1to10 .br-widget a {
        border: 1px solid #b3b3b3;
        background: white;
        height: 38px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    .br-theme-bars-1to10 .br-widget a.br-active,
    .br-theme-bars-1to10 .br-widget a.br-selected {
        border: 1px solid black;
        background: white
    }

    .br-theme-bars-1to10 .br-widget .br-current-rating {
        color: black
    }
}

.box-example-1to10 .br-wrapper {
    width: 210px;
    position: absolute;
    margin: 0px 0 0 -105px;
    left: 50%
}

.box-example-movie .br-wrapper {
    width: 250px;
    position: absolute;
    margin: 0px 0 0 -125px;
    left: 50%
}

.box-example-square .br-wrapper {
    width: 190px;
    position: absolute;
    margin: 0px 0 0 -95px;
    left: 50%
}

.box-example-pill .br-wrapper {
    width: 232px;
    position: absolute;
    margin: 0px 0 0 -116px;
    left: 50%
}

.box-example-reversed .br-wrapper {
    padding-top: 1.3em;
    width: 356px;
    position: absolute;
    margin: 0px 0 0 -178px;
    left: 50%
}

.box-example-horizontal .br-wrapper {
    width: 120px;
    position: absolute;
    margin: 0px 0 0 -60px;
    left: 50%
}

.star-ratings h1 {
    font-size: 1.5em;
    line-height: 2;
    margin-top: 3em;
    color: #757575
}

.star-ratings p {
    margin-bottom: 3em;
    line-height: 1.2
}

.star-ratings h1,
.star-ratings p {
    text-align: center
}

.star-ratings .stars {
    width: 120px;
    text-align: center;
    margin: auto;
    padding: 0 95px
}

.star-ratings .stars .title {
    font-size: 14px;
    color: #cccccc;
    line-height: 3
}

.star-ratings .stars select {
    width: 120px;
    font-size: 16px
}

.star-ratings .stars-example-fontawesome,
.star-ratings .stars-example-css,
.star-ratings .stars-example-bootstrap {
    float: left
}

.star-ratings .stars-example-fontawesome-o {
    width: 200px
}

.star-ratings .stars-example-fontawesome-o select {
    width: 200px
}

.start-ratings-main {
    margin-bottom: 3em
}

</style>

<style>
    .easy-autocomplete{
        max-width: 775px;
            margin: 0 auto;
    }
    .easy-autocomplete li{
        text-align: left !important;
    }
</style>
<style>

    .social-btn-sp #social-links {

        margin: 0 auto;

        max-width: 500px;

    }

    .social-btn-sp #social-links ul li {

        display: inline-block;

    }

    .social-btn-sp #social-links ul li a {

        padding: 15px;

        border: 1px solid #ccc;

        margin: 1px;

        font-size: 30px;

    }

    table #social-links{

        display: inline-table;

    }

    table #social-links ul li{

        display: inline;

    }

    table #social-links ul li a{

        padding: 5px;

        border: 1px solid #ccc;

        margin: 1px;

        font-size: 15px;

        background: #e3e3ea;

    }

</style>
</head>
