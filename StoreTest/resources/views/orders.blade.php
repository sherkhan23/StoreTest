@extends('layout')

@include('home')

<section style="background-color: #eee;">
    <div class="py-1 text-center">
        <h3>Заказы</h3>
    </div>
    @if(session('successAddCart'))
        <div class="alert alert-success mt-3" role="alert">
            {{session('successAddCart')}}
        </div>
    @endif
    <div class="container py-5">
        <div class="row d-flex" style="display: inline-block;">
            <div class="col-md-2">
                <div class="card p-3">
                    @if(session('cart') > 0)
                        <b>
                            Количество товаров: {{count(session('cart'))}}
                        </b>
                    @endif
                    <form action="" method="POST">
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="form-control btn btn-outline-primary text-center justify-content-center">
                                Подвердить заказ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @if(session('order') > 0)
                @foreach(session('order') as $post_id => $item)
                    <div class="col-md-3 mt-2">
                        <div class="card p-1">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/5.webp"
                                 class="card-img-top" alt="Gaming Laptop" />
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="small">
                                        <a href="#!" class="text-muted">
                                            {{--                                        {{$post->postName}}--}}
                                            {{$item['postName']}}
                                        </a>
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">
                                        {{--                                    {{$post->postName}}--}}
                                        {{$item['postName']}}
                                    </h5>
                                    <h5 class="text-dark mb-0">
                                        {{--                                    ${{$post->price}}--}}
                                        {{$item['price']}}
                                    </h5>
                                </div>
                                <p>
                                    {{--                                {{$post->description}}--}}
                                    {{$item['description']}}
                                    <br>
                                    <br>
                                    <small>
                                        Вес: <input name="weight" readonly value="{{$item['weight']}}">г <br>
                                        Длина: <input name="height" readonly value="{{$item['height']}}">см<br>
                                        Ширина:<input name="width" readonly value="{{$item['width']}}">см
                                    </small>
                                <form action="{{route('changeCartQuantity', $item['post_id'])}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="ml-3">Количество:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input value="{{$item['quantity']}}" type="number" name="quantity" id="quantity" class="form-control w-100">
                                        </div>
                                        <div class="col-md-5">
                                            <button type="submit" class="form-control btn btn-outline-primary btn-sm">Изменить</button>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{route('delCartPost', $item['post_id'])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="form-control btn btn-outline-danger btn-sm">Убрать</button>
                                </form>
                                {{--                            <form action="{{route('addToCart', $post->post_id)}}" method="POST">--}}
                                {{--                                @csrf--}}
                                {{--                                <button class="btn btn-sm btn-outline-primary form-control">--}}
                                {{--                                    Корзину--}}
                                {{--                                </button>--}}
                                {{--                            </form>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section>
