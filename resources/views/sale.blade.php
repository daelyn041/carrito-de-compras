@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <h2>Factura</h2>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Finalizar Compra
              </button>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-10">
            <table class="table ">
                <thead style="background-color: rgb(27, 27, 27);" >
                  <tr>
                    <th class="text-center" style="color: white" scope="col">#</th>
                    <th class="text-center" style="color: white" scope="col">Cantidad</th>
                    <th class="text-center " style="color: white" scope="col">Foto</th>
                    <th class="text-center" style="color: white" scope="col">Producto</th>
                    <th class="text-center " style="color: white" scope="col">Modelo</th>
                    <th class="text-center" style="color: white" scope="col">Precio</th>



                  </tr>
                </thead>
                <tbody>
                    @foreach ($cartCollection as $items)
                    <tr>
                        <th></th>
                        <th class="text-center" scope="row">{{ $items->quantity }}</th>
                        <th  class="text-center" scope="row"><img style="height: 10vh" src="http://localhost:8000/stortage/{{$items->attributes->image}}" alt=""></th>
                        <th  class="text-center" scope="row">{{ $items->name }}</th>
                        <th  class="text-center" scope="row">{{ $items->attributes->slug }}</th>
                        <th  class="text-center" scope="row">{{ $items->price }}</th>




                    </tr>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Datos para la Factura</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{ route('sale') }}" method="POST">

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Nombre del Cliente</label>
                                            <input class="form-control" type="text" name="user_name" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Cedula</label>
                                            <input class="form-control" type="text" id="ced" name="ci" onchange="validar()" >
                                            <p style="color: red"  id="salida"></p>
                                        </div>

                                       {{ csrf_field() }}
                                        @foreach ($cartCollection as $item )
                                        <input type="hidden" value="{{ $item->id }}" id="product_id" name="product_id[]">
                                        <input type="hidden" value="{{ $item->name }}" id="name" name="name[]">
                                        <input type="hidden" value="{{ $item->price }}" id="price" name="price[]">
                                        <input type="hidden" value="{{ $item->quantity }}" id="quantity" name="quantity[]">
                                        @endforeach


                                        <input type="hidden" value="{{ \Cart::getTotal() }}" id="subTotal" name="subTotal">
                                        <input type="hidden" value="{{ \Cart::getTotal() * 0.12  }}" id="iva" name="iva">
                                        <input type="hidden" value="{{ \Cart::getTotal() * 0.12 + \Cart::getTotal()  }}"  name="total">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Telefono</label>
                                            <input class="form-control" type="text" name="phone" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Fecha</label>
                                            <input class="form-control" type="date" name="date" >
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-success" id="submitButton" >Comprar</button>
                                </div>
                            </form>

                          </div>
                        </div>
                      </div>

                    @endforeach


                </tbody>
              </table>

              <div class="card">
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-8">

                                    <p>SubTotal  </p>

                                    <p>IVA</p>

                                <p style="font-weight: 700">TOTAL</p>


                            </div>
                            <div class="col-md-4">
                                @if(count($cartCollection)>0)

                                <p>$ {{ \Cart::getTotal() }}</p>

                                <p> $ {{  \Cart::getTotal()  * 0.12  }}</p>
                                <p style="font-weight: 700; ">$ {{ \Cart::getTotal()  * 0.12 + \Cart::getTotal()  }}</p>



                            @endif


                            </div>
                        </div>



                    </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            @if(count($cartCollection)>0)
                            <form action="{{ route('cart.clear') }}" method="POST">
                                {{ csrf_field() }}
                                <button class="btn btn-secondary btn-md">Cancelar Compra</button>
                            </form>
                        @endif
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('home') }}" class="btn btn-dark">Continue en la tienda</a>
                        </div>
                    </div>



                </div>
                <div class="col-md-6">

                </div>
              </div>


        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>

<!-- Button trigger modal -->


  <!-- Modal -->




@endsection
