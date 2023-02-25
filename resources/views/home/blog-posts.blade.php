@extends('home.app')
@push('title')
    <title>Blog</title>
@endpush
@section('content')
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">Here You can read all about our posts.</p>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4 p-3" style="">
                    <a href="/read/blog/post/{{ $featurePost->id }}"><img class="card-img-top" src="blog-post-images/{{$featurePost->post_image}}"
                            alt="..." style="height:350px;object-fit:cover;"/></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $featurePost->created_at->diffForHumans() }}</div>
                        <h2 class="card-title">{{ $featurePost->title}}</h2>
                        <p class="card-text">{{ Str::limit($featurePost->post_description, 30, '...') }}</p>
                        <a class="btn btn-danger" href="/read/blog/post/{{ $featurePost->id }}">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <div class="d-flex flex-wrap">
                        <!-- Blog post-->
                        @foreach ($posts as $post)
                            <div class="col-6 " >
                                <div class="card mb-4 p-3" style="width:350px;">
                                    <a href="/read/blog/post/{{ $featurePost->id }}">
                                        <img class="card-img-top"
                                            src="/blog-post-images/{{ $post->post_image }}  " alt="{{ $post->post_image }}" style="height:300px;object-fit:cover;"/></a>
                                    <div class="card-body">
                                        <div class="small text-muted">{{ $post->created_at->diffForHumans() }}</div>
                                        <h2 class="card-title h4">{{ $post->post_title }}</h2>
                                        <p class="card-text">{{ Str::limit($post->post_description, 30, '...') }}</p>
                                        <a class="btn btn-danger" href="/read/blog/post/{{ $post->id }}">Read more →</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <div class="d-flex justify-content-between my-5 px-5">
                        {{$posts->withQueryString()->links('pagination::bootstrap-5')}}
                    </div>
                </nav>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-unstyled mb-0 d-flex justify-content-between flex-wrap">
                                    @foreach ($categories as $category)
                                    <li><a href="read/category/post/{{$category->id}}" class="mx-1">{{$category->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
                        use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div>
@endsection
