<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng ký</title>
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
        <form action="{{route('register')}}" method="post">
            <h3>Đăng ký</h3>
        <!-- @csrf -->
            {{ csrf_field() }}
            @if(count($errors)>0)
                <li class="text-danger" >
                    @foreach($errors->all() as $i)
                        {{$i}}
                    @endforeach
                </li>
            @endif
            @if( Session::has('tt') )
                <ul>
                    <li class="text-danger" alert="{{Session::get('tt')}}"> {{ Session::get('mess') }}</li>
                </ul>
            @endif
            <div class="form-wrapper">
                <input type="text" name="name" placeholder="Full name" class="form-control" required>
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="form-wrapper">
                <input type="text" name="email" placeholder="Email" class="form-control" required>
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" name="password" placeholder="Password" class="form-control" required>
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" name="re_password" placeholder="Confirm Password" class="form-control" required>
                <i class="zmdi zmdi-lock"></i>
            </div>
            <button type="submit">Register
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>
    </div>
</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
