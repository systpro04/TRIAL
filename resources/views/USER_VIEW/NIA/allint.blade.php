@extends('USER_VIEW.layouts.main')
@section('content')
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('userside/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Interruptions</h2>
            <ol>
                <li><a href="{{ route('user_home') }}">Home</a></li>
                <li>Interruptions</li>
            </ol>

        </div>
    </div>
    <section class="constructions" id="constructions">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="career-search mb-60">
                        <div class="filter-result">
                            @if (count($interruptions) > 0)
                            @foreach ( $interruptions as $int)
                            <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                                <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                    <div class="job-content">
                                        <h5 class="text-center text-md-left">{{ \Carbon\Carbon::parse($int->startDateTime)->format('M. d h:i A') }} to {{ \Carbon\Carbon::parse($int->endDateTime)->addDay()->format('M. d, Y h:i A') }}</h5>
                                        <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                            <li>
                                                <i class="bi bi-check-circle" style="color: teal"></i> <strong>&nbsp;&nbsp;&nbsp;&nbsp;{{ $int->what }}</strong>
                                                <br>
                                                <i class="bi bi-check-circle" style="color: teal"></i>&nbsp;&nbsp;&nbsp;&nbsp; {{ $int->where }}</li>
                                            </li>
                                            <li>
                                                <i class="bi bi-check-circle" style="color: teal"></i>&nbsp;&nbsp;&nbsp;&nbsp; {{ $int->why }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <div class="col-md-12 text-center">
                                    <p style="animation: bounce 1.5s infinite; color: red; font-size: 1.5rem; text-transform:uppercase"> No news yet..</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $interruptions->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
<style>

    .filter-result .job-box {
        -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
        box-shadow: 0 0 35px 0 rgba(154, 154, 154, 0.2);
        border-radius: 10px;
        padding: 10px 35px;
        border: rgba(207, 207, 207, 0.363) solid;
    }

        ul {
        list-style: none; 
        }

        .list-disk li {
        list-style: none;
        margin-bottom: 12px;
        }

        .list-disk li:last-child {
        margin-bottom: 0;
        }

        .job-box .img-holder {
            height: 65px;
            width: 65px;
            background-color: #4e63d7;
            background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
            background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
            font-family: "Open Sans", sans-serif;
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            -webkit-box-align: center;
                -ms-flex-align: center;
                    align-items: center;
            border-radius: 65px;
        }

        .career-title {
        background-color: #4e63d7;
        color: #fff;
        padding: 15px;
        text-align: center;
        border-radius: 10px 10px 0 0;
        background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
        background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
        }

        .job-overview {
        -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
                box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
        border-radius: 10px;
        }

        @media (min-width: 992px) {
        .job-overview {
            position: -webkit-sticky;
            position: sticky;
            top: 70px;
        }
        }

        .job-overview .job-detail ul {
        margin-bottom: 28px;
        }

        .job-overview .job-detail ul li {
        opacity: 0.75;
        font-weight: 600;
        margin-bottom: 15px;
        }

        .job-overview .job-detail ul li i {
        font-size: 20px;
        position: relative;
        top: 1px;
        }

        .job-overview .overview-bottom,
        .job-overview .overview-top {
        padding: 35px;
        }

        .job-content ul li {
        font-weight: 600;
        opacity: 0.75;
        border-bottom: 1px solid #ccc;
        padding: 10px 5px;
        }

        @media (min-width: 768px) {
        .job-content ul li {
            border-bottom: 0;
            padding: 0;
        }
        }

        .job-content ul li i {
        font-size: 20px;
        position: relative;
        top: 1px;
        }

        .mb-30 {
            margin-bottom: 30px;
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
