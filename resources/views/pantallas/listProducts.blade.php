@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Lista de Productos</h2>

        <div class="col-md-1">

        </div>
        <div class="col-md-10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <br>
                        <table class="table ">
                            <thead style="background-color: rgb(27, 27, 27);" >
                              <tr>
                                <th class="text-center" style="color: white" scope="col">#</th>
                                <th class="text-center" style="color: white" scope="col">Producto</th>
                                <th class="text-center" style="color: white" scope="col">Precio</th>
                                <th class="text-center " style="color: white" scope="col">Modelo</th>
                                <th class="text-center " style="color: white" scope="col">Cantidad</th>
                                <th class="text-center " style="color: white" scope="col">Foto</th>
                                <th class="text-center " style="color: white" scope="col" colspan="2">ACCIONES</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $items )
                                    <tr>
                                        <th></th>
                                        <th  class="text-center" scope="row">{{ $items->name }}</th>
                                        <th  class="text-center" scope="row">{{ $items->price }}</th>
                                        <th  class="text-center" scope="row">{{ $items->slug }}</th>
                                        <th  class="text-center" scope="row">{{ $items->stock }}</th>
                                        <th  class="text-center" scope="row"><img style="height: 10vh" src={{"http://localhost:8000/stortage/$items->image_path"}} alt=""></th>
                                        <th class="text-center" scope="row">
                                            <form action="{{ route('pantallas.listProducts.destroy', $items->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button  title=" Eliminar"  class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i> Eliminar
                                                </button>
                                                </form>
                                        </th>
                                        <th class="text-center ">
                                            <a href="{{ route('pantallas.editProduct', $items->id) }}" class="btn btn-warning" >  <i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                        </th>
                                    </tr>
                                @endforeach


                            </tbody>
                          </table>
                          <div   class="d-flex justify-content-center">

                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>
@endsection
