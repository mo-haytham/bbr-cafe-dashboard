<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('assets/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('assets/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo"><b>BBR</b> Cafe</div>
        @include('components.notify_box')
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="#" method="post">
                @csrf
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="email" placeholder="Email"
                        value="{{ old('email') }}" required />
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" required />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember_me"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>
