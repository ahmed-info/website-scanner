<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Scanner Market</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/user_style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    {{-- <link href="{{ asset('css/headers.css') }}" rel="stylesheet" /> --}}
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .dimension {
            width: 500px;
            height: 300px;
        }
    </style>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css"
        integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- phone number css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css"
        integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .iti-flag {
            background-image: url('assets/img/flags.png');
        }

        @media (-webkit-min-device-pixel-ratio:2),
        (min-resolution:192dpi) {
            .iti-flag {
                background-image: url('assets/img/flags@2x.png');
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

</head>

<body id="page-top" dir="ltr">
    <!-- Navigation-->
    <header class="p-3 bg-white fixed-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center fw-bold mb-md-0">
                    <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary">@lang('messages.Home')</a></li>

                    <li class="nav-item dropdown fw-bold">
                        <a class="nav-link dropdown-toggle text-secondary" href="#"  role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @lang('messages.scanners')
                        </a>
                        <ul class="dropdown-menu text-secondary">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('category.id', ['id' => $category->id]) }}">{{ $category->name_en }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="nav-item dropdown fw-bold">
                        <a class="nav-link dropdown-toggle text-secondary" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @lang('messages.Solutions')
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('solution') }}"> @lang('messages.ArchivingSolutions')</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">@lang('messages.WebsiteDevelopment')</a></li>
                            <li><a class="dropdown-item" href="#">@lang('messages.MobileApps')</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('blog') }}" class="nav-link px-2 text-secondary fw-bold">@lang('messages.Blog')</a></li>
                    <li><a href="{{ route('contact') }}" class="nav-link px-2 text-secondary fw-bold">@lang('messages.contactus')</a></li>
                    <li><a href="{{ route('about') }}" class="nav-link px-2 text-secondary fw-bold">@lang('messages.about')</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @if (session()->get('locale') == 'ar')
                            Arabic
                            @else
                            English
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('locale/en') }}"><img src="{{ asset('storage/image/usa.png')}}" alt="en"> English</a></li>
                                <li><a class="dropdown-item" href="{{ url('locale/ar') }}"><img src="{{ asset('storage/image/ksa.png')}}" alt="ar"> Arabic</a></li>


                        </ul>
                    </li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="{{ __('messages.search') }}"
                        aria-label="Search">
                </form>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2"><a
                            href="{{ route('auth.login') }}">@lang('messages.login')</a></button>
                    <button type="button" class="btn btn-warning"><a
                            href="{{ route('auth.register') }}">@lang('messages.signUp')</a></button>
                </div>
            </div>
        </div>
    </header>
    {{-- @include('alert.messages') --}}

    @yield('content')






    <!-- Footer -->
    <footer class="text-center text-lg-start bg-dark">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block" style="color:#FCD61C">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div style="color:#FCD61C;";>
                <a href="https://www.facebook.com/Scanner.market/" class="me-4 text-reset">
                    <i class="fab fa-facebook-f" style="font-size:25px;"></i>
                </a>


                <a href="https://www.instagram.com/Scanner.market/" class="me-4 text-reset">
                    <i class="fab fa-instagram" style="font-size:25px;"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4" style="color:#FCD61C">
                            <i class="fas fa-gem me-3"></i>Scanner Market
                        </h6>
                        <p class="nav-link px-2 text-white">
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4" style="color:#FCD61C">
                            Products
                        </h6>
                        @foreach ($categories as $category)
                            <p class="nav-link px-2 text-white">
                                <a href="{{ route('category.id', ['id' => $category->id]) }}"
                                    class="text-reset">{{ $category->name_en }}</a>

                            </p>
                        @endforeach


                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4" style="color:#FCD61C">
                            Useful links
                        </h6>
                        <p class="nav-link px-2 text-white">
                            <a href="{{ route('home') }}" class="text-reset">@lang('messages.Home')</a>
                        </p>
                        <p class="nav-link px-2 text-white">
                            {{-- <a href="{{ route('scanners') }}" class="text-reset">Scanners</a> --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Scanners
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($categories as $category)
                                        <li><a class="dropdown-item"
                                                href="{{ route('category.id', ['id' => $category->id]) }}">{{ $category->name_en }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                        </p>
                        <p class="nav-link px-2 text-white">
                            <a href="{{ route('blog') }}" class="text-reset">Blog</a>
                        </p>
                        <p class="nav-link px-2 text-white">
                            <a href="{{ route('contact') }}" class="text-reset">Contact Us</a>
                        </p>
                        <p class="nav-link px-2 text-white">
                            <a href="{{ route('about') }}" class="text-reset">About</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4" style="color:#FCD61C">Contact</h6>
                        <p class="nav-link px-2 text-white"><i class="fas fa-home me-3"></i>Baghdad- Opposite the
                            University of Technology</p>
                        <p class="nav-link px-2 text-white">
                            <i class="fas fa-envelope me-3"></i>
                            scanner@market.com
                        </p>
                        <p class="nav-link px-2 text-white"><i class="fas fa-phone me-3"></i>+ 964 7840 5000 29</p>
                        <p class="nav-link px-2 text-white"><i class="fas fa-print me-3"></i>+ 964 7840 5000 29</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" style="color:#FCD61C" href="#">Scanner Market</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- Portfolio Modals-->

    <!-- Bootstrap core JS-->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
    <script src="{{ asset('js/user_js.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"
        integrity="sha512-QMUqEPmhXq1f3DnAVdXvu40C8nbTgxvBGvNruP6RFacy3zWKbNTmx7rdQVVM2gkd2auCWhlPYtcW2tHwzso4SA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>

</html>
