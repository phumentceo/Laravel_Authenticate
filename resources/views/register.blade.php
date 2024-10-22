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
        <form action="{{ route('register') }}" method="POST" class=" w-50 shadow p-5 bg-light">
            @csrf
            <div class=" form-header">
                <h3 class="text-center">Register Account</h3>
            </div>
            <div class="form-group mb-3">
                <label for="">Username</label>
                <input type="text" name="name" class=" form-control @error("name") is-invalid  @enderror shadow-none">
                @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="text" name="email" class=" form-control @error("email") is-invalid  @enderror shadow-none">
                @error('email')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">Password</label>
                <input type="password" name="password" class=" form-control @error("password") is-invalid  @enderror shadow-none">
                @error('password')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" class=" form-control @error("confirm_password") is-invalid  @enderror shadow-none">
                @error('confirm_password')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class=" btn btn-primary">Register</button>
            <p>You have  account?Login here <a href="{{ route('show.login') }}">login</a></p>
            
        </form>
    </div>
</body>
</html>
