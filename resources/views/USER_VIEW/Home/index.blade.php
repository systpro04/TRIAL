@extends('USER_VIEW.layouts.main')
@section('content')
<section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">Trial and Error</h2>
            <p data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <a data-aos="fade-up" data-aos-delay="200" href="{{ route('login') }}" class="btn-get-started">Get Started</a>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url({{ asset('userside/assets/img/hero-carousel/hero-carousel-1.jpg') }})"></div>
      <div class="carousel-item" style="background-image: url({{ asset('userside/assets/img/hero-carousel/hero-carousel-2.jpg') }})"></div>
      <div class="carousel-item" style="background-image: url({{ asset('userside/assets/img/hero-carousel/hero-carousel-3.jpg') }})"></div>
      <div class="carousel-item" style="background-image: url({{ asset('userside/assets/img/hero-carousel/hero-carousel-4.jpg') }})"></div>
      <div class="carousel-item" style="background-image: url({{ asset('userside/assets/img/hero-carousel/hero-carousel-5.jpg') }})"></div>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section>

    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('userside/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Home</h2>
            <ol>
                <li><a href="{{ route('user_home') }}">Index</a></li>
                <li>Home</li>
            </ol>

        </div>
    </div>
    <section id="get-started" class="get-started section-bg">
        <div class="container">

            <div class="row justify-content-between gy-4">

                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                    <div class="content">
                        <h3>Minus hic non reiciendis ea possimus at quia.</h3>
                        <p>Rem id rerum. Debitis deserunt quidem delectus expedita ducimus dolor. Aut iusto ipsa. Eos ipsum
                            nobis ipsa soluta itaque perspiciatis fuga ipsum perspiciatis. Eum amet fugiat totam nisi
                            possimus ut delectus dicta.
                        <p>Aliquam velit deserunt autem. Inventore et saepe. Tenetur suscipit eligendi labore culpa eos.
                            Deserunt porro magni qui necessitatibus dolorem at animi cupiditate.</p>
                    </div>
                </div>

                <div class="col-lg-5" data-aos="fade">
                    <form action="forms/quote.php" method="post" class="php-email-form">
                        <h3>Get a quote</h3>
                        <p>Vel nobis odio laboriosam et hic voluptatem. Inventore vitae totam. Rerum repellendus enim linead
                            sero park flows.</p>
                        <div class="row gy-3">

                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>

                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your quote request has been sent successfully. Thank you!</div>

                                <button type="submit">Get a quote</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Quote Form -->

            </div>

        </div>
    </section>
@endsection
