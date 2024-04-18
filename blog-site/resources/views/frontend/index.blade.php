@extends('layouts.frontend')
@section('content')
    <section id="hero">

        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <!-- featured post large -->
                    <div class="post featured-post-lg">
                        @forelse ($features as $feature)
                            <div class="details clearfix">
                                <a href="{{ route('post_view', $feature->id) }}"
                                    class="category-badge">{{ $feature->getCategory->category_name }}</a>
                                <h2 class="post-title"><a
                                        href="{{ route('post_view', $feature->id) }}">{{ $feature->blog_title }}</a>
                                </h2>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">{{ $feature->getUser->name }}</a></li>
                                    <li class="list-inline-item">{{ $feature->created_at }}</li>
                                </ul>
                            </div>
                            <a href="{{ route('post_view', $feature->id) }}">
                                <div class="thumb rounded">
                                    <div class="inner data-bg-image"
                                        data-bg-image="{{ asset('uploads/blog_photos') }}/{{ $feature->blog_photo }}"></div>
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>

                </div>

                <div class="col-lg-4">

                    <!-- post tabs -->
                    <div class="post-tabs rounded bordered">
                        <!-- tab navs -->
                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true"
                                    class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab"
                                    role="tab" type="button">Popular</button></li>
                            <li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false"
                                    class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab"
                                    role="tab" type="button">Recent</button></li>
                        </ul>
                        <!-- tab contents -->
                        <div class="tab-content" id="postsTabContent">
                            <!-- loader -->
                            <div class="lds-dual-ring"></div>
                            <!-- popular posts -->
                            <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular"
                                role="tabpanel">
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-1.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your
                                                iPhone Faster</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-2.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method
                                                That Works For All</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-3.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start
                                                Selling Furniture</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-4.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">15 Unheard Ways To Achieve
                                                Greater Walker</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- recent posts -->
                            <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-2.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method
                                                That Works For All</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-1.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your
                                                iPhone Faster</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-4.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">15 Unheard Ways To Achieve
                                                Greater Walker</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-3.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately
                                                Start Selling Furniture</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Editor’s Pick</h3>
                        <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">
                            <div class="col-sm-6">
                                <!-- post -->
                                @forelse ($editors_banner as $post)
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute">{{ $post->getCategory->category_name }}</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/blog_photos') }}/{{ $post->blog_photo }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item"><a href="#"><img
                                                        src="{{ asset('uploads/profile_photos') }}/{{ $post->getUser->photo }}"
                                                        class="author rounded-circle" style="height:40px; width:40px;"
                                                        alt="author" />{{ $post->getUser->name }}</a></li>
                                            <li class="list-inline-item">{{ $post->created_at }}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a
                                                href="{{ route('post_view', $post->id) }}">{{ $post->blog_title }}</a>
                                        </h5>
                                        <p class="excerpt mb-0">
                                            @php
                                                $blog_des = strip_tags($post->blog);
                                                // $blog_id = $blog->id;
                                                if (strlen($blog_des > 80)) {
                                                    $blog_cut = substr($blog_des, 0, 100);
                                                    $endpoint = strrpos($blog_cut, ' ');
                                                    $blog_des = $endpoint
                                                        ? substr($blog_cut, 0, $endpoint)
                                                        : substr($blog_cut, 0);
                                                    $blog_des .=
                                                        "..... <span class='text-info fw-bold'>Read More</span>";
                                                }
                                                echo $blog_des;
                                            @endphp
                                        </p>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <div class="col-sm-6">
                                <!-- post -->
                                @forelse ($editors as $editor)
                                    <div class="post post-list-sm square">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/blog_photos') }}/{{ $editor->blog_photo }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a
                                                    href="{{ route('post_view', $editor->id) }}">{{ $editor->blog_title }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ $editor->created_at }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- horizontal ads -->
                    <div class="ads-horizontal text-md-center">
                        <span class="ads-title">- Sponsored Ad -</span>
                        <a href="#">
                            <img src="{{ asset('frontend-assets') }}/images/ads/ad-750.png" alt="Advertisement" />
                        </a>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Trending</h3>
                        <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">
                            <div class="col-sm-6">
                                <!-- post large -->
                                @forelse ($trend_banner_1 as $trend)
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute">{{ $trend->getCategory->category_name }}</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/blog_photos') }}/{{ $trend->blog_photo }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item"><a href="#"><img
                                                        src="{{ asset('frontend-assets') }}/images/other/author-sm.png"
                                                        class="author" alt="author" />{{ $trend->getUser->name }}</a>
                                            </li>
                                            <li class="list-inline-item">{{ $trend->created_at }}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a
                                                href="blog-single.html">{{ $trend->blog_title }}</a></h5>
                                        <p class="excerpt mb-0">
                                            @php
                                                $blog_des = strip_tags($trend->blog);
                                                // $blog_id = $blog->id;
                                                if (strlen($blog_des > 80)) {
                                                    $blog_cut = substr($blog_des, 0, 100);
                                                    $endpoint = strrpos($blog_cut, ' ');
                                                    $blog_des = $endpoint
                                                        ? substr($blog_cut, 0, $endpoint)
                                                        : substr($blog_cut, 0);
                                                    $blog_des .=
                                                        "..... <span class='text-info fw-bold'>Read More</span>";
                                                }
                                                echo $blog_des;
                                            @endphp
                                        </p>
                                    </div>

                                @empty
                                @endforelse

                                @forelse ($trend_1 as $trend)
                                    <!-- post -->
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/blog_photos') }}/{{ $trend->blog_photo }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make
                                                    Your
                                                    iPhone Faster</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>

                                @empty
                                @endforelse
                            </div>
                            <div class="col-sm-6">
                                <!-- post large -->
                                @forelse ($trend_banner_2 as $trend)
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute">{{ $trend->getCategory->category_name }}</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/blog_photos') }}/{{ $trend->blog_photo }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item"><a href="#"><img
                                                        src="{{ asset('frontend-assets') }}/images/other/author-sm.png"
                                                        class="author" alt="author" />{{ $trend->getUser->name }}</a>
                                            </li>
                                            <li class="list-inline-item">{{ $trend->created_at }}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a
                                                href="blog-single.html">{{ $trend->blog_title }}</a></h5>
                                        <p class="excerpt mb-0">
                                            @php
                                                $blog_des = strip_tags($trend->blog);
                                                // $blog_id = $blog->id;
                                                if (strlen($blog_des > 80)) {
                                                    $blog_cut = substr($blog_des, 0, 100);
                                                    $endpoint = strrpos($blog_cut, ' ');
                                                    $blog_des = $endpoint
                                                        ? substr($blog_cut, 0, $endpoint)
                                                        : substr($blog_cut, 0);
                                                    $blog_des .=
                                                        "..... <span class='text-info fw-bold'>Read More</span>";
                                                }
                                                echo $blog_des;
                                            @endphp
                                        </p>
                                    </div>

                                @empty
                                @endforelse
                                <!-- post -->
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/trending-sm-3.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">Here Are 8 Ways To Success
                                                Faster</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/trending-sm-4.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">Master The Art Of Nature
                                                With These 7 Tips</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Inspiration</h3>
                        <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
                        <div class="slick-arrows-top">
                            <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons"
                                aria-label="Previous"><i class="icon-arrow-left"></i></button>
                            <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons"
                                aria-label="Next"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="row post-carousel-twoCol post-carousel">
                        <!-- post -->
                        <div class="post post-over-content col-md-6">
                            <div class="details clearfix">
                                <a href="category.html" class="category-badge">Inspiration</a>
                                <h4 class="post-title"><a href="blog-single.html">Want To Have A More Appealing
                                        Tattoo?</a></h4>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                            </div>
                            <a href="blog-single.html">
                                <div class="thumb rounded">
                                    <div class="inner">
                                        <img src="{{ asset('frontend-assets') }}/images/posts/inspiration-1.jpg"
                                            alt="thumb" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- post -->
                        <div class="post post-over-content col-md-6">
                            <div class="details clearfix">
                                <a href="category.html" class="category-badge">Inspiration</a>
                                <h4 class="post-title"><a href="blog-single.html">Feel Like A Pro With The Help Of These 7
                                        Tips</a></h4>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                            </div>
                            <a href="blog-single.html">
                                <div class="thumb rounded">
                                    <div class="inner">
                                        <img src="{{ asset('frontend-assets') }}/images/posts/inspiration-2.jpg"
                                            alt="thumb" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- post -->
                        <div class="post post-over-content col-md-6">
                            <div class="details clearfix">
                                <a href="category.html" class="category-badge">Inspiration</a>
                                <h4 class="post-title"><a href="blog-single.html">Your Light Is About To Stop Being
                                        Relevant</a></h4>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                            </div>
                            <a href="blog-single.html">
                                <div class="thumb rounded">
                                    <div class="inner">
                                        <img src="{{ asset('frontend-assets') }}/images/posts/inspiration-3.jpg"
                                            alt="thumb" />
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Latest Posts</h3>
                        <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
                    </div>

                    <div class="padding-30 rounded bordered">

                        <div class="row">

                            @forelse ($latest as $blog)
                                <div class="col-md-12 col-sm-6">
                                    <!-- post -->
                                    <div class="post post-list clearfix">
                                        <div class="thumb rounded">
                                            <span class="post-format-sm">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('uploads/blog_photos') }}/{{ $blog->blog_photo }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-3">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="{{ asset('uploads/profile_photos') }}/{{ $blog->getUser->photo }}"
                                                            class="author rounded-circle" style="width:30px; height:30px;"
                                                            alt="author" />{{ $blog->getUser->name }}</a></li>
                                                <li class="list-inline-item"><a href="#">Trending</a></li>
                                                <li class="list-inline-item">{{ $blog->created_at }}</li>
                                            </ul>
                                            <h5 class="post-title"><a
                                                    href="{{ route('post_view', $blog->id) }}">{{ $blog->blog_title }}</a>
                                            </h5>
                                            @php
                                                $blog_des = strip_tags($blog->blog);
                                                // $blog_id = $blog->id;
                                                if (strlen($blog_des > 80)):
                                                    $blog_cut = substr($blog_des, 0, 80);
                                                    $endpoint = strrpos($blog_cut, ' ');
                                                    $blog_des = $endpoint
                                                        ? substr($blog_cut, 0, $endpoint)
                                                        : substr($blog_cut, 0);
                                                    $blog_des .=
                                                        "..... <span class='text-info fw-bold'>Read More</span>";
                                                endif;
                                                echo $blog_des;
                                                // echo Str::limit($blog->blog);
                                            @endphp
                                            <div class="post-bottom clearfix d-flex align-items-center">
                                                <div class="social-share me-auto">
                                                    <button class="toggle-button icon-share"></button>
                                                    <ul class="icons list-unstyled list-inline mb-0">
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-linkedin-in"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-pinterest"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-telegram-plane"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="far fa-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="more-button float-end">
                                                    <a href="blog-single.html"><span class="icon-options"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>
                        <!-- load more button -->
                        <div class="text-center">
                            <button class="btn btn-simple">Load More</button>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4">

                    <!-- sidebar -->
                    <div class="sidebar">
                        <!-- widget about -->
                        <div class="widget rounded">
                            <div class="widget-about data-bg-image text-center"
                                data-bg-image="{{ asset('frontend-assets') }}/images/map-bg.png">
                                <img src="{{ asset('frontend-assets') }}/images/logo.svg" alt="logo"
                                    class="mb-4" />
                                <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion,
                                    celebrity and lifestyle. We helps clients bring the right content to the right people.
                                </p>
                                <ul class="social-icons list-unstyled list-inline mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- widget popular posts -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Popular Posts</h3>
                                <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave"
                                    alt="wave" />
                            </div>
                            <div class="widget-content">
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">1</span>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-1.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your
                                                iPhone Faster</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">2</span>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-2.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method
                                                That Works For All</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">3</span>
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('frontend-assets') }}/images/posts/tabs-3.jpg"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately
                                                Start Selling Furniture</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- widget categories -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Explore Topics</h3>
                                <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave"
                                    alt="wave" />
                            </div>
                            <div class="widget-content">
                                <ul class="list">
                                    <li><a href="#">Lifestyle</a><span>(5)</span></li>
                                    <li><a href="#">Inspiration</a><span>(2)</span></li>
                                    <li><a href="#">Fashion</a><span>(4)</span></li>
                                    <li><a href="#">Politic</a><span>(1)</span></li>
                                    <li><a href="#">Trending</a><span>(7)</span></li>
                                    <li><a href="#">Culture</a><span>(3)</span></li>
                                </ul>
                            </div>

                        </div>

                        <!-- widget newsletter -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Newsletter</h3>
                                <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave"
                                    alt="wave" />
                            </div>
                            <div class="widget-content">
                                <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                                <form>
                                    <div class="mb-2">
                                        <input class="form-control w-100 text-center" placeholder="Email address…"
                                            type="email">
                                    </div>
                                    <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                                </form>
                                <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a
                                        href="#">Privacy Policy</a></span>
                            </div>
                        </div>

                        <!-- widget post carousel -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Celebration</h3>
                                <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave"
                                    alt="wave" />
                            </div>
                            <div class="widget-content">
                                <div class="post-carousel-widget">
                                    <!-- post -->
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="category.html" class="category-badge position-absolute">How to</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('frontend-assets') }}/images/widgets/widget-carousel-1.jpg"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can
                                                Turn Future Into Success</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="category.html" class="category-badge position-absolute">Trending</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('frontend-assets') }}/images/widgets/widget-carousel-2.jpg"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">Master The Art Of
                                                Nature With These 7 Tips</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="category.html" class="category-badge position-absolute">How to</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('frontend-assets') }}/images/widgets/widget-carousel-1.jpg"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can
                                                Turn Future Into Success</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- carousel arrows -->
                                <div class="slick-arrows-bot">
                                    <button type="button" data-role="none"
                                        class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i
                                            class="icon-arrow-left"></i></button>
                                    <button type="button" data-role="none"
                                        class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i
                                            class="icon-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- widget advertisement -->
                        <div class="widget no-container rounded text-md-center">
                            <span class="ads-title">- Sponsored Ad -</span>
                            <a href="#" class="widget-ads">
                                <img src="{{ asset('frontend-assets') }}/images/ads/ad-360.png" alt="Advertisement" />
                            </a>
                        </div>

                        <!-- widget tags -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Tag Clouds</h3>
                                <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave"
                                    alt="wave" />
                            </div>
                            <div class="widget-content">
                                <a href="#" class="tag">#Trending</a>
                                <a href="#" class="tag">#Video</a>
                                <a href="#" class="tag">#Featured</a>
                                <a href="#" class="tag">#Gallery</a>
                                <a href="#" class="tag">#Celebrities</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
