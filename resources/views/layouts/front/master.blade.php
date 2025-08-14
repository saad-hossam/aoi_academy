<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.front.head')
    @stack('styles')

</head>

<body>

    @include('includes.front.header')

    @yield('content')

    @include('includes.front.footer')

    @include('includes.front.scripts')
    @stack('scripts')

</body>
</html>
