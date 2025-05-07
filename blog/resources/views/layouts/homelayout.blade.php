<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Dynamic meta data -->
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="blog, food, recipes">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('meta_title')" />
    <meta property="og:description" content="@yield('meta_description')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('meta_image')" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />

    <title>{{ config('app.name') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ config('app.logo') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ config('app.logo') }}" type="image/x-icon">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('blog/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
    <div class="container-fluid">
            <div class="nav-menu">
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li class="logo">
                        <a href="{{ route('index') }}"><img src="{{ config('app.logo') }}" alt=""></a></li>
                        <li class="{{Request::routeIs('index')? 'active':''}}"><a href="{{ route('index') }}">Home</a></li>
                        <li class="{{Request::routeIs('blog_page')? 'active':''}}"><a href="{{ route('blog_page') }}">Blog</a></li>
                        <li class="{{Request::routeIs('recipe')? 'active':''}}"><a href="">Recipes</a></li>
                        <li class="{{Request::routeIs('about')? 'active':''}}"><a href="">About Me</a></li>
                        <!-- <li><a href="categories.html">Categories</a></li> -->
                        <li class="{{Request::routeIs('contact')? 'active':''}}"><a href="">Contact</a></li>
                    </ul>
                    <div class="nav-right search-switch"><i class="fa fa-search"></i></div>
                </nav>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Page Top Recipe Section Begin -->
        @yield('page-top-recipe')
    <!-- Page Top Recipe Section End -->

    <!-- Top Recipe Section Begin -->
        @yield('top-recipe')
    <!-- Top Recipe Section End -->

    <!-- Categories Filter Section Begin -->
        @yield('categories-filter-section')
    <!-- Categories Filter Section End -->

        @yield('main')
    <!-- Feature Recipe Section Begin -->
    <section class="feature-recipe">
       
        
    </section>
    <!-- Feature Recipe Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
    <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="fs-left">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/footer-logo.png" alt="">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                            viverra maecenas accumsan lacus vel facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <form action="#" class="subscribe-form">
                        <h3>Subscribe to our newsletter</h3>
                        <input type="email" placeholder="Your e-mail">
                        <button type="submit">Subscribe</button>
                    </form>
                    <div class="social-links">
                        <a href="#"><i class="fa fa-instagram"></i><span>Instagram</span></a>
                        <a href="#"><i class="fa fa-pinterest"></i><span>Pinterest</span></a>
                        <a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                        <a href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                        <a href="#"><i class="fa fa-youtube"></i><span>Youtube</span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model -->
	<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('blog/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('blog/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('blog/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('blog/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('blog/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('blog/js/main.js') }}"></script>
</body>

</html>