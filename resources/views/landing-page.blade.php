<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Flow | Belajar Online dengan Fleksibel dan Efektif</title>
    <link rel="shortcut icon" type="image/x-icon" href=" {{ asset('assets/images/favicon.ico') }}">
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
    @php
        tracking_visitor();
    @endphp
</body>

</html>
