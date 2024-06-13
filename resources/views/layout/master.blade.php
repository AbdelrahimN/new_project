<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.header')
        @yield('style')
    </head>
    <body class="g-sidenav-show  bg-gray-100">
        @include('layout.aside')
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @include('layout.navbar')
            <div class="container-fluid py-4 px-5">
                @yield('container')
                @include('layout.footer')

            </div>
        </main>
        @include('layout.script')
        @yield('script')
    </body>
</html>
