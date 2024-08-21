<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('login_page/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('login_page/css/owl.carousel.min.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('login_page/css/bootstrap.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm')}}" crossorigin="anonymous"> --}}

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('login_page/css/style.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    
   
    <link rel="icon" href="{{ asset('images/kens pic/kens trading logo.jpg') }}">
    <title>Login</title>
</head>

<style>
    body {
      background-color: #000000;
    }

    .login-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #FFFFFF;
      border-radius: 5px;
      background-color: #fff;
      margin-top: 100px;
      /*margin-bottom: 100px;*/
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #FFFFFF;
    }

    .login-form button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    
    button {
            background-color: #000000;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #CCCCCC;
        }

        button:focus {
            outline: none;
        }

</style>

<body>
    <div class="d-lg-flex half">
        
            <div class="bg order-0 order-md-0">
            <img src="{{ asset('images/kens pic/kens trading logo.jpg') }}" alt="kens logo" height="730">
    
    </div>

        <div class="contents order-1 order-md-1 bg-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">

                        <br>

                        @if(Session::has('authFail'))
                        <div class = "alert alert-danger">{{Session::get('authFail')}}</div>
                        @endif
                        
                        <div class="login-container mb-5">
                        <h2 class="text-center mb-4">Login</h2>

                        <form class="login-form" action ="{{route('logged')}}" method ="post">
                            @if(Session::has('success'))
                            <div class = "alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class = "alert alert-danger">{{Session::get('fail')}}</div>
                            @endif

                            @csrf 
                            
                            <div class="mb-3">
                            <input type="text" name="email" placeholder="Email" value="{{old('email')}}"  required>
                            <span class = "text-danger">@error('email') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                            <input type="password" name="password" placeholder="Password"  required>
                            <span class = "text-danger">@error('password') {{$message}} @enderror</span>
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit">Login</button> 
                            </div>
                        </form>

                        <form action ="{{route('abtus')}}" method ="get">
                        <div class="text-center mb-3">
                        <button type="submit">About Us</button>
                        </div>
                        </form>
                    </div>
                </div>
                
            </div>
           
        </div>
    </div>
    

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>