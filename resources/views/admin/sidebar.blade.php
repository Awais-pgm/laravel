<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="/redirect"><span class="text-light">E-Store</span></a>
        <a class="sidebar-brand brand-logo-mini" href="/redirect"><span class="text-light">E-</span></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="/redirect">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('addProduct') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Add Product</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('showProducts') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Show Products</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('viewCategoryPage') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Add Category</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('showCategories') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Show Categories</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('viewTrash') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-delete"></i>
                </span>
                <span class="menu-title">View Trash</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('viewAllOrders') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-delete"></i>
                </span>
                <span class="menu-title">View Orders</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('slider.handler') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-delete"></i>
                </span>
                <span class="menu-title">Slider Handler</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('create.blog.category') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-delete"></i>
                </span>
                <span class="menu-title">Create Blog Category</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('create.blog.post') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-delete"></i>
                </span>
                <span class="menu-title">Create Blog post</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('show.all.posts') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-delete"></i>
                </span>
                <span class="menu-title">All Blog posts</span>
            </a>
        </li>

    </ul>
</nav>
