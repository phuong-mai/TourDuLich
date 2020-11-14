<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <base href="{{asset('')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="sourcelogin/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="sourcelogin/css/style.css">
</head>

<body>

<div class="wrapper" style="background-image: url('sourcelogin/images/bg-registration-form-1.jpg');">
    <div class="inner">
        <div class="image-holder">
            <img src="sourcelogin/images/registration-form-1.jpg" alt="">
        </div>

        <form action="{{Route('login')}}" method="post">
        @csrf
        <!-- {{ csrf_field() }} -->
            <h3>Login</h3>
            @if( Session::has('tt') )
             
                    <div class="alert alert-danger" alert="{{Session::get('tt')}}"> {{ Session::get('mess') }}</div>

            @endif
            <div class="form-wrapper">
                <input type="email" name="email" placeholder="Email" class="form-control">
                <i class="zmdi zmdi-email"></i>
            </div>

            <div class="form-wrapper">
                <input type="password" name="password" placeholder="Password" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>

            <button type="submit">Login
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>
    </div>
</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
