@extends('layouts.web')

@section('content')
    <main id="main">
        <!----------------------------------- News ------------------------------------>
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>@foreach ($translations as $item)
                        @if ($item->key == 'apple')
                            {{ $item->val[$lang] }}
                        @endif
                    @endforeach</h2>
                </div>

            </div>
        </section>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-12 entries">

                        <article class="entry">

                            @if(isset($new->img))
                            <div class="entry-img">
                                <img src="{{ asset('uploads/news/'. $new->img) }}" alt="" class="img-fluid">
                            </div>
                            @endif

                            @if(isset($new->title))
                            <h2 class="entry-title">
                                {{ isset($new->title[$lang]) ? $new->title[$lang] : $new->title['en'] }}
                            </h2>
                            @endif

                            @if(isset($new->date))
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time datetime="2020-01-01">{{date('d.m.Y', strtotime($new->date))}}</time></a></li>
                                </ul>
                            </div>
                            @endif

                            @if(isset($new->desc))
                            <div class="entry-content">
                                <p>
                                    {!! isset($new->desc[$lang]) ? $new->desc[$lang] : $new->desc['en'] !!}
                                </p>
                            </div>
                            @endif

                        </article>

                       

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
