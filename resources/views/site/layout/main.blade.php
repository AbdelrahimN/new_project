<!DOCTYPE html>
<html lang="en">

<head>
    @include('site.layout.header')
    @yield('style')
</head>

<body>
    <div id="nav-container">
        @include('site.layout.navbar')
    </div>
    <main>
        @yield('section')
    </main>
    <div class="row">

    </div>

    @include('site.layout.script')
    @yield('script')
</body>
