@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row ">
       <div class="col-md-1">

       </div>
       <div class="col-md-10">
        @if (session('success'))
            <div id="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif

            @if (session('danger'))
            <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
       <div class="row">
        @foreach ($products as $items )
        <div style="padding: 2%" class="col-md-4">


            <div style="box-shadow: 10px 5px 5px rgb(180, 179, 179);" class="card text-center">

                <div style="margin: 10%; border:none" class="card" >
                    <img style="height: 25vh; border-radius:10% " src={{"http://localhost:8000/stortage/$items->image_path"}}  alt="">
               </div>

               <h3 style="font-weight: 600;" >{{ $items->name }}</h3>

               {{-- <span>Detalles</span>

               <p>{{ $items->description }}</p> --}}

               <div class="row" style="margin: 2%">
                    <div class="col-md-6">
                        <samp>Precio</samp>
                        <h2 style="color:green" >${{ $items->price }}</h2>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $items->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $items->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $items->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $items->image_path }}" id="img" name="img">
                                        <input type="hidden" value="{{ $items->slug }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                            <div style="padding-top: 15%">
                                <button  class="btn btn-outline-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                            </div>
                        </form>


                    </div>
               </div>

            </div>
        </div>
        @endforeach
       </div>


       </div>
       <div class="col-md-1">

       </div>
    </div>
</div>
@endsection
