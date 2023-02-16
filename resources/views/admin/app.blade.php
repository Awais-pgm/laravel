<!DOCTYPE html>
<html lang="en">
<base href="/">
<head>
    @include('admin.css')
    @stack('title')
    @stack('styles')
</head>

<body>
    <div class="container-scroller">
                @yield('content')
        @include('admin.script')
    </div>
    @stack('scripts')
</body>

</html>
