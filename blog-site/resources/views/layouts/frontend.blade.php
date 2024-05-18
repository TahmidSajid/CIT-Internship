<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:38 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Katen - Minimal Blog & Magazine HTML Theme</title>
    <meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend-assets') }}/images/favicon.png">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/all.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/simple-line-icons.css" type="text/css"
        media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/style.css" type="text/css" media="all">

    <!--[if lt IE 9]
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="position-relative">

    <!-- preloader -->
    <div id="preloader">
        <div class="book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>

    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>

        <!-- header -->
        <header class="header-default">
            <nav class="navbar navbar-expand-lg">
                <div class="container-xl">
                    <!-- site logo -->
                    <a class="navbar-brand" href="{{ route('index') }}">
                        @if (App\Models\Logos::first() != [])
                            <img src="{{ asset('uploads/logos') }}/{{ App\Models\Logos::first()->logo }}" alt="logo" />
                        @else
                            <img src="{{ asset('frontend-assets') }}/images/logo.svg" alt="logo" />
                        @endif
                    </a>

                    <div class="collapse navbar-collapse">
                        <!-- menus -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                @php
                                    $banner_one = App\Models\Categories::where('showcase', 'banner_one')->first();
                                @endphp
                                @if ($banner_one)
                                    <a class="nav-link"
                                        href="{{ route('category_post', [$banner_one->id, $banner_one->category_name]) }}">
                                        {{ $banner_one->category_name }}
                                    </a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @php
                                    $banner_two = App\Models\Categories::where('showcase', 'banner_two')->first();
                                @endphp
                                @if ($banner_two)
                                    <a class="nav-link"
                                        href="{{ route('category_post', [$banner_two->id, $banner_two->category_name]) }}">
                                        {{ $banner_two->category_name }}
                                    </a>
                                @endif
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#">More Categories</a>
                                <ul class="dropdown-menu">
                                    @if ($banner_one && $banner_two)
                                        @forelse (App\Models\Categories::where('id','!=',$banner_one->id)->where('id','!=',$banner_two->id)->get() as $category)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('category_post', [$category->id, $category->category_name]) }}">
                                                    {{ $category->category_name }}
                                                </a>
                                            </li>
                                        @empty
                                        @endforelse
                                    @endif
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact_page') }}">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- header right section -->
                    <div class="header-right">
                        <!-- header buttons -->
                        <div class="header-buttons">
                            <button class="search icon-button">
                                <i class="icon-magnifier"></i>
                            </button>
                            <button class="burger-menu icon-button" style="margin-right: 10px">
                                <span class="burger-icon"></span>
                            </button>
                            @if (Auth::check())
                                <a class="d-inline-block icon-button dropdown-toggle" data-bs-toggle="modal"
                                    data-bs-target="#notificationModalLabel" style="margin-right: 10px">
                                    <i class="fa-regular fa-bell"></i>
                                    <span
                                        class="position-absolute top-0 start-75 translate-middle badge  rounded-pill bg-danger">
                                        {{ auth()->user()->unreadNotifications()->count() }}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </a>
                                <!-- Modal -->

                                <a class="d-inline-block icon-button" style="margin-right: 10px"
                                    href="{{ route('user_profile') }}">
                                    <span class="icon-user"></span>
                                </a>
                                <a class="d-inline-block icon-button" href="{{ route('user_logout') }}">
                                    <span class="icon-logout"></span>
                                </a>
                            @else
                                <a class="d-inline-block icon-button" href="{{ route('login_view') }}">
                                    <span class="icon-login"></span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </header>


        <!-- Notification Modal Here
        ================================================== -->
        @include('components.notifications.notifications')


        <!-- section main content start-->

        @yield('content')

        <!-- section main content end-->

        <!-- Post form start
        ================================================== -->
        @auth
            @if (auth()->user()->role == 'writter')
                <div class="row position-fixed" style="right: 0px !important; top:800px !important;">
                    <div class="col-lg-4">
                        <a class="btn btn-danger mx-4" href="{{ route('post.index') }}"
                            style="font-size: 20px; background: linear-gradient(to right, #FE4F70 0%, #FFA387 100%) !important">
                            <span class="icon-pencil mx-2"></span>Write</a>
                    </div>
                </div>
            @endif
        @endauth
        <!-- Post form end
        ================================================== -->

        <!-- footer -->
        <footer>
            <div class="container-xl">
                <div class="footer-inner">
                    <div class="row d-flex align-items-center gy-4">
                        <!-- copyright text -->
                        <div class="col-md-4">
                            <span class="copyright">© 2021 Katen. Template by ThemeGer.</span>
                        </div>

                        <!-- social icons -->
                        <div class="col-md-4 text-center">
                            <!-- social icons -->
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                @forelse (App\Models\Socials::all() as $social)
                                    <li class="list-inline-item">
                                        <a href="{{ $social->social_link }}">
                                            <i class="{{ $social->social_icon }}"></i>
                                        </a>
                                    </li>
                                @empty
                                    <span>No links available yet</span>
                                @endforelse
                            </ul>
                        </div>

                        <!-- go to top button -->
                        <div class="col-md-4">
                            <a href="#" id="return-to-top" class="float-md-end">
                                <i class="icon-arrow-up"></i>
                                Back to Top
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- end site wrapper -->

    <!-- search popup area -->
    <div class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">Press ESC to close</h3>
            </div>
            <!-- form -->
            <form class="d-flex search-form" action="{{ route('search') }}" method="post">
                @csrf
                <input class="form-control me-2" type="search" name="search"
                    placeholder="Search and press enter ..." aria-label="Search">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>
        </div>
    </div>

    <!-- canvas menu -->
    <div class="canvas-menu d-flex align-items-end flex-column">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>

        <!-- logo -->
        <div class="logo">
            <img src="{{ asset('frontend-assets') }}/images/logo.svg" alt="Katen" />
        </div>

        <!-- menu -->
        <nav>
            <ul class="vertical-menu">
                <li class="active">
                    <a href="{{ route('index') }}">Home</a>
                </li>
                @php
                    $banner_one = App\Models\Categories::where('showcase', 'banner_one')->first();
                @endphp
                <li>
                    @if ($banner_one)
                        <a href="{{ route('category_post', [$banner_two->id, $banner_two->category_name]) }}">
                            {{ $banner_two->category_name }}
                        </a>
                    @endif
                </li>
                @php
                    $banner_two = App\Models\Categories::where('showcase', 'banner_two')->first();
                @endphp
                <li>
                    @if ($banner_two)
                        <a href="{{ route('category_post', [$banner_two->id, $banner_two->category_name]) }}">
                            {{ $banner_two->category_name }}
                        </a>
                    @endif
                </li>
                <li>
                    <a href="#">More Categories</a>
                    <ul class="submenu">
                        @if ($banner_one && $banner_two)
                            @forelse (App\Models\Categories::where('id','!=',$banner_one->id)->where('id','!=',$banner_two->id)->get() as $category)
                                <li>
                                    <a
                                        href="{{ route('category_post', [$category->id, $category->category_name]) }}">{{ $category->category_name }}</a>
                                </li>
                            @empty
                            @endforelse
                        @endif
                    </ul>
                </li>
                <li><a href="{{ route('contact_page') }}">Contact</a></li>
            </ul>
        </nav>

        <!-- social icons -->
        <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            @forelse (App\Models\Socials::all() as $social)
                <li class="list-inline-item">
                    <a href="{{ $social->social_link }}">
                        <i class="{{ $social->social_icon }}"></i>
                    </a>
                </li>
            @empty
                <span>No links available yet</span>
            @endforelse
        </ul>
    </div>

    <!-- JAVA SCRIPTS -->
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    {{-- <script src="{{ asset('frontend-assets') }}/js/jquery.min.js"></script> --}}
    <script src="{{ asset('frontend-assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/js/slick.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script src="{{ asset('frontend-assets') }}/js/jquery.sticky-sidebar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend-assets') }}/js/custom.js"></script>

    @yield('alert')

</body>

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:47 GMT -->

</html>
