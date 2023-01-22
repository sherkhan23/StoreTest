
@extends('layout')
<body>

<header class="p-3 bg-dark text-white mt-3 rounded">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="{{route('catalog')}}" class="nav-link px-2 text-white">Каталог</a></li>
                <li><a href="{{route('getCart')}}" class="nav-link px-2 text-white">Корзинка</a></li>
                <li><a href="{{route('orders')}}"  class="nav-link px-2 text-white">Заказы</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                @auth("web")
                    <span class="rounded text-success">
                        Добро пожаловать {{auth()->user()->name}}
                        <br>
                        <a type="button" class="btn btn-sm form-control bg-danger" href="{{ route("logout") }}"> Выйти</a>
                    </span>
                @endauth

                @guest("web")
                        <a href="{{route('login')}}" type="button" class="btn btn-outline-primary me-2 bg-primary">Вход</a>
                        <a href="{{route('register')}}" type="button" class="btn btn-warning bg-success">Регистрация</a>
                @endguest
            </div>
        </div>
    </div>
</header>
{{--<div class="container-fluid pb-3 py-3">--}}
{{--    <div class="d-grid gap-3" style="grid-template-columns: 1fr 2fr;">--}}
{{--        <div class="bg-light border rounded-3">--}}
{{--            <br><br><br><br><br><br><br><br><br><br>--}}
{{--        </div>--}}
{{--        <div class="bg-light border rounded-3">--}}
{{--            <br><br><br><br><br><br><br><br><br><br>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
</body>

