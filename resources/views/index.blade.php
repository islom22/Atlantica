@extends('layouts.web')

@section('content')
    <!----------------------------------- Баннер ------------------------------------>
    {{-- @dd($translations) --}}
    @if (isset($banners[0]))
        <section id="hero">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    @foreach ($banners as $banner)
                        <div class="carousel-item active"
                            style="background-image: url({{ asset('./uploads/banners/' . $banner->img) }})">
                            <div class="carousel-container">
                                <div class="container">
                                    @if (isset($banner->title))
                                        <h2 class="animate__animated animate__fadeInDown">ATLANTICA
                                            <span>{{ isset($banner->title[$lang]) ? $banner->title[$lang] : $banner->title['en'] }}</span>
                                        </h2>
                                    @endif
                                    @if (isset($banner->desc))
                                        <p class="animate__animated animate__fadeInUp">{!! isset($banner->desc[$lang]) ? $banner->desc[$lang] : $banner->desc['en'] !!}</p>
                                    @endif
                                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto"
                                        style="background-color: #DE5542">
                                        @foreach ($translations as $item)
                                            @if ($item->key == 'first')
                                                {{ $item->val[$lang] }}
                                            @endif
                                        @endforeach
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </section>
    @endif

    <main id="main">

        <!----------------------------------- О Нас ------------------------------------>
        {{-- @if (isset($about[0])) --}}
        <section id="about" class="about" style="background-color: #F6F9FD">
            <div class="container">

                <div class="row content">
                    @if (isset($about->title))
                        <div class="col-lg-6">
                            <h2>{{ isset($about->title[$lang]) ? $about->title[$lang] : $about->title['en'] }}</h2>
                            {{-- <h3>Промышленная и оптовая торговля и дистрибуция. консалтинговые услуги международная доставка
                            грузов и логистика.</h3> --}}
                        </div>
                    @endif
                    @if (isset($about->desc))
                        <div class="col-lg-6 pt-4 pt-lg-0">
                            <p>
                                {!! isset($about->desc[$lang]) ? $about->desc[$lang] : $about->desc['en'] !!}
                                {{-- Промышленная и оптовая торговля и дистрибуция. консалтинговые услуги. международная доставка
                            грузов и логистика. установка и обслуживание оборудования. Промышленная и оптовая торговля и
                            дистрибуция. консалтинговые услуги. международная доставка грузов и логистика. --}}
                            </p>
                            {{-- <ul>
                            <li><i class="ri-check-double-line"></i> Международная доставка грузов и логистика.</li>
                            <li><i class="ri-check-double-line"></i> Промышленная и оптовая торговля и дистрибуция.</li>
                            <li><i class="ri-check-double-line"></i> Промышленная и оптовая торговля и дистрибуция.
                                консалтинговые услуги. международная доставка грузов и логистика</li>
                        </ul>
                        <p class="fst-italic">
                            Промышленная и оптовая торговля и дистрибуция. консалтинговые услуги. международная доставка
                            грузов и логистика.
                        </p> --}}
                        </div>
                    @endif
                </div>

            </div>
        </section>
        {{-- @endif --}}

        <!----------------------------------- Наши проекты ------------------------------------>
        @if (isset($projects[0]))
            <section id="projects" class="projects">
                <div class="container">

                    <div class="section-title">
                        <h2>
                            @foreach ($translations as $item)
                                @if ($item->key == 'second')
                                    {{ $item->val[$lang] }}
                                @endif
                            @endforeach
                        </h2>
                        <p>
                            @foreach ($translations as $item)
                                @if ($item->key == 'second')
                                    {{ $item->val[$lang] }}
                                @endif
                            @endforeach
                        </p>
                    </div>

                    <div class="container">
                        <div class="row">
                            @foreach ($projects as $project)
                                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                    @if (isset($project->projectImage[0]->img))
                                        <img src="{{ asset($project->projectImage[0]->img) }}" class="img-fluid"
                                            alt="">
                                        <div class="portfolio-info">
                                            @if (isset($project->title))
                                                <h4>{{ isset($project->title[$lang]) ? $project->title[$lang] : $project->title['en'] }}
                                                </h4>
                                            @endif
                                            @if (isset($project->subtitle))
                                                <p>{{ isset($project->subtitle[$lang]) ? $project->subtitle[$lang] : $project->subtitle['en'] }}
                                                </p>
                                            @endif
                                            <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                                                class="portfolio-lightbox preview-link" title="Проект"><i
                                                    class="bx bx-plus"></i></a>
                                            <a href="{{ route('projects', ['id' => $project->id]) }}" class="details-link"
                                                title="More Details"><i class="bx bx-link"></i></a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!----------------------------------- Новости ------------------------------------>
        @if (isset($news[0]))
            <section id="news" class="news">
                <div class="container">

                    <div class="section-title">
                        <h2>
                            @foreach ($translations as $item)
                                @if ($item->key == 'apple')
                                    {{ $item->val[$lang] }}
                                @endif
                            @endforeach
                        </h2>
                        <p>
                            @foreach ($translations as $item)
                                @if ($item->key == 'apple')
                                    {{ $item->val[$lang] }}
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="container">
                        <div class="row">
                            <a href="{{ route('news_inner') }}" class="ir-semibold services__top-link"
                                style="font-family: 'Inter',sans-serif;
                      font-weight: 600;">
                                @foreach ($translations as $item)
                                    @if ($item->key == 'all')
                                        {{ $item->val[$lang] }}
                                    @endif
                                @endforeach
                            </a>
                            <div class="row no-gutters" style="line-height: 1.8;">
                                @foreach ($news as $item)
                                    <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
                                        <div class="count-box">
                                            <!--<img src="assets/img/news/index.png">-->
                                            @if (isset($item->desc))
                                                <p style="padding: 10px">{!! isset($item->desc[$lang]) ? $item->desc[$lang] : $item->desc['en'] !!}</p>
                                            @endif
                                            <a href="{{ route('news', ['id' => $item->id]) }}"
                                                style="background-color: #DE5542; padding: 10px; border-radius: 5px; color: white">
                                                @foreach ($translations as $item)
                                                    @if ($item->key == 'first')
                                                        {{ $item->val[$lang] }}
                                                    @endif
                                                @endforeach
                                                &raquo;
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
            </section>
        @endif

        <!----------------------------------- Тестимониал ------------------------------------>
        @if (isset($comments[0]))
            <section id="testimonials" class="testimonials" style="background-color: #DE5542">
                <div class="container">

                    <div class="section-title">
                        <h2>
                            @foreach ($translations as $item)
                                @if ($item->key == 'one')
                                    {{ $item->val[$lang] }}
                                @endif
                            @endforeach
                        </h2>
                        <p>
                            @foreach ($translations as $item)
                                @if ($item->key == 'one')
                                    {{ $item->val[$lang] }}
                                @endif
                            @endforeach
                        </p>
                    </div>

                    <div class="container">
                        <div class="row">
                            @foreach ($comments as $comment)
                                <div class="col-lg-6">
                                    <div class="testimonial-item">
                                        @if (isset($comment->img))
                                            <img src="{{ asset('uploads/comment/' . $comment->img) }}"
                                                class="testimonial-img" alt="">
                                        @endif
                                        @if (isset($comment->title))
                                            <h3>{{ isset($comment->title[$lang]) ? $comment->title[$lang] : $comment->title['en'] }}
                                            </h3>
                                        @endif
                                        @if (isset($comment->date))
                                            <h4>{{ date('d.m.Y', strtotime($comment->date)) }}</h4>
                                        @endif
                                        @if (isset($comment->desc))
                                            <p>
                                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                {!! isset($comment->desc[$lang]) ? $comment->desc[$lang] : $comment->desc['en'] !!}
                                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
            </section>
        @endif

        <!----------------------------------- FAQ ------------------------------------>
        @if (isset($querys[0]))
            <section id="faq" class="faq">
                <div class="container">

                    <div class="section-title">
                        <h2>F.A.Q</h2>
                        <p>
                            @foreach ($translations as $item)
                                @if ($item->key == 'orange')
                                    {{ $item->val[$lang] }}
                                @endif
                            @endforeach
                        </p>
                    </div>

                    @foreach ($querys as $query)
                        <div class="row faq-item d-flex align-items-stretch">
                            @if (isset($query->question))
                                <div class="col-lg-5">
                                    <i class="bx bx-help-circle"></i>
                                    <h4>{{ isset($query->question[$lang]) ? $query->question[$lang] : $query->question['en'] }}
                                    </h4>
                                </div>
                            @endif
                            @if (isset($query->answer))
                                <div class="col-lg-7">
                                    <p>
                                        {!! isset($query->answer[$lang]) ? $query->answer[$lang] : $query->answer['en'] !!}
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endforeach


                </div>
            </section>
        @endif

        <!----------------------------------- Наш партнер ------------------------------------>
        <section id="faq" class="faq">
            <div class="container">

                <div class="section-title">
                    <h2>
                        @foreach ($translations as $item)
                            @if ($item->key == 'smoke')
                                {{ $item->val[$lang] }}
                            @endif
                        @endforeach
                    </h2>
                    <!--<p>Нам доверяют</p>-->
                </div>

                @if (isset($partners[0]))
                    <section class="clients" id="clients">
                        <div class="container">
                            <div class="row">
                                @foreach ($partners as $partner)
                                    @if (isset($partner->img))
                                        <div class="col-sm-10 col-md-3 m-auto">
                                            <a href="{{ $partner->link }}"><img
                                                    src="{{ asset('uploads/partner/' . $partner->img) }}"
                                                    style="margin-bottom: 30px;" class="img-thumbnail" alt="Logo"
                                                    width="100%"></a>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </section>
                @endif

                <!----------------------------------- Контакты ------------------------------------>
                <section id="faq" class="faq">
                    <div class="container">

                        <div class="section-title">
                            <h2>
                                @foreach ($translations as $item)
                                    @if ($item->key == 'snake')
                                        {{ $item->val[$lang] }}
                                    @endif
                                @endforeach
                            </h2>
                            <p>
                                @foreach ($translations as $item)
                                    @if ($item->key == 'snake')
                                        {{ $item->val[$lang] }}
                                    @endif
                                @endforeach
                            </p>
                        </div>

                    </div>
                </section>

                <section id="contact" class="contact" style="margin-top: -170px">
                    <div class="container">

                        <div class="row mt-5">

                            <div class="col-lg-4">
                                <div class="info">
                                    @if (isset($about->address1))
                                        <div class="address">
                                            <i class="bi bi-geo-alt"></i>
                                            <h4>
                                                @foreach ($translations as $item)
                                                    @if ($item->key == 'pool')
                                                        {{ $item->val[$lang] }}
                                                    @endif
                                                @endforeach
                                            </h4>
                                            <p>
                                                @foreach ($translations as $item)
                                                    @if ($item->key == 'pool')
                                                        {{ $item->val[$lang] }}
                                                    @endif
                                                @endforeach {{ $about->address1 }}
                                            </p>
                                        </div>
                                    @endif

                                    @if (isset($about->email))
                                        <div class="email">
                                            <i class="bi bi-envelope"></i>
                                            <h4>Email:</h4>
                                            <p>{{ $about->email }}</p>
                                        </div>
                                    @endif

                                    @if (isset($about->phone))
                                        <div class="phone">
                                            <i class="bi bi-phone"></i>
                                            <h4>
                                                @foreach ($translations as $item)
                                                    @if ($item->key == 'tel')
                                                        {{ $item->val[$lang] }}
                                                    @endif
                                                @endforeach
                                            </h4>
                                            <p>{{ $about->phone }}</p>
                                        </div>
                                    @endif

                                </div>

                            </div>

                            @if (\App::isLocale('en'))
                                <div class="col-lg-8 mt-5 mt-lg-0">

                                    <form action="{{ route('order') }}" method="post" role="form"
                                        class="php-email-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name') }}" id="name" placeholder="Name"
                                                    required>
                                            </div>
                                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ old('email') }}" id="email" placeholder="Email"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" name="text"
                                                value="{{ old('text') }}" id="text" placeholder="Topic" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <textarea class="form-control" name="message" rows="5" value="{{ old('message') }}"
                                                placeholder="Message ..."></textarea>
                                        </div>
                                        {{-- <div class="my-3"> 
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>
                                    </div> --}}
                                        <div class="text-center"><button type="submit">
                                                @foreach ($translations as $item)
                                                    @if ($item->key == 'send')
                                                        {{ $item->val[$lang] }}
                                                    @endif
                                                @endforeach
                                            </button></div>
                                    </form>

                                </div>
                            @endif

                            @if (\App::isLocale('ru'))
                                <div class="col-lg-8 mt-5 mt-lg-0">

                                    <form action="{{ route('order') }}" method="post" role="form"
                                        class="php-email-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name') }}" id="name" placeholder="Имя"
                                                    required>
                                            </div>
                                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ old('email') }}" id="email" placeholder="Email"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" name="text"
                                                value="{{ old('text') }}" id="text" placeholder="Тема" required>
                                        </div>
                                        <div class="form-group mt-3">
                                            <textarea class="form-control" name="message" rows="5" value="{{ old('message') }}"
                                                placeholder="Сообщение ..."></textarea>
                                        </div>
                                        {{-- <div class="my-3"> 
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>
                                    </div> --}}
                                        <div class="text-center"><button type="submit">
                                                @foreach ($translations as $item)
                                                    @if ($item->key == 'send')
                                                        {{ $item->val[$lang] }}
                                                    @endif
                                                @endforeach
                                            </button></div>
                                    </form>

                                </div>
                            @endif

                        </div>

                    </div>
                </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script type="text/javascript">
        @if (Session::has('message'))
            const notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top',
                },
                types: [{
                    type: 'info',
                    background: '#0948B3'
                }]
            });
            notyf.open({
                type: 'info',
                message: '{{ Session::get('message') }}'
            });
        @endif
    </script>
@endsection
