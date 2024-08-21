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
    
    <link rel="icon" href="{{ asset('images/portfolio/favicon.png') }}">
    <title>Login</title>
</head>

<style>
    *{
        overflow: hidden;
    }
</style>

<body>
        <div class="d-lg-flex half">
            <div class="bg order-0 order-md-0" style="background-image: url('login_page/images/bg_2.jpg');"></div>
            <div class="contents order-1 order-md-1 bg-dark text-white">
    
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <h3 class="text-center">LOGIN</h3>
                            
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block mb-2">
                                    {{ __('Login') }}
                                </button>

                                <div class="d-flex my-3 align-items-center">
                                    <span class="mr-auto"><a href="/register1" class="text-white">Register</a></span>
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
