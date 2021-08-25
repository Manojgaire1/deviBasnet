<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come after these tags -->

    <!-- Fill in the following meta tags -->
    <meta name="keywords" content="keyword1, keyword2, keyword3"/>
    <meta name="description" content="Description">
    <meta name="author" content="Author">

    <!-- Change the site title -->
    <title>Dr. Devi Bahadur Basnet | My Personal Website</title>

    <!-- You can regenerate the favicons as you wish using http://realfavicongenerator.net/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front-assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front-assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front-assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('front-assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('front-assets/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front-assets/css/bootstrap.min.css')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:200,300,300i,400,700" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Pretty Photo -->
    <link rel="stylesheet" href="{{asset('front-assets/css/prettyPhoto.css')}}"/>

    <!-- Flickity -->
    <link rel="stylesheet" href="{{asset('front-assets/css/flickity.css')}}"/>

    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('front-assets/css/animate.css')}}"/>

    <!-- custom.css - the styling for this template -->
    <link rel="stylesheet" href="{{asset('front-assets/css/custom.css')}}">
    <!-- load page specific css---->
    @yield('page_specific_css')
    <!-- Modernizr -->
    <script src="{{asset('front-assets/js/modernizr-custom.js')}}"></script>
</head>

<body>

<!-- status spinner showing while loading the page -->
<div id="preloader"></div>

<!-- HEADER -->
<header>
    <nav id="mySidenav" class="sidenav navbar-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a class="nav-link" href="#hero">Home</a>
        <a class="nav-link" href="#about">About</a>
        <a class="nav-link" href="#experience">Timeline</a>
        <a class="nav-link" href="#services">Services</a>
        <a class="nav-link" href="#activity">Activities</a>
        <a class="nav-link" href="#contact">Contact</a>
    </nav>
    <span id="openNav" onclick="openNav()">&#9776;</span>
</header>

<!-- HEADER END -->
<div id="content-wrap">