@extends('landing.login_register')
@section('container')
    <div class="main d-flex justify-content-around align-items-center">
        <div class="login-box">
            <h2 class="text-center">Login</h2>
            <form action="" method="POST">
                @csrf
                <div class="form-floating">
                    <input id="floatingInput" class="form-control" type="text" name="username" id="username" required>
                    <label class="form-label" for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input id="floatingInput" class="form-control" type="password" name="password" id="password" required>
                    <label class="form-label" for="floatingInput">Password</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-success form-control">Login</button>
                </div>
                <div class="text-center">
                    <small>Don't have account? <a href="/register">Sign up</a></small>
                </div>
            </form>
        </div>
    </div>
@endsection
