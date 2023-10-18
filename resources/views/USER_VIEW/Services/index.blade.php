@extends('USER_VIEW.layouts.main')
@section('content')
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('userside/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Services</h2>
            <ol>
                <li><a href="{{ route('user_service') }}">Index</a></li>
                <li>Services</li>
            </ol>

        </div>
    </div>
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-mountain-city"></i>
                        </div>
                        <h3>Power Distribution</h3>
                        <p>Maintaining a Consistent Power Distribution for a Better
                            Service</p>
                        <a href="#" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-arrow-up-from-ground-water"></i>
                        </div>
                        <h3>Consumer Satisfaction</h3>
                        <p>Prioritizing Consumer’s Satisfaction</p>
                        <a href="#" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-compass-drafting"></i>
                        </div>
                        <h3>Total Electrification</h3>
                        <p>100% Sitio Energized.</p>
                        <a href="#" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
