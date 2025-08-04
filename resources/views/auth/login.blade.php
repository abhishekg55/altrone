@extends('layouts.guest')
@section('title', 'Login')
@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">Enter credentials to Login</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email" class="label-control">Email</label>
                <div class="input-group mb-3">
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                        value="{{ old('email') }}" autocomplete>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="label-control">Password</label>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">

            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mb-1 text-right mt-3">
            <a href="">forgot password?</a>
        </p>
    </div>
@endsection
