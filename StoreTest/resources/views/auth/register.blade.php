@extends('layout')

@section('title') Register @endsection

<section class="section-border border-primary">
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center gx-0 min-vh-100">
            <div class="col-12 col-md-5 col-lg-4 order-md-1 mb-auto mb-md-0 pb-8 py-md-11">

                <!-- Heading -->
                <h1 class="mb-0 fw-bold text-center">
                    Регистрация
                </h1>

                <!-- Text -->
                <p class="mb-6 text-center text-muted">
                    Simplify your workflow in minutes.
                </p>

                <!-- Form -->
                <form action="{{ route("register_process") }}" class="space-y-5" method="POST">
                @csrf
                <!-- Email -->
                    <div class="form-group mb-3">
                        <label class="form-label" for="email">
                            Name
                        </label>
                        <input type="name" class="form-control" name="name" id="name" placeholder="Имя">
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label class="form-label" for="email">
                            Email Address
                        </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@address.com">
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label class="form-label" for="password">
                            Password
                        </label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                    </div>

                    <div class="form-group mb-5">
                        <label class="form-label" for="password">
                            Re Password
                        </label>
                        <input class="form-control"  name="password_confirmation" type="password" placeholder="Подтверждение пароля" />
                    </div>

                    <!-- Submit -->
                    <button class="btn w-100 btn-primary" type="submit">
                        Sign up
                    </button>

                </form>

                <!-- Text -->
                <p class="mb-0 fs-sm text-center text-muted">
                    Already have an account? <a href="signin-illustration.html">Log in</a>.
                </p>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
