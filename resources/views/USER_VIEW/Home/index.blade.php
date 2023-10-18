@extends('USER_VIEW.layouts.main')
@section('content')
    <section id="hero" class="hero">
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">Trial and Error</h2>
                        <p data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a data-aos="fade-up" data-aos-delay="200" href="{{ route('login') }}" class="btn-get-started">Get
                            Started</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            @foreach ($images as $index => $image)
                @foreach (json_decode($image->image) as $filename)
                    @if (file_exists(public_path("uploads/home_images/$filename")))
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}"
                            style="background-image: url('{{ asset("uploads/home_images/$filename") }}');"></div>
                    @endif
                @endforeach
            @endforeach
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev"><span
                    class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span></a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next"><span
                    class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span></a>
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
            </div>
        </div>
    </section>

    <section id="constructions" class="constructions">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Interruptions</h2>
                <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis
                    dolorem dolore earum</p>
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
                                                            <th class="table-active" colspan="2">
                                                                {{ \Carbon\Carbon::parse($int->startDateTime)->format('M. d h:i A') }}
                                                                to
                                                                {{ \Carbon\Carbon::parse($int->endDateTime)->addDay()->format('M. d, Y h:i A') }}
                                                            </th>
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
                                                                <button class="btn-block mb-1" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseExample-{{ $int->id }}"
                                                                    aria-bs-expanded="false"
                                                                    aria-bs-controls="collapseExample"
                                                                    style="border:none; "> <strong
                                                                        class="text-dark"><small>see more...</small></strong></button>
                                                                <div class="collapse"
                                                                    id="collapseExample-{{ $int->id }}">
                                                                    <textarea style="height: 200px; font-size: 12px; font-weight: bold" class="form-control" disabled>{{ $int->why }}</textarea>
                                                                </div>
                                                            </td>
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
                        <p style="animation: bounce 1.5s infinite; color: red; font-size: 1.5rem; text-transform:uppercase">
                            No interruptions yet..</p>
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
                        <div class="post-img">
                            @foreach (json_decode($new->image, true) as $index => $img)
                            <div class="carousel-item @if ($index == 0) active @endif">
                                <img src="{{ url('uploads/news/' . $img) }}" class="img-fluid">
                            </div>
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
                            <h3 class="sidebar-title navbar">Categories</h3>
                            <ul class="mt-3">
                                <li><a href="#">News &nbsp;<small><span class="badge badge-danger text-light">{{ $news->count() }}</span></small></a></li>
                                <li><a href="#">Interruptions &nbsp;<small><span class="badge badge-danger text-light">{{ $interruptions->count() }}</span></small></a></li>
                                <li><a href="#">Advisories &nbsp;<small><span class="badge badge-danger text-light">{{ $advisories->count() }}</span></small></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item recent-posts">
                            <h3 class="navbar" >
                                <li class="dropdown" style="list-style-type: none;"><a href="#" ><span class="sidebar-title">Recent News</span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                    <ul>
                                        <li><a href="{{ route('all_news') }}" class="{{ request()->is('allnews*') ? 'active' : '' }}">All News</a></li>
                                    </ul>
                                </li>
                            </h3>
                            
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
                                            <time>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i A', $recent->dateTime)->format('M. d, Y h:i A') }}</time>
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
    {{-- <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <section id="recent-blog-posts" class="recent-blog-posts">
                <div class="container" data-aos="fade-up">
                    <div class=" section-header">
                        <h2>Recent News</h2>
                        <p>Be informative and read our latest news</p>
                    </div>
                    <div class="row gy-5">
                        @if (count($news) > 0)
                            @foreach ($news as $new)
                                @include('USER_VIEW.Home.view')
                                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                    <div class="post-item position-relative h-100">
                                        <div class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach (json_decode($new->image, true) as $index => $img)
                                                    <div
                                                        class="carousel-item @if ($index == 0) active @endif">
                                                        <figure>
                                                            <img src="{{ url('uploads/news/' . $img) }}"
                                                                style="height: 200px; width: 100%"
                                                                class="img-fluid rounded">
                                                        </figure>
                                                    </div>
                                                @endforeach
                                                <span
                                                    class="post-date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i A', $new->dateTime)->format('M. d, Y h:i A') }}</span>
                                            </div>
                                        </div>
                                        <div class="post-content d-flex flex-column">
                                            <h3 class="post-title" style="align-items: center">{{ $new->title }}</h3>
                                            <hr>
                                            <a href="#" class="readmore stretched-link" data-bs-toggle="modal"
                                                data-bs-target="#newsView-{{ $new->id }}"><span><i
                                                        class="fa fa-share"></i> Read More</span></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12 text-center">
                                <p
                                    style="animation: bounce 1.5s infinite; color: red; font-size: 1.5rem; text-transform:uppercase">
                                    No news yet..</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $news->links() }}
                </div>
            </section>
        </div>
    </section> --}}
    <style>
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
    </style>

    <script>
        function showFullContent() {
            const contentDiv = document.querySelector('.content');
            contentDiv.style.whiteSpace = 'normal';
        }
    </script>

@endsection
