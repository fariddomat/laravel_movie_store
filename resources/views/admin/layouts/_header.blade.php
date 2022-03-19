<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <link rel="shortcut icon" href="{{ asset('Film-Reel.ico') }}" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/material-icon.css') }}" />
  <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <!-- CSS Files -->
  <link href="{{ asset('admin/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('admin/demo/demo.css') }}" rel="stylesheet" />
   {{-- Toaster --}}
   <link rel="stylesheet" href="{{ asset('admin/css/toastr.min.css') }}">
   {{-- Select 2 --}}
   <link href="{{ asset('admin/css/select2.min.css') }}" rel="stylesheet" />

   <style>
       .badge{
        background-color: #14ff00;
font-size: 17px;
margin-top: 15px;
color: white;
border-radius: 7px;
       }
       .bootstrap-tagsinput .tag [data-role="remove"]:after {
       content: "x";
       cursor: pointer;
       padding: 0px 2px;
    }
   </style>
   <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="">
  <div class="wrapper ">
