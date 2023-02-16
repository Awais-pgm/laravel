@extends('admin.app')
@push('title')
    <title>Manage Blog Posts</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (count($posts) > 0)
                <h2 class="text-center fs-2 my-4 text-light">All Orders</h2>
                <div class="table-responsive" style="max-width:1064px;overflow-x:auto;">
                    <table class="table text-light" id="myOrderTable">
                        <thead>
                            <tr>
                                <th class="text-light">S.No</th>
                                <th class="text-light">Image</th>
                                <th class="text-light">Title</th>
                                <th class="text-light">Description</th>
                                <th class="text-light">Edit</th>
                                <th class="text-light">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sno = 1;
                            @endphp

                            @foreach ($posts as $post)
                                <tr>
                                    <td scope="row">{{ $sno }}</td>
                                    <td scope="row">
                                        <div>
                                            <img src="blog-post-images/{{ $post->post_image }}"
                                                alt="{{ $post->post_image }}"
                                                style="object-fit: cover;width:50px;height:50px;object-position:50%;"
                                                id="image">
                                        </div>
                                    </td>
                                    <td>{{ $post->post_title }}</td>
                                    <td>{{ Str::limit($post->post_description, 30, '...')  }}</td>
                                    <td>
                                        <a href="edit/blog/post/{{$post->id}}" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="delete/blog/post/{{$post->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                                    </td>
                                </tr>
                                @php
                                    $sno += 1;
                                @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @else
                <h2 class="text-center fs-2 my-4 text-light">No posts were found.</h2>
            @endif
        </div>
    </div>
@endsection
