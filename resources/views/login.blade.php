<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            background: blue;
        }
        .container{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class=" container">
        <form action="{{ route('proccessLogin') }}" method="POST" class=" w-50 shadow p-5 bg-light">
            @csrf
            <div class="show-message">
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Feedback message.</strong> {{ Session::get('success') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Feedback message.</strong> {{ Session::get('error') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
            </div>
            <div class=" form-header">
                <h3 class="text-center">LOGIN</h3>
            </div>
            <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="text" name="email" class=" form-control @error('email') is-invalid @enderror shadow-none">
                @error('email')
                    <p class="ivalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="">Password</label>
                <input type="password" name="password" class=" form-control @error('password') is-invalid @enderror shadow-none">
                @error('password')
                    <p class="ivalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class=" btn btn-primary">Login</button>
            <p>no account ?Register here <a href="{{ route('show.register') }}">register</a></p>
            
        </form>
    </div>
</body>
</html>