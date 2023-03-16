@extends('layouts.default')

@section('content')
    <div class="auth-block">
        <h2>Register</h2>
        <div class="auth-content">
            <p>Registration is FREE. It is secure and safe.</p>
            <span class="auth-errors">Auth Test error</span>
            <form id="register-form">
                <div class="form-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{old('username')}}">
                </div>
                <div class="form-input">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}">
                </div>
                <div class="form-input">
                    <label for="password1">Password</label>
                    <div class="password-input">
                        <input type="password" name="password" id="password1">
                        <div class="pass-show-icons">
                            <i class="bi bi-eye-fill show-password-1"></i>
                            <i class="bi bi-eye-slash-fill hide-password-1"></i>
                        </div>
                    </div>
                </div>
                <div class="form-input">
                    <label for="password2">Repeat Password</label>
                    <div class="password-input">
                        <input type="password" name="password_confirmation" id="password2">
                        <div class="pass-show-icons">
                            <i class="bi bi-eye-fill show-password-2"></i>
                            <i class="bi bi-eye-slash-fill hide-password-2"></i>
                        </div>
                    </div>
                </div>
                <div class="form-agree" id="form-agree">
                    <label class="form-agree-label" for="reg_agree">
                        <i class="bi bi-check auth-agree-check"></i>
                    </label>
                    <p>I have read the <a href="#">Terms & Conditions</a> and am over 13.</p>
                    <input type="checkbox" name="reg-agree" id="reg_agree" >
                </div>
                <div class="form-submit">
                    <button class="btn btn-primary reg-submit-btn">Register</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
