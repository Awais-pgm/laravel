<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="/"><img width="250" src="/home/images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('showAllProductsOfCat/*') ? 'active' : '' }} d-flex flex-column align-items-center">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Categories <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach ($navbars as $category)
                                <li><a href="/showAllProductsOfCat/{{ $category->id }}">{{ $category->category }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item {{ Request::is('showAllProducts') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('showAllProducts') }}">Products</a>
                    </li>
                    <li class="nav-item {{ Request::is('show/blog') ? 'active' : '' }}">
                        <a class="nav-link" href="/show/blog">Blog</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact/us') ? 'active' : '' }}">
                        <a class="nav-link" href="contact/us">Contact</a>
                    </li>
                    <li class="nav-item {{ Request::is('show/orders') ? 'active' : '' }}">
                        <a class="nav-link" href="/show/orders">Order</a>
                    </li>
                    <li class="nav-item {{ Request::is('showCart') ? 'active' : '' }}">
                        <span class="badge text-light"></span>
                        <a class="nav-link {{ Request::is('showCart') ? 'active' : '' }}" href="{{ url('showCart') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
                    <div class="d-flex justify-content-center align-items-center">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="btn btn-danger" href="{{ route('dashboard') }}">Dashbord</a>
                            </li>
                        @else
                            <li class="nav-item my-1">
                                <a class="btn btn-danger" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger mx-1" href="{{ route('register') }}">Register</a>
                            </li>
                        </div>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
