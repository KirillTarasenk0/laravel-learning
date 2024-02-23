<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @stack('styles')
</head>
<body>
    <header>
        @yield('header')
    </header>
    <main>
        @yield('body')
        @include('components.articlesList')
        @include('components.comments')
        <div style="display: flex; justify-content: center; align-items: center;">
            @include('components.productList')
        </div>
        <div style="display: flex; justify-content: center; align-items: center;">
            @include('components.registrationForm')
        </div>
        <div style="display: flex; justify-content: center; align-items: center;">
            <p>Текущее время:</p>
            @datetime(Carbon\Carbon::now())
        </div>
        <div style="display: flex; justify-content: center; align-items: center;">
            <x-rating :$averageRating/>
        </div>
    </main>
    <footer>
        @yield('footer')
        @include('components.navigationMenu')
    </footer>
    @stack('scripts')
</body>
</html>
