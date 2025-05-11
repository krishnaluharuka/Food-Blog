@extends('layouts.homelayout')
@section('main')
<section class="recipe-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="row">
                        @foreach($blogss as $blog)
                        <div class="col-lg-6 col-sm-6">
                            <div class="categories__post__item">
                                <div class="categories__post__item__pic smaller__large set-bg"
                                    data-setbg="{{ $blog->images()->first() ?asset('storage/'.$blog->images()->first()->file_path):asset('favicon.ico') }}">
                                    <div class="post__meta">
                                        <h4>08</h4>
                                        <span>Aug</span>
                                    </div>
                                </div>
                                <div class="categories__post__item__text">
                                    <!-- <span class="post__label">Dinner</span> -->
                                    <h3><b><a href="#">{{ $blog->title }}</a></b></h3>
                                    <ul class="post__widget">
                                        <li>by <span>{{ $blog->user->name }}</span></li>
                                        <li>3 min read</li>
                                        <li>20 Comment</li>
                                    </ul>
                                    <p>{!! \Illuminate\Support\Str::limit($blog->description,115,'...') !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="sidebar__item">
                        <div class="sidebar__about__item">
                            <div class="card p-3 text-center border border-0">
                                <div class="card-title mb-2 m-auto ">
                                    <img 
                                        src="{{ App\Models\User::where('role','admin')->first() 
                                            ? asset('storage/' . App\Models\User::where('role','admin')->first()->image) 
                                            : asset('favicon.ico') }}" 
                                        alt="Admin Image" 
                                        class="rounded-circle mx-auto d-block" 
                                        style="width: 150px; height: 150px;">
                                </div>
                                <div class="card border border-0">
                                    <h6>
                                        
                                    </h6>
                                    
                                    <p class="text-muted">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    
                                    <a href="#" class="btn btn-primary mt-2">Read more</a>
                                </div>
                            </div>
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
                        <div class="sidebar__item__categories">
                            <div class="sidebar__item__title">
                                <h6>Categories</h6>
                            </div>
                            <ul>
                                @foreach($categoriess as $cat)
                                <li><a href="{{ route('cat_blog',$cat->name) }}">{{ $cat->name }}<span>{{ $cat->blogs()->count() }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recipe-pagination">
                        <a href="#" class="active">01</a>
                        <a href="#">02</a>
                        <a href="#">03</a>
                        <a href="#">04</a>
                        <a href="#">Next</a>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection