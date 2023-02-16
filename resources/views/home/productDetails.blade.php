@extends('home.app')
@section('content')
    @push('title')
        <title>Product Details</title>
    @endpush

    <body class="u-body u-xl-mode">
        <section class="u-align-center u-clearfix u-section-1" id="carousel_cbd4">
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                <div class="u-container-style u-expanded-width u-product u-product-1">
                    <div class="u-container-layout u-valign-top-lg u-valign-top-md u-valign-top-xl u-container-layout-1">
                        <div
                            class="u-align-center u-border-3 u-border-palette-2-base u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-1">
                            <div class="u-container-layout u-valign-middle u-container-layout-2">
                                <h2 class="u-product-control u-text u-text-1">
                                    <a class="u-product-title-link" href="#">{{ $productDetails->title }}</a>
                                </h2>
                                <div class="u-product-control u-product-desc u-text u-text-default u-text-2">
                                    <p>{{ $productDetails->description }}</p>
                                </div>
                                <div class="u-product-control u-product-price u-product-price-1">
                                    <div class="u-price-wrapper u-spacing-10">
                                        <!--product_old_price-->
                                        <div class="@if ($productDetails->discount_price != null) @else
                                              u-hide-price @endif
                                             u-old-price"
                                            style="text-decoration: line-through !important;" wfd-invisible="false">
                                            Rs/-{{ $productDetails->price }}
                                        </div>

                                        <!--/product_old_price-->
                                        <!--product_regular_price-->
                                        @if ($productDetails->discount_price != null)
                                            <div class="u-price u-text-palette-2-base"
                                                style="font-size: 1.875rem; font-weight: 700;">
                                                Rs/-{{ $productDetails->discount_price }}
                                            </div>
                                        @endif
                                        @if ($productDetails->discount_price == null)
                                            <div class="u-price u-text-palette-2-base"
                                                style="font-size: 1.875rem; font-weight: 700;">
                                                Rs/-{{ $productDetails->price }}
                                            </div>
                                        @endif
                                        <!--/product_regular_price-->
                                    </div>
                                </div>
                                <hr>
                                <form action="{{ url('addProductToCart') }}/{{ $productDetails->id }}" method="post">
                                    @csrf
                                    <h5 for="productQuantity" class="my-3 text-danger">Product Quantity</h5>
                                    <input type="number" min="1" name="productQuantity"
                                        placeholder="Product Quantity" id="productQuantity" class="border-danger"
                                        value="1">
                                    @error('productQuantity')
                                        <small class="text-danger my-4">{{ $message }}</small>
                                    @enderror
                                    <input type="submit" value="Add To Cart" class="my-3">
                                </form>
                            </div>
                        </div>
                        <img src="/product-images/{{ $productDetails->image }}" alt=""
                            class="u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-1"
                            data-image-width="817" data-image-height="933">
                    </div>
                </div>
            </div>
        </section>
        {{-- comments and reply section --}}
        <section class="gradient-custom">
            <div class="container my-5 py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <h4 class="text-center mb-4 pb-2">About this product</h4>
                                <form action="/add/comment/{{ $productDetails->id }}" method="post">
                                    @csrf
                                    <div class="justify-content-center d-flex my-2">
                                        <div class="col-12">
                                            <textarea name="comment" rows="5" class="form-control" placeholder="Say something..."></textarea>
                                            <small class="text-danger">
                                            @error('comment')
                                                {{$message}}
                                            @enderror
                                        </small>
                                            <div class="d-flex justify-content-end mt-2">
                                                <button class="btn btn-danger">Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col">
                                        @foreach ($comments as $comment)
                                            <div class="d-flex flex-start">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="assets/images/user.png"
                                                    alt="avatar" width="65" height="65" />

                                                <div class="flex-grow-1 flex-shrink-1">
                                                    <div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="mb-1 mx-1">
                                                                {{ $comment->user_name }} <span class="small">- {{ $comment->created_at->diffForHumans() }}</span>
                                                            </p>

                                                        </div>
                                                        <p class="small mb-0">
                                                            {{ $comment->comment }}
                                                        </p>
                                                        <a href="javascript:void(0)" onclick="reply(this)" data-CommentId = {{ $comment->id }}>
                                                            <i class="fas fa-reply fa-xs"></i>
                                                            <span class="small">
                                                                reply
                                                            </span>
                                                        </a>
                                                    </div>
                                                    @foreach ($replies as $reply)
                                                    @if ($reply->comment_id==$comment->id)
                                                    <div class="d-flex flex-start mt-4">
                                                        <a class="me-3" href="#">
                                                            <img class="rounded-circle shadow-1-strong"
                                                                src="assets/images/user.png"
                                                                alt="avatar" width="65" height="65" />
                                                        </a>
                                                        <div class="flex-grow-1 flex-shrink-1">
                                                            <div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-1 mx-1">
                                                {{$reply->user_name}} 
                                                <span class="small">-
                                                {{($reply->created_at->diffForHumans())}}
                                                </span>
                                            </p>
                                        </div>
                                                                <p class="small mb-0">
                                                                    {{$reply->reply}}
                                                                </p>
                                                            </div>
                                                            <a href="javascript:void(0)" onclick="reply(this)" data-CommentId = {{ $comment->id }}>
                                                                <i class="fas fa-reply fa-xs"></i>
                                                                <span class="small">
                                                                    reply
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div id="hiddenDiv" style="display: none">
                        <div class="justify-content-center d-flex my-2 replyDiv">
                            <div class="col-12 cancelDiv">
                                <form action="/reply/of/comment" method="POST">
                                    @csrf
                                <input type="hidden" id='commentId' name="commentId">
                                <textarea name="reply" rows="5" class="form-control" placeholder="Enter Reply Here"></textarea>
                                <small class="text-danger">
                                    @error('reply')
                                        {{$message}}
                                    @enderror
                                </small>
                                <div class="d-flex justify-content-end mt-2">
                                    <button class="btn btn-danger" type="submit">Send Reply</button>
                                    <a href="javascript:void(0)" onclick="cancelReply(this)" class="btn text-danger mx-1">X</a>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
        <script type="text/javascript">
            function reply(caller) {
                document.getElementById('commentId').value = $(caller).attr('data-CommentId');
                $('.cancelDiv').show();
                $('.replyDiv').insertAfter($(caller));
                $('#hiddenDiv').show();
            }
            function cancelReply(caller) {
                $('.cancelDiv').hide();
            }
        </script>
        {{-- keeping page same position --}}
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    </body>
@endsection
