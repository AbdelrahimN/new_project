<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/css/login.css') }}" />
    <link rel="icon" href="{{ asset('site/images/logo2.png') }}" />

    <title>Login</title>
</head>

<body>
    <main>
        <div class="container-fluid row">
            <div class="w-50  eelu-img">
                <img src="{{ asset('site/images/login-images/eelu logo.png') }}" alt="" class="img-fluid" />
                <img src="{{ asset('site/images/login-images/student logo.png') }}" alt=""
                    class=" img-fluid h-50" />
            </div>

            <div class="container login-container ">

                <form class="login-form" action="{{ route('site.login') }}" method="POST">
                    @csrf
                    @if (Session::has('register'))
                        <p class="alert alert-primary">{{ Session::get('register') }}</p>
                    @endif
                    <h2>Login</h2>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" required />
                        @error('email')
                            <h5 class="alert alert-danger">{{ $message }}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" required />
                        @error('password')
                            <h5 class="alert alert-danger">{{ $message }}</h5>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-primary form-control" value="Login">
                    <div class="row">
                        <p>Don't have an account? <a href="{{ route('site.register') }}">Register</a></p>
                    </div>

                </form>

            </div>
        </div>
    </main>
    <script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site/js/login.js') }}"></script>
</body>

</html>
