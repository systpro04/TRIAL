@extends('USER_VIEW.layouts.main')
@section('content')
<section id="hero" class="hero">

  </section>

    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('userside/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Core Values</h2>
            <ol>
                <li><a href="{{ route('user_home') }}">Home</a></li>
                <li>Core Values</li>
            </ol>

        </div>
    </div>
    
@endsection
