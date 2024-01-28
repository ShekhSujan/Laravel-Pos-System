<!doctype html>
<html lang="en">

<head>
    @include('components.meta')
    @include('components.css')
</head>

<body>
    <div class="page-wrapper">
        @include('components.leftbar')
        <div class="page-content">
            @include('components.topbar')
            @yield('content')
        </div>
    </div>
    @include('components.js')
</body>

</html>
