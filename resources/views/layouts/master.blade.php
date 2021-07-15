<!doctype html>
<html lang="en">
<head>
    @include('layouts.parts._meta')

    <title>@yield('title') | SMIT</title>

    @include('layouts.parts._styles')

</head>
<body>

    @include('layouts.parts._loader')

    @include('layouts.parts._header')

    @yield('content')

    @include('layouts.parts._footer')

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    @include('layouts.parts._scripts')

</body>

</html>