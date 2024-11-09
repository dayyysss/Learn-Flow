<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Flow | Course and LMS</title>
    <link rel="shortcut icon" type="image/x-icon" href=" {{ asset('assets/images/favicon.ico') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/video-modal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
</head>

<body class="relative font-inter font-normal text-base leading-[1.8] bg-bodyBg dark:bg-bodyBg-dark">
    @extends('landing.layouts.landing-layouts')

    @section('page_title', 'Learn Flow | Course and LMS')

    @section('content')
        <!-- Slider Section -->
        @include('landing.components.hero')

        <!-- About Section -->
        @include('landing.components.client')

        <!-- About Section -->
        @include('landing.components.about')

        <!-- Layanan Section -->
        @include('landing.components.popular')

        <!-- CTA Section -->
        @include('landing.components.course')

        <!-- Portofolio Section -->
        @include('landing.components.register-course')

        <!-- Counter Up Section -->
        @include('landing.components.pricing')

        <!-- Testimoni Section -->
        @include('landing.components.testimoni')

        <!-- Client Section -->
        @include('landing.components.blog')
    @endsection

    <!-- scripts start from here -->
    {{-- <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/accordion.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/count.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/dropdown.js') }}"></script>
    <script src="{{ asset('assets/js/filter.js') }}"></script>
    <script src="{{ asset('assets/js/mobileMenu.js') }}"></script>
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/preloader.js') }}"></script>
    <script src="{{ asset('assets/js/scrollUp.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
    <script src="{{ asset('assets/js/smoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/stickyHeader.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/videoModal.js') }}"></script>
    <script src="{{ asset('assets/js/vanilla-tilt.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js"') }}"></script> --}}
</body>

</html>
