@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3>Formulario para crear un nuevo Producto</h3>
        </div>
        <div class="col-md-6">
            @if (session('success'))
            <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">

            <div class="card ">
                <form style="margin: 5%" action="{{ route('pantallas.createProduct') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="">Nombre del Producto</label>
                        <input type="product_name" name="name" class="form-control"  placeholder="Nombre del Producto"/>
                        <br>
                        <label for="">Precio</label>
                        <input type="price" name="price" class="form-control"  placeholder="Precio del Producto"/>
                        <br>
                        <label for="">Modelo</label>
                        <input type="slug" name="slug" class="form-control"  placeholder="Precio del Producto"/>
                        <br>
                        <label for="">Cantidad</label>
                        <input type="stock" name="stock" class="form-control"  placeholder="Precio del Producto"/>
                        <br>
                        <label for="">Detalles</label>
                        <input type="details" name="details" class="form-control"  placeholder="Cantidad"/>
                        <br>
                        <label for="">Imagen del Producto</label>
                        <input type="file" name="file" class="form-control"  placeholder="Nombre del Producto"/>
                        <br>
                        <label for="">Descripcion del Producto</label>
                        <textarea class="form-control" name="description" placeholder="Descripcion del Producto"></textarea>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success ">Crear nuevo producto</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>
@endsection
