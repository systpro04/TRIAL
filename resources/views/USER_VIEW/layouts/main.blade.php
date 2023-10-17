<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Trial and Error</title>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="{{ asset('userside/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userside/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('userside/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userside/assets/vendor/aos/aos.css" rel="stylesheet') }}">
    <link href="{{ asset('userside/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userside/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userside/assets/css/main.css') }}" rel="stylesheet">
</head>

<body>
    @include('USER_VIEW.layouts.nav')

    <main id="main">
      @yield('content')
    </main>
    @include('USER_VIEW.layouts.footer')


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <script src="{{ asset('userside/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('userside/assets/js/main.js') }}"></script>
</body>

</html>
