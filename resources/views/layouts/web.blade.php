<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Atlantica Trade</title>
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .active {
            font-weight: 600;
        }
    </style>

</head>

<body>
    <!----------------------------------- Меню ------------------------------------>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <!--<h1 class="logo me-auto"><a href="index.html">Atlantica Trade</a></h1>-->

            <a href="{{ route('index') }}" class="logo me-auto"><img src="{{ asset('img/logo/logo.png') }}"
                    alt="" class="img-fluid"></a>
            {{-- @dd($about) --}}
            <nav id="navbar" class="navbar">
                <ul>
                    @foreach ($mains as $main)
                        <li><a href="{{ $main->link }}"
                                class="">{{ isset($main->title[$lang]) ? $main->title[$lang] : $main->title['en'] }}</a>
                        </li>
                    @endforeach
                    <!--<li><a href="signup.html" class="getstarted">Войти</a></li>-->
                    <li>

                        <div class="header__lang header__lang--mobile">
                            @foreach ($langs as $lang)
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.998 9C16.998 13.4172 13.4172 16.998 9.00001 16.998M16.998 9C16.998 4.58283 13.4172 1.002 9.00001 1.002M16.998 9H1.00201M9.00001 16.998C4.58284 16.998 1.00201 13.4172 1.00201 9M9.00001 16.998C10.7944 16.998 12.249 13.4172 12.249 9C12.249 4.58283 10.7944 1.002 9.00001 1.002M9.00001 16.998C7.20564 16.998 5.75101 13.4172 5.75101 9C5.75101 4.58283 7.20564 1.002 9.00001 1.002M1.00201 9C1.00201 4.58283 4.58284 1.002 9.00001 1.002"
                                        stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>


                                <a href="{{ route('setlocale', ['lang' => $lang->small]) }}"
                                    class="header__lang-item  @if (App::getLocale() == $lang->small) active @endif  "
                                    onclick="activeFun">{{ $lang->small }}</a>
                            @endforeach


                        </div>

                        <div class="header__lang ">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.998 9C16.998 13.4172 13.4172 16.998 9.00001 16.998M16.998 9C16.998 4.58283 13.4172 1.002 9.00001 1.002M16.998 9H1.00201M9.00001 16.998C4.58284 16.998 1.00201 13.4172 1.00201 9M9.00001 16.998C10.7944 16.998 12.249 13.4172 12.249 9C12.249 4.58283 10.7944 1.002 9.00001 1.002M9.00001 16.998C7.20564 16.998 5.75101 13.4172 5.75101 9C5.75101 4.58283 7.20564 1.002 9.00001 1.002M1.00201 9C1.00201 4.58283 4.58284 1.002 9.00001 1.002"
                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            @foreach ($langs as $lang)
                                <a href="{{ route('setlocale', ['lang' => $lang->small]) }}"
                                    class="header__lang-item  @if (App::getLocale() == $lang->small) active @endif  "
                                    onclick="activeFun">{{ $lang->small }}</a>
                            @endforeach


                        </div>

                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>

    @yield('content')


    <!----------------------------------- Нижний часть ------------------------------------>
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>Atlantica Trade</h3>
                            @if (isset($about->address1) || isset($about->address2))
                                <p>
                                    {{ $about->address1 ? $about->address1 : '' }}
                                    {{ $about->address2 ? ', ' . $about->address2 : '' }},<br><br>
                                    @if (isset($about->phone))
                                        <strong>Phone:</strong> {{ $about->phone }}<br>
                                    @endif
                                    @if (isset($about->email))
                                        <strong>Email:</strong> {{ $about->email }}<br>
                                    @endif
                                </p>
                            @endif
                            {{-- @dd($about) --}}
                            <div class="social-links mt-3">
                                @if (isset($about->twitter))
                                    <a href="{{ $about->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                                @endif
                                @if (isset($about->facebook))
                                    <a href="{{ $about->facebook }}" class="facebook"><i
                                            class="bx bxl-facebook"></i></a>
                                @endif
                                @if (isset($about->instagram))
                                    <a href="{{ $about->instagram }}" class="instagram"><i
                                            class="bx bxl-instagram"></i></a>
                                @endif
                                @if (isset($about->skype))
                                    <a href="{{ $about->skype }}" class="google-plus"><i class="bx bxl-skype"></i></a>
                                @endif
                                @if (isset($about->linkedin))
                                    <a href="{{ $about->linkedin }}" class="linkedin"><i
                                            class="bx bxl-linkedin"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>
                            @foreach ($translations as $item)
                                @if (\App::isLocale('en'))
                                    @if ($item->key == 'menu')
                                        {{ $item->val['en'] }}
                                    @endif
                                @endif
                                @if (\App::isLocale('ru'))
                                    @if ($item->key == 'menu')
                                        {{ $item->val['ru'] }}
                                    @endif
                                @endif
                            @endforeach
                        </h4>
                        <ul>
                            {{-- @dd() --}}
                            {{-- @dd($lang->small) --}}
                            @foreach ($mains as $main)
                                @if (\App::isLocale('en'))
                                    {{-- @if ($lang->small == 'en') --}}
                                    <li><i class="bx bx-chevron-right"></i> <a
                                            href="{{ $main->link }}">{{ $main->title['en'] }}</a></li>
                                @endif
                                {{-- @if ($lang->small == 'ru') --}}
                                @if (\App::isLocale('ru'))
                                    <li><i class="bx bx-chevron-right"></i> <a
                                            href="{{ $main->link }}">{{ $main->title['ru'] }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>


                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>
                            @foreach ($translations as $item)
                                @if (\App::isLocale('en'))
                                    @if ($item->key == 'second')
                                        {{ $item->val['en'] }}
                                    @endif
                                @endif
                                @if (\App::isLocale('ru'))
                                    @if ($item->key == 'second')
                                        {{ $item->val['ru'] }}
                                    @endif
                                @endif
                            @endforeach
                        </h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">
                                    @foreach ($translations as $item)
                                        @if (\App::isLocale('en'))
                                            @if ($item->key == 'market')
                                                {{ $item->val['en'] }}
                                            @endif
                                        @endif
                                        @if (\App::isLocale('ru'))
                                            @if ($item->key == 'market')
                                                {{ $item->val['ru'] }}
                                            @endif
                                        @endif
                                    @endforeach
                                </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">
                                    @foreach ($translations as $item)
                                        @if (\App::isLocale('en'))
                                            @if ($item->key == 'kons')
                                                {{ $item->val['en'] }}
                                            @endif
                                        @endif
                                        @if (\App::isLocale('ru'))
                                            @if ($item->key == 'kons')
                                                {{ $item->val['ru'] }}
                                            @endif
                                        @endif
                                    @endforeach
                                </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">
                                    @foreach ($translations as $item)
                                        @if (\App::isLocale('en'))
                                            @if ($item->key == 'mon')
                                                {{ $item->val['en'] }}
                                            @endif
                                        @endif
                                        @if (\App::isLocale('ru'))
                                            @if ($item->key == 'mon')
                                                {{ $item->val['ru'] }}
                                            @endif
                                        @endif
                                    @endforeach
                                </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">
                                    @foreach ($translations as $item)
                                        @if (\App::isLocale('en'))
                                            @if ($item->key == 'equip')
                                                {{ $item->val['en'] }}
                                            @endif
                                        @endif
                                        @if (\App::isLocale('ru'))
                                            @if ($item->key == 'equip')
                                                {{ $item->val['ru'] }}
                                            @endif
                                        @endif
                                    @endforeach
                                </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">
                                    @foreach ($translations as $item)
                                        @if (\App::isLocale('en'))
                                            @if ($item->key == 'raw')
                                                {{ $item->val['en'] }}
                                            @endif
                                        @endif
                                        @if (\App::isLocale('ru'))
                                            @if ($item->key == 'raw')
                                                {{ $item->val['ru'] }}
                                            @endif
                                        @endif
                                    @endforeach
                                </a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-link">
                        <h4>
                            @foreach ($translations as $item)
                                @if (\App::isLocale('en'))
                                    @if ($item->key == 'ish')
                                        {{ $item->val['en'] }}
                                    @endif
                                @endif
                                @if (\App::isLocale('ru'))
                                    @if ($item->key == 'ish')
                                        {{ $item->val['ru'] }}
                                    @endif
                                @endif
                            @endforeach
                        </h4>
                        <p>
                            @foreach ($translations as $item)
                                @if (\App::isLocale('en'))
                                    @if ($item->key == 'work')
                                        {{ $item->val['en'] }}
                                    @endif
                                @endif
                                @if (\App::isLocale('ru'))
                                    @if ($item->key == 'work')
                                        {{ $item->val['ru'] }}
                                    @endif
                                @endif
                            @endforeach
                        </p>
                        <i>Пн 9:00 - 18:00</i><br>
                        <i>Вт 9:00 - 18:00</i><br>
                        <i>Ср 9:00 - 18:00</i><br>
                        <i>Чт 9:00 - 18:00</i><br>
                        <i>Пт 9:00 - 18:00</i><br>
                        <i>Сб 9:00 - 15:00</i><br>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Atlantica</span></strong>. All Rights Reserved Designed Datlan Company.
            </div>
        </div>
    </footer>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
