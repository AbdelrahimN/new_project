<!DOCTYPE html>
<html lang="en">
    <head>
        @include('TeachingAssistants.layout.header')
        @yield('style')
    </head>
    <body class="g-sidenav-show  bg-gray-100">
        @include('TeachingAssistants.layout.aside')
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @include('TeachingAssistants.layout.navbar')
            <div class="container-fluid py-4">
                @yield('container')
                @include('TeachingAssistants.layout.footer')
            </div>
        </main>
        @include('TeachingAssistants.layout.script')
        @yield('script')
    </body>

</html>
