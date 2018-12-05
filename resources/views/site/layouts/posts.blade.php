<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700,900" rel="stylesheet">
        <!--=======================================
                        CSS
                        ============================================= -->
        <link rel="stylesheet" href="{{'assets/site/css/linearicons.css'}}">
        <link rel="stylesheet" href="{{asset('assets/site/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/css/main.css')}}">

    </head>
    <body>
        <!-- Start Header Area -->
        <header id="header" class="dark">
            <div class="container main-menu">
                <div class="row align-items-center d-flex">
                    <div id="logo">
                        <a href="{{route('home')}}"><img src="{{ asset('assets/site/img/logo2.png')}}" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container" class="ml-auto">
                        <ul class="nav-menu white">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="{{route('site.posts.index')}}">Posts</a></li>
                            <li><a href="#">Sobre</a></li>
                            <li class="menu-has-children"><a href="#">Pages</a>
                                <ul class="dark">
                                    <li><a href="elements.html">Elements</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="services.html">Service</a></li>
                                    <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                </ul>
                            </li>
                            <li class="menu-has-children"><a href="">Blog</a>
                                <ul class="dark">
                                    <li><a href="blog-home.html">Blog Home</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End Header Area -->

        <!-- start banner Area -->
        <section class="banner-area relative">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            {{$titulo}}
                        </h1>
                        <p class="link-nav">
                            <span class="box">
                                <a href="{{route('home')}}">Home </a>
                                <a href="{{route('site.posts.index')}}">Posts</a>
                            </span>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner Area -->

        <!-- Start top-category-widget Area -->
        <section class="top-category-widget-area pt-90 pb-90 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-cat-widget">
                            <div class="content relative">
                                <div class="overlay overlay-bg"></div>
                                <a href="#" target="_blank">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget1.jpg" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Social life</h4>
                                        <span></span>
                                        <p>Enjoy your social life together</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-cat-widget">
                            <div class="content relative">
                                <div class="overlay overlay-bg"></div>
                                <a href="#" target="_blank">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget2.jpg" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Politics</h4>
                                        <span></span>
                                        <p>Be a part of politics</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-cat-widget">
                            <div class="content relative">
                                <div class="overlay overlay-bg"></div>
                                <a href="#" target="_blank">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget3.jpg" alt="">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">Food</h4>
                                        <span></span>
                                        <p>Let the food be finished</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End top-category-widget Area -->

        <!-- Start post-content Area -->
        <section class="post-content-area">
            <div class="container">
                <div class="row">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session('msg'))
                    <div class="alert alert-success">
                        {!! session('msg') !!}
                    </div>
                    @endif
                    @yield('content')

                    <div class="col-lg-4 sidebar-widgets">
                        <div class="widget-wrap">
                            <div class="single-sidebar-widget search-widget">
                                <form class="search-form" action="#">
                                    <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="single-sidebar-widget user-info-widget">
                                <img src="img/blog/user-info.png" alt="">
                                <a href="#"><h4>Charlie Barber</h4></a>
                                <p>
                                    Senior blog writer
                                </p>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                                <p>
                                    Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot
                                    camp when you can get. Boot camps have itssuppor ters andits detractors.
                                </p>
                            </div>
                            <div class="single-sidebar-widget popular-post-widget">
                                <h4 class="popular-title">Popular Posts</h4>
                                <div class="popular-post-list">
                                    @foreach($ultimosPosts as $ultimoPost)
                                    <div class="single-post-list d-flex flex-row align-items-center">
                                        <div class="thumb">
                                            <img class="img-fluid" src="{{ url('assets/capas_posts/'.$ultimoPost->img) }}">
                                        </div>
                                        <div class="details">
                                            <a href="{{route('site.posts.show',$ultimoPost->id)}}"><h6>{{$ultimoPost->title}}</h6></a>
                                            <p>{{$ultimoPost->created_at->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="single-sidebar-widget ads-widget">
                                <a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
                            </div>
                            <div class="single-sidebar-widget post-category-widget">
                                <h4 class="category-title">Post Catgories</h4>
                                <ul class="cat-list">
                                    @foreach($categorias as $categoria)
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>{{$categoria->nome}}</p>
                                            <p>37</p>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>                            
                            <div class="single-sidebar-widget tag-cloud-widget">
                                <h4 class="tagcloud-title">Tag Clouds</h4>
                                <ul>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Architecture</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Food</a></li>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Adventure</a></li>
                                    <li><a href="#">Food</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">Adventure</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End post-content Area -->

        <!-- Horizontal bar -->
        <div class="container">
            <hr>
        </div>

        <!-- start footer Area -->
        <footer class="footer-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="footer-top flex-column">
                            <div class="footer-logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="">
                                </a>
                                <h4>Follow Me</h4>
                            </div>
                            <div class="footer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row footer-bottom justify-content-center">
                    <p class="col-lg-8 col-sm-12 footer-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->

        <!-- Horizontal bar -->
        <div class="container">
            <hr>
        </div>

        <!-- ####################### Start Scroll to Top Area ####################### -->
        <div id="back-top">
            <a title="Go to Top" href="#">
                <i class="lnr lnr-arrow-up"></i>
            </a>
        </div>
        <!-- ####################### End Scroll to Top Area ####################### -->
        <!-- Scripts -->

        <script src="{{ asset('assets/site/js/vendor/jquery-2.2.4.min.js')}}"></script>
        <script src="{{ asset('assets/site/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/site/js/easing.min.js')}}"></script>
        <script src="{{ asset('assets/site/js/hoverIntent.js')}}"></script>
        <script src="{{ asset('assets/site/js/superfish.min.js')}}"></script>
        <script src="{{ asset('assets/site/js/mn-accordion.js')}}"></script>
        <script src="{{ asset('assets/site/js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{ asset('assets/site/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('assets/site/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('assets/site/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{ asset('assets/site/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('assets/site/js/jquery.circlechart.js')}}"></script>
        <script src="{{ asset('assets/site/js/mail-script.js')}}"></script>
        <script src="{{ asset('assets/site/js/wow.min.js')}}"></script>
        <script src="{{ asset('assets/site/js/main.js')}}"></script>

    </body>
</html>
