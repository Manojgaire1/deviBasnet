<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come after these tags -->

    <!-- Fill in the following meta tags -->
    <meta name="keywords" content="Devi B Basnet, Devi Basnet, Medytox. Global biotech, Streptomyces, Genome analysis, Antibody Engineering, Molecular cloning, Gene Engineering, FK506, Drug development, Protein modeling, NRNA, South Korea, NRNA-Korea, ICC, Non-resident Nepalese Association, Motivation speaker, SONSIK, Founder Vice president, RIBB, CENAS,"/>
    <meta name="description" content="This is Dr. Devi B. Basnet from South Korea, a molecular biologist worked as senior scientist in Medytox, Inc. Dr. Basnet is a social worker. He has been serving the society for 15 years through NRNA. An outstanding student in college and an eminent scientist in South Korea. His insights and commitment for science, service, and nation building offers a new school of transformation especially for those who are living far from their home country.">
    <meta name="author" content="Dr. Devi Bahadhur Basnet">

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
    <link rel="stylesheet" href="{{asset('front-assets/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <!-- Pretty Photo -->
    <link rel="stylesheet" href="{{asset('front-assets/css/prettyPhoto.css')}}"/>

    <!-- Flickity -->
    <link rel="stylesheet" href="{{asset('front-assets/css/flickity.css')}}"/>

    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('front-assets/css/animate.css')}}"/>
    {{-- SLick slider --}}
    <link rel="stylesheet" href="{{asset('front-assets/css/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('front-assets/css/slick-theme.css')}}"/>

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
<div id="content-wrap">
<div class="container">
    <form method="POST" action="{{ route('admin.login') }}" class="login-form">
        <h5 class="login-title">{{ __('Login') }}</h5>
        @csrf

        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</div>
@include('frontend.inc.footer')
