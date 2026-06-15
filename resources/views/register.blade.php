@extends('landing.login_register')
@section('container')
    <div class="main d-flex flex-column justify-content-around align-items-center" style="margin-top: 5vh">
        <div class="login-box">
            <h2 class="text-center">Register</h2>
            <form action="" method="POST">
                @csrf
                <div class="form-floating">
                    <input id="floatingInput" class="form-control" type="text" name="username" id="username"
                        value="{{ old('username') }}" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input id="floatingInput" class="form-control" type="email" name="email" id="email"
                        value="{{ old('email') }}" required>
                    <label class="form-label" for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input id="floatingInput" class="form-control" type="password" name="password" id="password" required>
                    <label class="form-label" for="floatingInput">Password</label>
                </div>
                <div class="form-floating">
                    <input id="floatingInput" class="form-control" type="text" name="phone" id="phone"
                        value="{{ old('phone') }}">
                    <label class="form-label" for="floatingInput">Phone number</label>
                </div>
                <div class="form-floating">
                    <textarea id="floatingTextarea2" class="form-control" type="textarea" name="address" id="address"
                        value="{{ old('address') }}" required></textarea>
                    <label class="form-label" for="floatingTextarea2">Address</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-success form-control">Register</button>
                </div>
                <div class="text-center">
                    <small>Already have account? <a href="/login">Login</a></small>
                </div>
            </form>
        </div>
    </div>
@endsection
