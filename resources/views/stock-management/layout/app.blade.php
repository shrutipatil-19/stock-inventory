<!DOCTYPE html>
<html lang="en">

<head>
    @include('stock-management.partial.styleLink')
    @stack('custom-style')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="main-wrapper">
        @include('stock-management.partial.sidebar')
        <div class="page-wrapper">
            @include('stock-management.partial.header')
            @yield('page-content')
            @include('stock-management.partial.footer')
        </div>
    </div>

    @stack('scripts')

    @include('stock-management.partial.jsLink')

</body>

</html>