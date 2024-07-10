<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('Admin.css')
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>HR</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
@include('message')
            <form action="{{ route('register.post') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Full name" required>
                    <div style="color:red">{{ $errors->first('name') }}</div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                    <div style="color:red">{{ $errors->first('phone') }}</div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="address" class="form-control" placeholder="Full Address" required>
                    <div style="color:red">{{ $errors->first('address') }}</div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="email" onblur="duplicateEmail(this)" class="form-control">
                    <div style="color:red">{{ $errors->first('email') }}</div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div style="color:red">{{ $errors->first('password') }}</div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
                    <div style="color:red">{{ $errors->first('password_confirmation') }}</div>
                </div>
                <div class="form-group">
                    <select name="role" id="role" class="form-control p_input" required>
                        <option value="0">Staff</option>
                        <option value="1">Admin</option>
                    </select>
                    <div style="color:red">{{ $errors->first('role') }}</div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <!-- Checkbox -->


                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a>
            </div>

            <a href="{{url('getlogin')}}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>

<!-- /.register-box -->
@include('Admin.js')
</body>
</html>
