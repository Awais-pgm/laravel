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
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="blog-post-images/{{$post->post_image}}"
                            alt="..." style="height:350px;object-fit:cover;"/></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $post->created_at->diffForHumans() }}</div>
                        <h2 class="card-title">{{ $post->title}}</h2>
                    </div>
                </div>
                <p class="card-text my-5">{{$post->post_description}}</p>
                <a class="btn btn-danger mb-5" href="/show/blog">←</a>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-danger" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-unstyled mb-0 d-flex justify-content-between flex-wrap">
                                    @foreach ($categories as $category)
                                    <li><a href="#!" class="mx-1">{{$category->category_name}}</a></li>
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

