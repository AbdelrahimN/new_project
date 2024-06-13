<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختر بوابة الدخول</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #e0f7fa, #f1f8e9);
        }

        .container {
            text-align: center;
            margin-top: 50px;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            margin-bottom: 15px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('site/images/logo1.png') }}" alt="Logo" style="width: 100px;">
        <h3>Choose the entry portal</h3>
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <a href="{{ route('supervisor.index') }}">
                <div class="card">

                    <img src="{{ asset('assets/img/super.jpeg') }}" width="40px" class="card-img-top"
                        alt="بوابة المشرفين">

                </div>
                </a>

            </div>
            <div class="col-md-4">
                <a href="{{ route('teachingAssistant.index') }}">
                    <div class="card">
                        <img src="{{ asset('assets/img/teaching.jpeg') }}" width="40px" class="card-img-top"
                            alt="بوابة لجان المشاريع">
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
