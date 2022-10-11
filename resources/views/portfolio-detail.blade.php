@extends('layouts.web')

@section('content')
    <main id="main">
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row gy-4">
                    <h2>Проект в городе Душанбе</h2>
                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                @foreach ($projects as $item)
                                    {{-- @dd($item) --}}
                                    @if (isset($item->projectImage[0]->img))
                                        <div class="swiper-slide">
                                            <img src="{{ asset($item->projectImage[0]->img) }}" alt="">
                                        </div>
                                    @endif

                                    @if (isset($item->projectImage[1]->img))
                                        <div class="swiper-slide">
                                            <img src="{{ asset($item->projectImage[1]->img) }}" alt="">
                                        </div>
                                    @endif

                                    @if (isset($item->projectImage[2]->img))
                                        <div class="swiper-slide">
                                            <img src="{{ asset($item->projectImage[2]->img) }}" alt="">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>
                                @foreach ($translations as $item)
                                    @if ($item->key == 'project')
                                        {{ $item->val[$lang] }}
                                    @endif
                                @endforeach
                            </h3>
                            <ul>
                                <li><strong>
                                        @foreach ($translations as $item)
                                            @if ($item->key == 'kat')
                                                {{ $item->val[$lang] }}
                                            @endif
                                        @endforeach
                                    </strong>: @foreach ($translations as $item)
                                        @if ($item->key == 'eng')
                                            {{ $item->val[$lang] }}
                                        @endif
                                    @endforeach
                                </li>
                                <li><strong>
                                        @foreach ($translations as $item)
                                            @if ($item->key == 'kilent')
                                                {{ $item->val[$lang] }}
                                            @endif
                                        @endforeach
                                    </strong>: @foreach ($translations as $item)
                                        @if ($item->key == 'tash')
                                            {{ $item->val[$lang] }}
                                        @endif
                                    @endforeach
                                </li>
                                <li><strong>
                                        @foreach ($translations as $item)
                                            @if ($item->key == 'data')
                                                {{ $item->val[$lang] }}
                                            @endif
                                        @endforeach
                                    </strong>
                                    @foreach ($translations as $item)
                                        @if ($item->key == 'time')
                                            {{ $item->val[$lang] }}
                                        @endif
                                    @endforeach
                                </li>
                                <li><strong>
                                        @foreach ($translations as $item)
                                            @if ($item->key == 'url')
                                                {{ $item->val[$lang] }}
                                            @endif
                                        @endforeach
                                    </strong>: <a href="#">www.Atlanticatrade.com</a></li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            @if (isset($project->title))
                                <h2>{{ isset($project->title[$lang]) ? $project->title[$lang] : $project->title['en'] }}
                                </h2>
                            @endif
                            @if (isset($project->subtitle))
                                <p>
                                    {{ isset($project->subtitle[$lang]) ? $project->subtitle[$lang] : $project->subtitle['en'] }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
