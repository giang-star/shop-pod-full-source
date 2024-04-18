
@extends('front.layout.master')
@section('title', 'Blog')
@section('body')


    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i>Trang chủ</a>
                        <span>Bài viết</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin  -->

    <div class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <div class="recent-post">
                                <h4>Recent Post</h4>
                                <div class="recent-blog">
                                    @foreach ($recentBlogs as $blog)
                                        <a href="./blog/detail/{{$blog->id}}" class="rb-item">
                                            <div class="rb-pic">
                                                <img src="front/img/blog/{{$blog->image}}" alt="">
                                            </div>
                                            <div class="rb-text">
                                                <h6>{{$blog->title}}</h6>
                                                <p>{{$blog->user->first_name ?? ''}} <span>{{date('M d, y',strtotime($blog->created_at))}}</span></p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-sm-6">
                                <div class="blog-item">
                                    <div class="bi-pic">
                                        <img src="front/img/blog/{{$blog->image}}" alt="">
                                    </div>
                                    <div class="bi-text">
                                        <a href="./blog/detail/{{$blog->id}}">
                                            <h4>{{$blog->title}}</h4>
                                            <p><span>{{date('M d, y',strtotime($blog->created_at))}}</span></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$blogs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section End  -->

@endsection