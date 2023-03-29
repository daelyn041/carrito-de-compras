@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">

        </nav>
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session()->has('error_msg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No tienes Productos en tu Carrito</h4><br>
                    <a href="{{ route('home') }}" class="btn btn-dark">Continue en la tienda</a>
                @endif

                @foreach($cartCollection as $item)
                    <div class="row">
                        <div class="col-3">
                            <img src="http://localhost:8000/stortage/{{$item->attributes->image}}"   class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-5">
                            <p>
                                <b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b><br>
                                <b>Price: </b>${{ $item->price }}<br>
                                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                                {{--                                <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                            </p>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">

                                            <div class="col-md-6">
                                                <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                                <input type="number" class="form-control " value="{{ $item->quantity }}"
                                                id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-secondary btn-sm" ><i class="fa fa-edit"></i></button>
                                            </div>






                                    </div>
                                </form>
                                <br>

                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-dark btn-sm" ><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">Borrar Carrito</button>
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                        </ul>
                    </div>
                    <br><a href="{{ route('home') }}" class="btn btn-dark">Continue en la tienda</a>

                       <a href="{{ route('sale') }}" class="btn btn-success">Finalizar Compra</a>

                </div>
            @endif


        </div>
        <br><br>
    </div>
@endsection
