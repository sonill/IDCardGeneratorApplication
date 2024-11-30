@extends('app')

@section('othersLink')
    <link rel="stylesheet" href="cssHome/style.css">
@endsection

@section('bodySection')
<div class="container login-container">
    <div class="login-form">
        <h2>Admin Login</h2>
        <!-- Login Form -->
        <form action="{{ route('loginMatch') }}" method="POST">
            @csrf
            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" 
                       placeholder="Enter your email" 
                       value="{{ old('email') }}" 
                       required>
                <!-- Display Email Validation Error -->
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" 
                       placeholder="Enter your password" 
                       required>
                <!-- Display Password Validation Error -->
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Display General Login Error -->
            @if ($errors->has('error'))
                <div class="text-danger">{{ $errors->first('error') }}</div>
            @endif

            <!-- Login Button -->
            <button type="submit" class="btn btn-primary">Login</button>

            <!-- Forgot Password and Register Links -->
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
                <a href="{{ route('register') }}">Register Account</a>
            </div>
        </form>
    </div>
</div>
@endsection
