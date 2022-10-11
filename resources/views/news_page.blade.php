@extends('layouts.web')

@section('content')
    <main id="main">
        <!----------------------------------- News ------------------------------------>
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>
                        @foreach ($translations as $item)
                            @if ($item->key == 'apple')
                                {{ $item->val[$lang] }}
                            @endif
                        @endforeach
                    </h2>
                </div>

            </div>
        </section>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-12 entries">

                        @foreach ($news as $new)
                            <article class="entry">

                                @if (isset($new->img))
                                    <div class="entry-img">
                                        <img src="{{ asset('uploads/news/' . $new->img) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                @endif

                                @if (isset($new->title))
                                    <h2 class="entry-title">
                                        {{ isset($new->title[$lang]) ? $new->title[$lang] : $new->title['en'] }}
                                    </h2>
                                @endif

                                @if (isset($new->date))
                                    <div class="entry-meta">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                    href="blog-single.html"><time
                                                        datetime="2020-01-01">{{ date('d.m.Y', strtotime($new->date)) }}</time></a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif

                                @if (isset($new->desc))
                                    <div class="entry-content">
                                        <p>
                                            {!! isset($new->desc[$lang]) ? $new->desc[$lang] : $new->desc['en'] !!}
                                        </p>
                                    </div>
                                @endif


                            </article>
                        @endforeach

                        {{-- <article class="entry">

                            <div class="entry-img">
                                <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                Новости оборудования
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time datetime="2020-01-01">May 7, 2022</time></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    Промышленная и оптовая торговля и дистрибуция консалтинговые услуги. международная
                                    доставка грузов и логистика. установка и обслуживание оборудования. Промышленная и
                                    оптовая торговля и дистрибуция. консалтинговые услуги. международная доставка грузов и
                                    логистика. dis dolore.
                                </p>
                            </div>

                        </article>

                        <article class="entry">

                            <div class="entry-img">
                                <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                Новости доставка грузов
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time datetime="2020-01-01">Jan 14, 2022</time></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    Промышленная и оптовая торговля и дистрибуция. консалтинговые услуги. международная
                                    доставка грузов и логистика. установка и обслуживание оборудования. Промышленная и
                                    оптовая торговля и дистрибуция. консалтинговые услуги. международная доставка грузов и
                                    логистика.
                                </p>
                            </div>

                        </article>

                        <article class="entry">

                            <div class="entry-img">
                                <img src="assets/img/blog/blog-4.jpg" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                Новости строительные услуги
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time datetime="2020-01-01">Feb 12, 2020</time></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    Промышленная и оптовая торговля и дистрибуция. консалтинговые услуги. международная
                                    доставка грузов и логистика. установка и обслуживание оборудования. Промышленная и
                                    оптовая торговля и дистрибуция. консалтинговые услуги. международная доставка грузов и
                                    логистика. dis dolore.
                                </p>
                            </div>

                        </article>

                        <article class="entry">

                            <div class="entry-img">
                                <img src="assets/img/blog/blog-5.jpg" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                Новости консалтинговые услуги
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    Промышленная и оптовая торговля и дистрибуция. консалтинговые услуги. международная
                                    доставка грузов и логистика. установка и обслуживание оборудования. Промышленная и
                                    оптовая торговля и дистрибуция. консалтинговые услуги. международная доставка грузов и
                                    логистика. dis dolore.
                                </p>
                            </div>

                        </article>

                        <article class="entry">

                            <div class="entry-img">
                                <img src="assets/img/blog/blog-6.jpg" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                Новости обслуживание оборудования
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time datetime="2020-01-01">Jan 22, 2022</time></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    Промышленная и оптовая торговля и дистрибуция. консалтинговые услуги. международная
                                    доставка грузов и логистика. установка и обслуживание оборудования. Промышленная и
                                    оптовая торговля и дистрибуция. консалтинговые услуги. международная доставка грузов и
                                    логистика. dis dolore.
                                </p>
                            </div>

                        </article>

                        <article class="entry">

                            <div class="entry-img">
                                <img src="assets/img/blog/blog-7.png" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                UzAuto Motors вышла на рынок Таджикистана с 4 моделями Chevrolet
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time datetime="2020-01-01">Jan 12, 2022</time></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    В июне стало известно, что "Узавтосаноат" и компания "АлюминСохтмон" организуют в
                                    Таджикистане совместное предприятие по сборке легковушек — Auto Motors Tadjikistan.
                                    Сначала завод будет выпускать по 10 тысяч автомобилей в год, в дальнейшем показатель
                                    доведут до 35 тысяч.
                                </p>
                            </div>

                        </article> --}}

                        {{-- <div class="blog-pagination">
                            <ul class="justify-content-center">
                                <li><a href="#">1</a></li>
                                <li class="active" style="background-color: #DE5542"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </div> --}}

                    </div>

                </div>

            </div>
        </section>
    </main>
@endsection
