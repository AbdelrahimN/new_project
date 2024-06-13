<!DOCTYPE html>
<html lang="en">
    <head>
        @include('supervisor.layout.header')
        @yield('style')
    </head>
    <body class="g-sidenav-show  bg-gray-100">
        @include('supervisor.layout.aside')
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @include('supervisor.layout.navbar')
            <div class="container-fluid py-4">
                @yield('container')
            </div>
        </main>
        @include('supervisor.layout.script')
        @yield('script')
    </body>

</html>
