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
                    <i class="fa-solid fa-gauge-high"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <h1 class="text-center my-2 text-success">Manage Products</h1>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('addProduct') }}">
                <span class="menu-icon">
                    <i class="fa-brands fa-product-hunt"></i>
                </span>
                <span class="menu-title">Add Product</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('showProducts') }}">
                <span class="menu-icon">
                    <i class="fa-regular fa-eye"></i>
                </span>
                <span class="menu-title">Show Products</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <h1 class="text-center my-2 text-success">Manage Categories</h1>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('viewCategoryPage') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-plus"></i>
                </span>
                <span class="menu-title">Add Category</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('showCategories') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-eye"></i>
                </span>
                <span class="menu-title">Show Categories</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <h1 class="text-center my-2 text-success">Manage Orders</h1>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('viewAllOrders') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-arrow-up-1-9"></i>
                </span>
                <span class="menu-title">View Orders</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('viewCanceledOrders') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-arrow-down-1-9"></i>
                </span>
                <span class="menu-title">View Canceled Orders</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <h1 class="text-center my-2 text-success">Manage Blog</h1>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('create.blog.category') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-square-plus"></i>
                </span>
                <span class="menu-title">Create Blog Category</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('create.blog.post') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-blog"></i>
                </span>
                <span class="menu-title">Create Blog post</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('show.all.posts') }}">
                <span class="menu-icon">
                    <i class="fa-brands fa-blogger"></i>    
                </span>
                <span class="menu-title">All Blog posts</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <h1 class="text-center my-2 text-success">Others</h1>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('manage.testimonials') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-users"></i>
                </span>
                <span class="menu-title">Testimonials</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('viewTrash') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-trash-can-arrow-up"></i>
                </span>
                <span class="menu-title">View Trash</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('slider.handler') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-sliders"></i>
                </span>
                <span class="menu-title">Slider Handler</span>
            </a>
        </li>
    </ul>
</nav>
