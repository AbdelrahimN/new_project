<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/css/login.css') }}" />
    <link rel="icon" href="{{ asset('site/images/logo2.png') }}" />

    <title>Register</title>
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
                <form action="{{ route('site.store') }}" method="POST" class="form-control" enctype="multipart/form-data">
                    @csrf
                    <h2>Register</h2>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <label>Centers:</label>
                            <select class="form-control" name="center_id">
                                <option>Select Center</option>
                                @foreach ($centers as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                                @error('center_id')
                                    <h5 class="alert alert-danger">{{ $message }}</h5>
                                @enderror
                            </select>
                            <label for="email">Name:</label>
                            <input class="form-control" type="text" name="name" required autocomplete="off" />
                            @error('name')
                                <h5 class="alert alert-danger">{{ $message }}</h5>
                            @enderror
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" required autocomplete="off" />
                            @error('email')
                                <h5 class="alert alert-danger">{{ $message }}</h5>
                            @enderror
                            <label for="email">Image:</label>
                            <input class="form-control" type="file" name="image" required />
                            @error('image')
                                <h5 class="alert alert-danger">{{ $message }}</h5>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label for="email">universityID:</label>
                            <input class="form-control" type="text" name="university_id" required
                                autocomplete="off" />
                            @error('university_id')
                                <h5 class="alert alert-danger">{{ $message }}</h5>
                            @enderror
                            <label for="password">Phone:</label>
                            <input class="form-control" type="text" name="phone" required autocomplete="off" />
                            @error('phone')
                                <h5 class="alert alert-danger">{{ $message }}</h5>
                            @enderror
                            <label for="password">Password:</label>
                            <input class="form-control" type="password" name="password" required autocomplete="off" />
                            @error('password')
                                <h5 class="alert alert-danger">{{ $message }}</h5>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
                            <input type="submit" value="Register" class="btn btn-primary form-control">
                        </div>
                        <div class="row">
                            <p>Already have an account? <a href="{{ route('site.index') }}">Login</a></p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </main>
    <script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site/js/login.js') }}"></script>
</body>

</html>
