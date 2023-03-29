@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h2>Lista de Comprobantes</h2>
                <div class="row">
                    <br>
                    @foreach ($sales as $item)
                        <div style="padding: 2%" class="col-md-12">
                            <div class="card">
                                <div class="row" style="margin: 2%">
                                    <div class="col-md-6">
                                        <h2>Comprobante</h2>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Fecha: </label>
                                        <samp>{{ $item->date }}</samp>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Cliente: </label>
                                        <samp>{{ $item->user_name }}</samp>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Cedula: </label>
                                        <samp>{{ $item->ci }}</samp>
                                    </div>
                                </div>

                                <div class="row" style="margin: 2%">
                                    <div class="col-md-12 text-center">
                                        <p>Detalles de la Factura</p>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table ">
                                                    <thead style="background-color: rgb(27, 27, 27);">
                                                        <tr>
                                                            <th class="text-center" style="color: white" scope="col">#
                                                            </th>
                                                            <th class="text-center" style="color: white" scope="col">
                                                                Producto</th>
                                                            <th class="text-center " style="color: white" scope="col">
                                                                Precio Unitario</th>
                                                            <th class="text-center " style="color: white" scope="col">
                                                                Cantidad</th>
                                                                <th class="text-center " style="color: white" scope="col">
                                                                    TOTAL</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 0; $i < count($item->name); $i++)
                                                            <tr>
                                                                <th></th>
                                                                <th class="text-center" scope="row">{{ $item->name[$i] }}
                                                                </th>
                                                                <th class="text-center" scope="row">
                                                                    ${{ $item->price[$i] }}  </th>
                                                                <th class="text-center" scope="row">
                                                                    {{ $item->quantity[$i] }}</th>

                                                                    <th class="text-center" scope="row">
                                                                        ${{ $item->price[$i] * $item->quantity[$i]}}  </th>

                                                            </tr>
                                                        @endfor



                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-8">

                                                <p>SubTotal </p>

                                                <p>IVA</p>

                                                <P style="font-weight: 700">TOTAL</P>

                                            </div>
                                            <div class="col-md-4">


                                                <p>$ {{ $item->subTotal }}</p>

                                                <p> $ {{ $item->iva }}</p>
                                                <p style="font-weight: 700; ">$ {{ $item->total }}</p>






                                            </div>
                                        </div>



                                    </div>
                                </div>


                            </div>
                        </div>
                    @endforeach
                </div>



                <br>

            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection
