@extends('USER_VIEW.layouts.main')
@section('content')
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('{{ asset('userside/assets/img/breadcrumbs-bg.jpg') }}');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Advisories</h2>
            <ol>
                <li><a href="{{ route('user_home') }}">Home</a></li>
                <li>Advisories</li>
            </ol>
        </div>
    </div>
    <section class="constructions" >
        <div class="container shadow" data-aos="fade-up">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <div class="title-text">
                                <h2>Schedule Advisories</h2>
                            </div>
                            <p>
                                In ludus latine mea, eos paulo quaestio an. Meis possit ea sit. Vidisse molestie<br />
                                cum te, sea lorem instructior at.
                            </p>
                        </div>
                    </div>
                    <!-- /.col end-->
                </div>
                <!-- row end-->
                <div class="row">
                    <div class="col-lg-12" data-aos="fade-up">
                        <div class="table-responsive">
                            @if (count($advisories) > 0)
                            @foreach ($advisories as $adv )
                            <table class="table table-hover ">
                                <hr>
                                <tbody>
                                    <tr class="inner-box">
                                        <th scope="row">
                                            <div class="event-date">
                                                <span><small>{{ \Carbon\Carbon::parse($adv->created_at)->format('d') }}</small></span>
                                                <p>{{ \Carbon\Carbon::parse($adv->created_at)->format('F') }}</p>
                                            </div>
                                        </th>
                                        <td>
                                            <img src="{{ asset('userside/assets/img/kalindar.png') }}" alt="" style="height: 110px; width: 110px">
                                        </td>
                                        @php
                                            $dateRange = explode(" to ", $adv->dateTime);
                                            $startDate = date("F, j, Y g:i A", strtotime($dateRange[0]));
                                            $endDate = date("F, j, Y g:i A", strtotime($dateRange[1]));
                                        @endphp
                                        <td>
                                            <span><small>From <strong>{{ $startDate }}</strong> to <strong>{{ $endDate }}</strong></small></span>
                                        </td>
                                        <td>
                                            <div class="r-no">
                                                <span><small>{{ $adv->info }}</small></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endforeach
                            @else
                                <div class="col-md-12 text-center">
                                    <p style="animation: bounce 1.5s infinite; color: red; font-size: 1.5rem; text-transform:uppercase">No advisories yet..</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="d-flex justify-content-center mt-4">
            {!! $advisories->links() !!}
        </div>
    </section> 
   <style>
    .event-schedule-area-two .tab-content .table thead {
        background-color: #0a9a71b1;
        color: #fff;
        font-size: 20px;
    }
    .event-schedule-area-two .tab-content .table thead tr th {
        padding: 20px;
        border: 0;
    }
    .event-schedule-area-two .tab-content .table tbody {
        background: #fff;
    }
    .event-schedule-area-two .tab-content .table tbody tr.inner-box {
        border-bottom: 1px solid #dee2e6;
    }
    .event-schedule-area-two .tab-content .table tbody tr th {
        border: 0;
        padding: 30px 20px;
        vertical-align: middle;
    }
    .event-schedule-area-two .tab-content .table tbody tr th .event-date {
        color: #252525;
        text-align: center;
    }
    .event-schedule-area-two .tab-content .table tbody tr th .event-date span {
        font-size: 50px;
        line-height: 50px;
        font-weight: normal;
    }
    .event-schedule-area-two .tab-content .table tbody tr td {
        padding: 30px 20px;
        vertical-align: middle;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .r-no span {
        color: #252525;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-wrap h3 a {
        font-size: 20px;
        line-height: 20px;
        color: #cf057c;
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        transition: all 0.4s;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-wrap h3 a:hover {
        color: #4125dd;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .categories {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        margin: 10px 0;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .categories a {
        color: #252525;
        font-size: 16px;
        margin-left: 10px;
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        transition: all 0.4s;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .categories a:before {
        content: "\f07b";
        font-family: fontawesome;
        padding-right: 5px;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .time span {
        color: #252525;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        margin: 10px 0;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers a {
        color: #4125dd;
        font-size: 16px;
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        transition: all 0.4s;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers a:hover {
        color: #4125dd;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers a:before {
        content: "\f007";
        font-family: fontawesome;
        padding-right: 5px;
    }
        .event-schedule-area-two .tab-content .table tbody tr td .primary-btn {
        margin-top: 0;
        text-align: center;
    }
    .event-schedule-area-two .tab-content .table tbody tr td .event-img img {
        width: 100px;
        height: 100px;
        border-radius: 8px;
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
