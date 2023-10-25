<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Trial and Error</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        @yield('content')
    </main>
    @include('USER_VIEW.layouts.footer')


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('userside/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('userside/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('userside/assets/js/main.js') }}"></script>
</body>
<style>
    ul li a:hover {
        font-weight: bold;
        text-decoration: none;
        color: teal !important;
        ;
    }
</style>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</html>
