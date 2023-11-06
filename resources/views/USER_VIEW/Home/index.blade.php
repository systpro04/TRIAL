@extends('USER_VIEW.layouts.main')
@section('content')
    <section id="hero" class="hero">
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">Trial and Error</h2>
                        <p data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        {{-- <a data-aos="fade-up" data-aos-delay="200" href="{{ route('login') }}" class="btn-get-started">Get Started</a> --}}
                        <div class="search-wrapper" style="margin-top: 13%">
                            <div class="input-holder">
                                <input type="text" class="search-input" placeholder="Balance Inquiry..." onkeyup="search()">
                                <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
                            </div>
                            <span class="close" onclick="searchToggle(this, event);"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            @foreach ($images as $index => $image)
                @foreach (json_decode($image->image) as $filename)
                    @if (file_exists(public_path("uploads/home_i      mages/$filename")))
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-image: url('{{ asset("uploads/home_images/$filename") }}');"></div>
                    @endif
                @endforeach
            @endforeach
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span></a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next"><span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span></a>
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
            <div class="section-header">
                <h2>Powersupply Outlook</h2>
            </div>
            <div class="row justify-content-between">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12" data-aos="fade-up">
                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover text-center shadow">
                                        <thead>
                                            <tr>
                                                <th width="200">Capacity<br> (kW)</th>
                                                <th width="100">Morning<br>(1:00AM-12:00NN)</th>
                                                <th width="100">Afternoon<br>(12:01PM-6:00PM)</th>
                                                <th width="100">Evening<br>(6:01PM-12:59PM)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($powers) > 0)
                                            @foreach ($powers as $pow )
                                            <tr>
                                                <td>{{ $pow->capacity }}</td>
                                                <th>{{ $pow->morning }}</th>
                                                <th>{{ $pow->afternoon }}</th>
                                                <th>{{ $pow->evening }} </th>
                                            </tr>
                                            @endforeach
                                            @else
                                                <div class="col-md-12 text-center">
                                                    <td style="color: red; font-size: 1rem; text-transform:uppercase" colspan="12">No Data Available</td>                     
                                                </div>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="get-started" class="get-started section-bg">
        <div class="container">
            <div class="section-header">
                <h2>Advisories</h2>
                <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
            </div>
            <div class="row justify-content-between gy-4">
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                    <div class="content">
                        <h3>Minus hic non reiciendis ea possimus at quia.</h3>
                        <p>Rem id rerum. Debitis deserunt quidem delectus expedita ducimus dolor. Aut iusto ipsa. Eos ipsum nobis ipsa soluta itaque perspiciatis fuga ipsum perspiciatis. Eum amet fugiat totam nisi possimus ut delectus dicta.</p>
                        <p>Aliquam velit deserunt autem. Inventore et saepe. Tenetur suscipit eligendi labore culpa eos. Deserunt porro magni qui necessitatibus dolorem at animi cupiditate.</p>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                    <div class="content">
                        <h4>Related Advisories</h4>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped shadow table-hover text-center">
                                    <thead class="bg-primary text-light">
                                        <tr>
                                            <th>Place</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($advisories as $adv )
                                       <tr>
                                            <td>{{ $adv->place }}</td>
                                            @php
                                                $dateRange = explode(" to ", $adv->dateTime);
                                                $startDate = date("F, j, Y g:i A", strtotime($dateRange[0]));
                                                $endDate = date("F, j, Y g:i A", strtotime($dateRange[1]));
                                            @endphp
                                            <td>
                                                <span><small>From <strong>{{ $startDate }}</strong> to <strong>{{ $endDate }}</strong></small></span>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </section>

    <section id="constructions" class="constructions">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Interruptions</h2>
                <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
            </div>
            <div class="row gy-4">
                @if (count($interruptions) > 0)
                    @foreach ($interruptions as $int)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card-item">
                                <div class="row" style="padding: 5px">
                                    <div class="col-xl-5">
                                        <div class="card-bg" style="background-image: url({{ asset('userside/assets/img/constructions-1.jpg') }}); height: 100%; "></div>
                                    </div>
                                    <div class="col-xl-7 d-flex align-items-center">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-bordered text-sm">
                                                    <thead>
                                                        <tr>
                                                            @php
                                                                $dateRange = explode(" to ", $int->dateTime);
                                                                $startDate = date("F, j, Y g:i A", strtotime($dateRange[0]));
                                                                $endDate = date("F, j, Y g:i A", strtotime($dateRange[1]));
                                                            @endphp
                                                            <th class="table-active" colspan="2"><strong>{{ $startDate }}</strong> to <strong>{{ $endDate }}</strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th width="20%" class="text-muted">WHAT</th>
                                                            <td width="80%">{{ $int->what }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="20%" class="text-muted">WHERE</th>
                                                            <td width="80%">{{ $int->where }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="20%" class="text-muted">WHY</th>
                                                            <td width="80%">
                                                                <button class="btn-block mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample-{{ $int->id }}" aria-bs-expanded="false" aria-bs-controls="collapseExample" style="border:none; "> <strong class="text-dark"><small>show more...</small></strong></button>
                                                                <div class="collapse" id="collapseExample-{{ $int->id }}">
                                                                    <textarea style="height: 200px; font-size: 12px; font-weight: bold" class="form-control" disabled>{{ $int->why }}</textarea>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <small>
                                                    <p class="text-muted">
                                                        We sincerely apologize for the inconvenience this will bring you. We
                                                        request your patience and understanding on this matter. Rest assured
                                                        that our team will exert best effort to restore the power the
                                                        soonest possible time.
                                                        For further queries, please call our hotline numbers at <strong>
                                                            09177147493 </strong> or <strong> 09199950240</strong>
                                                    </p>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-center">
                        <p style="animation: bounce 1.5s infinite; color: red; font-size: 1.5rem; text-transform:uppercase"> No interruptions yet..</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="section-header">
                <h2>Recent News</h2>
                <p>Be informative and read our latest news</p>
            </div>
            <div class="row g-5">
                @if (count($news) > 0)
                @foreach ($news as $new)
                @include('USER_VIEW.Home.view')
                <div class="col-lg-8">
                    <article class="blog-details">
                            <div id="hero-carousel" class="post-img carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                                @foreach (json_decode($new->image, true) as $index => $img)
                                    <img class="carousel-item @if ($index == 0) active @endif" src="{{ url('uploads/news/' . $img) }}" class="img-fluid">
                                @endforeach
                            </div>
                        
                        <h2 class="title">{{ $new->title }}</h2>
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i><a href="#"><time>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i A', $new->dateTime)->format('F d, Y') }}</time>
                            </ul>
                        </div>
                        <a href="#" class="readmore stretched-link mt-3" data-bs-toggle="modal"  data-bs-target="#newsView-{{ $new->id }}"><span><i class="fa fa-share"></i> Read More</span></a>
                        <div class="content">
                            <p>{{ $new->article }}</p>
                        </div>
                    </article>
                </div>
                @endforeach
                @else
                    <div class="col-md-12 text-center">
                        <p style="animation: bounce 1.5s infinite; color: red; font-size: 1.5rem; text-transform:uppercase">No news yet..</p>
                    </div>
                @endif
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Search</h3>
                            <form action="" class="mt-3">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="mt-3">
                                <li><i class="bi bi-check-circle text-warning"></i>&nbsp;<a href="{{ route('all_news') }}">ALl News &nbsp;<small><span class="badge badge-danger text-light">{{ $news->total() }}</span></small></a></li>
                                <li><i class="bi bi-check-circle text-warning"></i>&nbsp;<a href="{{ route('all_interruptions') }}">All Interruptions &nbsp;<small><span class="badge badge-danger text-light">{{ $interruptions->total() }}</span></small></a></li>
                                <li><i class="bi bi-check-circle text-warning"></i>&nbsp;<a href="{{ route('all_advisories') }}">All Advisories &nbsp;<small><span class="badge badge-danger text-light">{{ $advisories->total() }}</span></small></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Related Topics</h3>
                            
                            <div class="mt-3">
                                @if($recentNews->count() > 0)
                                @foreach ($recentNews as $recent)
                                <hr>
                                    <div class="post-item">
                                            @foreach (json_decode($recent->image, true) as $index => $img)                                         
                                                <img class="carousel-item @if ($index == 0) active @endif" src="{{ url('uploads/news/' . $img) }}">
                                            @endforeach
                                        <div>
                                            <h4><a href="#">{{ $recent->title }}</a></h4>
                                            <time class="text-warning">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i A', $recent->dateTime)->format('M. d, Y h:i A') }}</time>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        div.tooltip-inner {
            text-align: center;
            border-radius: 5px;
            background-color: #ffee00;
            color: #ffffffab;
            font-size: 30px;
            max-width: 350px;
        }

        .badge {
            display: inline-block;
            padding: .25em .3em;
            font-size: 1rem;
            font-weight: 700;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
        }
        .badge-danger {
            color: #fff;
            background-color: #dc3545
        }
        .ellipsis-container {
            position: relative;
            width: 200px;
            overflow: hidden;
        }
        button {
            display: inline-block;
            bottom: 0;
            right: 0;
            background: transparent;
            border: none;
            cursor: pointer;
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
        ::selection {
            background: #212129;
        }

        .search-wrapper {
            position: absolute;
            transform: translate(-50%, -50%);
            top:50%;
            left:50%;
        }
        .search-wrapper.active {}

        .search-wrapper .input-holder {    
            height: 70px;
            width:70px;
            overflow: hidden;
            background: rgba(112, 112, 112, 0);
            border-radius:6px;
            position: relative;
            transition: all 0.3s ease-in-out;
        }
        .search-wrapper.active .input-holder {
            width:450px;
            border-radius: 50px;
            background: rgba(90, 90, 90, 0.5);
            transition: all .5s cubic-bezier(0.000, 0.105, 0.035, 1.570);
        }
        .search-wrapper .input-holder .search-input {
            width:100%;
            height: 50px;
            padding:0px 70px 0 20px;
            opacity: 0;
            position: absolute;
            top:0px;
            left:0px;
            background: transparent;
            box-sizing: border-box;
            border:none;
            outline:none;
            font-family:"Open Sans", Arial, Verdana;
            font-size: 16px;
            font-weight: 400;
            line-height: 20px;
            color:#FFF;
            transform: translate(0, 60px);
            transition: all .3s cubic-bezier(0.000, 0.105, 0.035, 1.570);
            transition-delay: 0.3s;
        }
        .search-wrapper.active .input-holder .search-input {
            opacity: 1;
            transform: translate(0, 10px);
        }
        .search-wrapper .input-holder .search-icon {
            width:60px;
            height:60px;
            border:none;
            border-radius:30%;
            background: #ffe921;
            padding:0px;
            outline:none;
            position: relative;
            z-index: 2;
            float:right;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }
        .search-wrapper.active .input-holder .search-icon {
            width: 50px;
            height:50px;
            margin: 10px;
            border-radius: 30px;
        }
        .search-wrapper .input-holder .search-icon span {
            width:22px;
            height:22px;
            display: inline-block;
            vertical-align: middle;
            position:relative;
            transform: rotate(45deg);
            transition: all .4s cubic-bezier(0.650, -0.600, 0.240, 1.650);
        }
        .search-wrapper.active .input-holder .search-icon span {
            transform: rotate(-45deg);
        }
        .search-wrapper .input-holder .search-icon span::before, .search-wrapper .input-holder .search-icon span::after {
            position: absolute; 
            content:'';
        }
        .search-wrapper .input-holder .search-icon span::before {
            width: 4px;
            height: 11px;
            left: 9px;
            top: 18px;
            border-radius: 2px;
            background: #000000;
        }
        .search-wrapper .input-holder .search-icon span::after {
            width: 20px;
            height: 20px;
            left: 0px;
            top: 0px;
            border-radius: 16px;
            border: 3px solid #000000;
        }
        .search-wrapper .close {
            position: absolute;
            z-index: 1;
            top:24px;
            right:20px;
            width:25px;
            height:25px;
            cursor: pointer;
            transform: rotate(-180deg);
            transition: all .3s cubic-bezier(0.285, -0.450, 0.935, 0.110);
            transition-delay: 0.2s;
        }
        .search-wrapper.active .close {
            right:-50px;
            transform: rotate(45deg);
            transition: all .6s cubic-bezier(0.000, 0.105, 0.035, 1.570);
            transition-delay: 0.5s;
        }
        .search-wrapper .close::before, .search-wrapper .close::after {
            position:absolute;
            content:'';
            background: #ffd000;
            border-radius: 2px;
        }
        .search-wrapper .close::before {
            width: 5px;
            height: 25px;
            left: 10px;
            top: 0px;
        }
        .search-wrapper .close::after {
            width: 25px;
            height: 5px;
            left: 0px;
            top: 10px;
        } 
    </style>

    <script>
        function showFullContent() {
            const contentDiv = document.querySelector('.content');
            contentDiv.style.whiteSpace = 'normal';
        }
        function searchToggle(obj, evt){
        var container = $(obj).closest('.search-wrapper');
            if(!container.hasClass('active')){
                container.addClass('active');
                evt.preventDefault();
            }
            else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
                container.removeClass('active');
                container.find('.search-input').val('');
            }
        } 

    </script>
    
@endsection
