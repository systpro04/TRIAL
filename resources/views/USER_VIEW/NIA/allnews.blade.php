@extends('USER_VIEW.layouts.main')
@section('content')
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('userside/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>News</h2>
            <ol>
                <li><a href="{{ route('user_home') }}">Home</a></li>
                <li>News</li>
            </ol>

        </div>
    </div>
    <section class="container">
        <div class="single-news">
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col-md-8">
                    @if (count($news) > 0)
                    @foreach ($news as $new)
                        <div id="hero-carousel" class="post-img carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            @foreach (json_decode($new->image, true) as $index => $img)
                                <img class="carousel-item @if ($index == 0) active @endif" src="{{ url('uploads/news/' . $img) }}" class="d-block" style="border-radius: 20px;">
                            @endforeach
                        </div>
                        </div>
                    
                        <div class="sn-content">
                            <h3 class="" href="">{{ $new->title }}</h3>
                            <h6 style="color: rgb(0, 161, 121)" href=""><i class="far fa-clock"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i A', $new->dateTime)->format('F d, Y') }}</h6>
                            <p>
                                {{ $new->article }}
                            </p>
                        </div>
                    @endforeach
                    @else
                        <div class="col-md-12 text-center">
                            <p style="animation: bounce 1.5s infinite; color: red; font-size: 1.5rem; text-transform:uppercase">No news yet..</p>
                        </div>
                    @endif
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i> Other Topics</h2>
                                <div class="category">
                                    <ul class="fa-ul">
                                        @foreach($n as $new)
                                        <li><span class="fa-li"><i class="bi bi-check-circle"></i></span><a  href="">{{ $new->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h3 class="text-muted"><i class="fas fa-check-circle text-success"></i> Facts</h3>
                                <div class="tags">
                                    <ol>
                                        <li>
                                            Electricity travels at the speed of light, which is 186,000 miles per second.
                                        </li>
                                        <li>
                                            Before electricity was a way of life, ancient Egyptians were aware that
                                            lightning and shocks from electric fish were very powerful. ...
                                        </li>
                                        <li>
                                            Electricity can be created using water, wind, the sun, and even animal waste.
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $news->links() !!}
            </div>
    </section>
    <style>
        .single-news {
            position: relative;
            width: 100%;
            padding: 25px 0 0 0;
        }

        .single-news .sn-img {
            position: relative;
            overflow: hidden;
        }

        .single-news .sn-img img {
            width: 100%;
        }

        .single-news .sn-content {
            position: relative;
            width: 100%;
            padding: 30px 0 30px 0;
        }

        .single-news .sn-content a.sn-title {
            display: block;
            width: 100%;
            color: #353535;
            font-size: 35px;
            font-weight: 700;
            line-height: 32px;
            margin-bottom: 10px;
        }

        .single-news .sn-content a.sn-title:hover {
            color: #E47A2E;
        }

        .single-news .sn-content a.sn-date {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            color: #757575;
            font-size: 14px;
            font-weight: 400;
            transition: .3s;
            letter-spacing: 1px;
        }

        .single-news .sn-content a.sn-date i {
            margin-right: 5px;
        }

        .single-news .sn-content a.sn-date:hover {
            text-decoration: underline;
        }
        @keyframes bounce {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
@endsection
