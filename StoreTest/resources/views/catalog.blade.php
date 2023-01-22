@extends('layout')

@include('home')

<section style="background-color: #eee;">
    @if(session('successAddCart'))
        <div class="alert alert-success mt-3" role="alert">
            {{session('successAddCart')}}
        </div>
    @endif
        <div class="py-1 text-center">
            <h3>Каталог</h3>
        </div>
    <div class="container py-5">
        <div class="row d-flex" style="display: inline-block;">
            <div class="col-md-3 mt-2">
                <div class="card p-3">
                    <h5 class="p-3">
                        Фильтр
                    </h5>
                    <form id="form1" method="GET" action="{{ route("catalog") }}" role="search">
                    {{ csrf_field() }}

                        <div class="input-group rounded">
                            <input name="search_field" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <button class="input-group-text border-0" id="search-addon">
                                <i class="icon-magnifier"></i>
                            </button>
                        </div>

                        <ul class="list-unstyled ps-0" id="filter">
                            <li class="m-1">
                                <b>Категория</b>
                                <select name="categoryFilter" class="form-select" aria-label="Default select example">
                                    <option selected="true" disabled="disabled">Выберите категорию </option>
                                    @foreach($categoryLevel as $categoryLevel)
                                        <option value="{{$categoryLevel->category_level_id}}">{{$categoryLevel->categoryLevel}}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ul>

                        <div class="price-filter">
                            <p class="p-3">
                                Цена:
                            </p>
                            <label>От: </label><input name="price_from" type="number" class="w-75 bg-white ml-2" style="height: 35px"> <br>
                            <label>До: </label><input name="price_to" type="number" class="w-75 bg-white ml-2" style="height: 35px">
                        </div>

                        <button class="button form-control mt-3 text-dark" style="background-color: #00C759"  type="submit">Применить</button>

                    </form>

                </div>
            </div>
            @foreach($getPost as $post)
                <div class="col-md-3 mt-2">
                    <div class="card">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/5.webp"
                             class="card-img-top" alt="Gaming Laptop" />
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="small">
                                    <a href="#!" class="text-muted">
                                        {{$post->postName}}
                                    </a>
                                </p>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">
                                    {{$post->postName}}
                                </h5>
                                <h5 class="text-dark mb-0">
                                    ${{$post->price}}
                                </h5>
                            </div>
                            <p>
                                {{$post->description}}
                            </p>

                            <form action="{{route('addToCart', $post->post_id)}}" method="POST">
                                @csrf
                                <small>
                                    Вес: <input name="weight" readonly value="{{$post->weight}}">г<br>
                                    Длина: <input name="height" readonly value="{{$post->height}}">см<br>
                                    Ширина:<input name="width" readonly value="{{$post->width}}">см
                                </small>
                                <div class="mt-2">
                                    <div style="float: left; width: 50%;">
                                        <span class="ml-3">Количество:</span>
                                    </div>
                                    <div style="float: right; width: 50%;">
                                        <input value="1" type="number" name="quantity" id="quantity" class="form-control w-50">
                                    </div>
                                </div>


                                <button class="btn btn-sm btn-outline-primary form-control mt-2">
                                    Корзину
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
