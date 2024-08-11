<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="{{asset('asset/login/css/styles.css')}}">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Login Form Sign In Sign Up</title>
    </head>
    <body>
        {{-- @include('layouts.app') --}}
        @include('layouts.alert')
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="{{asset('asset/login/img/img-login.svg')}}" alt="">
                </div>

                <div class="login__forms">
                    <form action="{{url('admin/log_in')}}" method="POST"  class="login__registre" id="login-in">
                        @csrf
                        <h1 class="login__title">Sign In</h1>

                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="username" name="username" class="login__input">
                        </div>

                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" name="password" class="login__input">
                        </div>
{{--
                        <a href="{{url('forgot_password')}}" class="login__forgot">Forgot password?</a> --}}

                        <button type="submit" class="login__button">Sign In</button>


                    </form>



                </div>

            </div>
        </div>
{{-- @include('layouts.footer') --}}
        <!--===== MAIN JS =====-->
        {{-- <script src="{{asset('asset/login/js/main.js')}}"></script> --}}
    </body>
</html>
