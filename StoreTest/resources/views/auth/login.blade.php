
@extends('layout')
@section('title') Login @endsection
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap 5 -->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/home.css">

</head>
<section class="section-border border-primary">
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center gx-0 min-vh-100">

            <div class="col-12 col-md-5 col-lg-4 order-md-1 mb-auto mb-md-0 pb-8 py-md-11">
                <!-- Heading -->
                <h1 class="mb-0 fw-bold text-center">
                    Sign in
                </h1>

                <!-- Text -->
                <p class="mb-6 text-center text-muted">
                    Simplify your workflow in minutes.
                </p>

                <!-- Form -->
                <form method="POST" action="{{ route("login_process") }}" class="space-y-5 py-2">
                @csrf
                    <!-- Email -->
                    <div class="form-group">
                        <label class="form-label" for="email">
                            Email Address
                        </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@address.com">
                    </div>
                    @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <!-- Password -->
                    <div class="form-group mb-5">
                        <label class="form-label" for="password">
                            Password
                        </label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                    @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <!-- Submit -->
                    <button class="btn w-100 btn-primary" type="submit">
                        Sign in
                    </button>

                </form>

                <!-- Text -->
                <p class="mb-0 fs-sm text-center text-muted">
                    Don't have an account yet? <a href="signup-illustration.html">Sign up</a>.
                </p>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
