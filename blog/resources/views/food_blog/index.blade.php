@extends('layouts.layout')
@section('content')
<!-- Hero Section Begin -->
<section class="hero">
        <div class="hero__slider owl-carousel">
        @foreach($slides as $slide)
            <div class="hero__item">
                <div class="container-fluid">
                    <div class="row">
                        @foreach($slide['main'] as $mainBlog)
                        <div class="col-lg-6 p-0">
                            <div class="hero__inside__item hero__inside__item--wide set-bg"
                                data-setbg="{{ $mainBlog->images()->first() ? asset('storage/' . $mainBlog->images()->first()->file_path) : asset('favicon.ico') }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta">
                                    <span>{{ $mainBlog->created_at->format('j') }}</span>
                                    <p>{{ $mainBlog->created_at->format('F') }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <!-- <ul class="label">
                                            @foreach($mainBlog->categories as $category)
                                            <li>{{ $category->name }}</li>
                                            @endforeach
                                        </ul> -->
                                        <h4>{{ $mainBlog->title }}</h4>
                                        <ul class="widget">
                                            <li>by <span>{{ $mainBlog->user->name }}</span></li>
                                            <li>{{ $mainBlog->reading_time }}</li>
                                            <li>20 Comment</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-3 col-md-6  p-0">
                        @foreach($slide['small'] as $smblog)
                            <div class="hero__inside__item hero__inside__item--small set-bg"
                                data-setbg="{{ $smblog->images()->first() ? asset('storage/' . $smblog->images()->first()->file_path) : 'Image' }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta">
                                    <span>{{ $smblog->created_at->format('j') }}</span>
                                    <p>{{ $smblog->created_at->format('F') }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <!-- <ul class="label">
                                        @foreach($smblog->categories as $category)
                                            <li>{{ $category->name }}</li>
                                            @endforeach
                                        </ul> -->
                                        <h5>{{ $smblog->title }}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @foreach($slide['long'] as $longBlog)
                        <div class="col-lg-3 col-md-6  p-0">
                            <div class="hero__inside__item set-bg" data-setbg="{{ $longBlog->images()->first() ? asset('storage/' . $longBlog->images()->first()->file_path) : 'Image' }}">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta">
                                        <span>{{ $longBlog->created_at->format('j') }}</span>
                                        <p>{{ $longBlog->created_at->format('F') }}</p>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <!-- <ul class="label">
                                        @foreach($longBlog->categories as $category)
                                            <li>{{ $category->name }}</li>
                                            @endforeach
                                        </ul> -->
                                        <h5>{{ $longBlog->title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                        <div class="categories__hover__text">
                            <h5>Dinner</h5>
                            <p>28 articles</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                        <div class="categories__hover__text">
                            <h5>Dinner</h5>
                            <p>28 articles</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                        <div class="categories__hover__text">
                            <h5>Dinner</h5>
                            <p>28 articles</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                        <div class="categories__hover__text">
                            <h5>Dinner</h5>
                            <p>28 articles</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="categories__post">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="categories__post__item categories__post__item--large">
                            <div class="categories__post__item__pic set-bg"
                                data-setbg="img/categories/categories-post/cp-1.jpg">
                                <div class="post__meta">
                                    <h4>08</h4>
                                    <span>Aug</span>
                                </div>
                            </div>
                            <div class="categories__post__item__text">
                                <ul class="post__label--large">
                                    <li>Vegan</li>
                                    <li>Desserts</li>
                                </ul>
                                <h3><a href="{{ route('singlepost') }}">The Absolute Best Way to Cook Steak Perfectly, According to Wayyy Too
                                        Many Tests</a></h3>
                                <ul class="post__widget">
                                    <li>by <span>Admin</span></li>
                                    <li>3 min read</li>
                                    <li>20 Comment</li>
                                </ul>
                                <p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                                    excepteur sint ...</p>
                                <a href="#" class="primary-btn">Read more</a>
                                <div class="post__social">
                                    <span>Share</span>
                                    <a href="#"><i class="fa fa-facebook"></i> <span>82</span></a>
                                    <a href="#"><i class="fa fa-twitter"></i> <span>24</span></a>
                                    <a href="#"><i class="fa fa-envelope-o"></i> <span>08</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="categories__post__item">
                                    <div class="categories__post__item__pic small__item set-bg"
                                        data-setbg="img/categories/categories-post/cp-2.jpg">
                                        <div class="post__meta">
                                            <h4>08</h4>
                                            <span>Aug</span>
                                        </div>
                                    </div>
                                    <div class="categories__post__item__text">
                                        <span class="post__label">Recipe</span>
                                        <h3><a href="#">The Best Weeknight Baked Potatoes, 3 Creative Ways</a></h3>
                                        <ul class="post__widget">
                                            <li>by <span>Admin</span></li>
                                            <li>3 min read</li>
                                            <li>20 Comment</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices
                                            gravida...</p>
                                    </div>
                                </div>
                                <div class="categories__post__item">
                                    <div class="categories__post__item__pic set-bg"
                                        data-setbg="img/categories/categories-post/cp-4.jpg">
                                        <div class="post__meta">
                                            <h4>08</h4>
                                            <span>Aug</span>
                                        </div>
                                    </div>
                                    <div class="categories__post__item__text">
                                        <ul class="post__label--large">
                                            <li>Vegan</li>
                                            <li>Desserts</li>
                                        </ul>
                                        <h3><a href="#">The Best Grass Stain Remover Is Already In Your Pantry</a></h3>
                                        <ul class="post__widget">
                                            <li>by <span>Admin</span></li>
                                            <li>3 min read</li>
                                            <li>20 Comment</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices
                                            gravida...</p>
                                    </div>
                                </div>
                                <div class="categories__post__item__plain set-bg"
                                    data-setbg="img/categories/categories-post/cp-6.jpg">
                                    <div class="categories__post__item__text">
                                        <div class="post__meta">
                                            <h4>08</h4>
                                            <span>Aug</span>
                                        </div>
                                        <ul class="post__label--large">
                                            <li>Vegan</li>
                                            <li>Desserts</li>
                                        </ul>
                                        <h3><a href="#">This Summer Snacking Cake Is theSweetest Excuse to...</a></h3>
                                        <div class="post__social">
                                            <span>Share</span>
                                            <a href="#"><i class="fa fa-facebook"></i> <span>82</span></a>
                                            <a href="#"><i class="fa fa-twitter"></i> <span>24</span></a>
                                            <a href="#"><i class="fa fa-envelope-o"></i> <span>08</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="categories__post__item">
                                    <div class="categories__post__item__pic smaller__large set-bg"
                                        data-setbg="img/categories/categories-post/cp-8.jpg">
                                        <div class="post__meta">
                                            <h4>08</h4>
                                            <span>Aug</span>
                                        </div>
                                    </div>
                                    <div class="categories__post__item__text">
                                        <span class="post__label">Smoothie</span>
                                        <h3><a href="#">This 2-Ingredient Spread Makes Any Egg Sandwich So Much
                                                Better</a></h3>
                                        <ul class="post__widget">
                                            <li>by <span>Admin</span></li>
                                            <li>3 min read</li>
                                            <li>20 Comment</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices
                                            gravida...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="categories__post__item">
                                    <div class="categories__post__item__pic smaller__large set-bg"
                                        data-setbg="img/categories/categories-post/cp-3.jpg">
                                        <div class="post__meta">
                                            <h4>08</h4>
                                            <span>Aug</span>
                                        </div>
                                    </div>
                                    <div class="categories__post__item__text">
                                        <span class="post__label">Dinner</span>
                                        <h3><a href="#">17 Perfect Gifts for Your Vegan Friend Because Sometimes...</a>
                                        </h3>
                                        <ul class="post__widget">
                                            <li>by <span>Admin</span></li>
                                            <li>3 min read</li>
                                            <li>20 Comment</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices
                                            gravida...</p>
                                    </div>
                                </div>
                                <div class="categories__post__item__small">
                                    <img src="img/categories/categories-post/quote.png" alt="">
                                    <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt labore et dolore magna aliqua gravida.</p>
                                    <div class="posted__by">Elena T.Jaivy</div>
                                </div>
                                <div class="categories__post__item">
                                    <div class="categories__post__item__pic smaller__large set-bg"
                                        data-setbg="img/categories/categories-post/cp-5.jpg">
                                        <div class="post__meta">
                                            <h4>08</h4>
                                            <span>Aug</span>
                                        </div>
                                    </div>
                                    <div class="categories__post__item__text">
                                        <span class="post__label">Drinks</span>
                                        <h3><a href="#">A 5-Minute Peach Mug Cobbler That Just So Happens to...</a></h3>
                                        <ul class="post__widget">
                                            <li>by <span>Admin</span></li>
                                            <li>3 min read</li>
                                            <li>20 Comment</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices
                                            gravida...</p>
                                    </div>
                                </div>
                                <div class="categories__post__item">
                                    <div class="categories__post__item__pic set-bg"
                                        data-setbg="img/categories/categories-post/cp-7.jpg">
                                        <div class="post__meta">
                                            <h4>08</h4>
                                            <span>Aug</span>
                                        </div>
                                    </div>
                                    <div class="categories__post__item__text">
                                        <ul class="post__label--large">
                                            <li>Vegan</li>
                                            <li>Desserts</li>
                                        </ul>
                                        <h3><a href="#">Fresh Herb Polenta with Parsnip Chips and Maple Butter</a></h3>
                                        <ul class="post__widget">
                                            <li>by <span>Admin</span></li>
                                            <li>3 min read</li>
                                            <li>20 Comment</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices
                                            gravida...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="load__more__btn">
                                    <a href="#">Load more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="sidebar__item">
                            <div class="sidebar__about__item">
                                <div class="sidebar__item__title">
                                    <h6>About me</h6>
                                </div>
                                <img src="img/sidebar/sidebar-about.jpg" alt="">
                                <h6>Hi every one! I,m <span>Lena Mollein.</span></h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <a href="#" class="primary-btn">Read more</a>
                            </div>
                            <div class="sidebar__follow__item">
                                <div class="sidebar__item__title">
                                    <h6>Follow me</h6>
                                </div>
                                <div class="sidebar__item__follow__links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-envelope-o"></i></a>
                                </div>
                            </div>
                            <div class="sidebar__feature__item">
                                <div class="sidebar__item__title">
                                    <h6>Feature Posts</h6>
                                </div>
                                <div class="sidebar__feature__item__large set-bg"
                                    data-setbg="img/sidebar/feature-post.jpg">
                                    <div class="sidebar__feature__item__large--text">
                                        <span>Dinner</span>
                                        <h5><a href="#">This Japanese Way of Making Iced Coffee Is a Game...</a></h5>
                                    </div>
                                </div>
                                <div class="sidebar__feature__item__list">
                                    <div class="sidebar__feature__item__list__single">
                                        <div class="post__meta">
                                            <h4>08</h4>
                                            <span>Aug</span>
                                        </div>
                                        <div class="post__text">
                                            <span>Dinner</span>
                                            <h5><a href="#">Grilled Potato and Green Bean Salad</a></h5>
                                        </div>
                                    </div>
                                    <div class="sidebar__feature__item__list__single">
                                        <div class="post__meta">
                                            <h4>05</h4>
                                            <span>Aug</span>
                                        </div>
                                        <div class="post__text">
                                            <span>Smoothie</span>
                                            <h5><a href="#">The $8 French Rosé I Buy in Bulk Every Summer</a></h5>
                                        </div>
                                    </div>
                                    <div class="sidebar__feature__item__list__single">
                                        <div class="post__meta">
                                            <h4>26</h4>
                                            <span>jul</span>
                                        </div>
                                        <div class="post__text">
                                            <span>Desert</span>
                                            <h5><a href="#">Ina Garten's Skillet-Roasted Lemon Chicken</a></h5>
                                        </div>
                                    </div>
                                    <div class="sidebar__feature__item__list__single">
                                        <div class="post__meta">
                                            <h4>16</h4>
                                            <span>jul</span>
                                        </div>
                                        <div class="post__text">
                                            <span>Vegan</span>
                                            <h5><a href="#">The Best Weeknight Baked Potatoes, 3 Creative Ways</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__item__banner">
                                <img src="img/sidebar/banner.jpg" alt="">
                            </div>
                            <div class="sidebar__item__categories">
                                <div class="sidebar__item__title">
                                    <h6>Categories</h6>
                                </div>
                                <ul>
                                    <li><a href="#">Recipes <span>128</span></a></li>
                                    <li><a href="#">Dinner <span>32</span></a></li>
                                    <li><a href="#">Dessert <span>86</span></a></li>
                                    <li class="p-left"><a href="#">Smothie <span>25</span></a></li>
                                    <li class="p-left"><a href="#">Drinks <span>36</span></a></li>
                                    <li class="p-left"><a href="#">Cakes <span>15</span></a></li>
                                    <li><a href="#">Vegan <span>63</span></a></li>
                                    <li><a href="#">Weightloss <span>27</span></a></li>
                                </ul>
                            </div>
                            <div class="sidebar__subscribe__item">
                                <div class="sidebar__item__title">
                                    <h6>Subscribe</h6>
                                </div>
                                <p>Subscribe to our newsletter and get our newest updates right on your inbox.</p>
                                <form action="#">
                                    <input type="text" class="email-input" placeholder="Your email">
                                    <label for="s-agree-check">
                                        I agree to the terms & conditions
                                        <input type="checkbox" id="s-agree-check">
                                        <span class="checkmark"></span>
                                    </label>
                                    <button type="submit" class="site-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
@endsection