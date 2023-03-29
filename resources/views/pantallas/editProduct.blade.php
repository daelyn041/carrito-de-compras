@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3>Actualizar Producto</h3>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="card ">
                <form style="margin: 5%" action="{{ route('pantallas.editProduct', $product->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group ">
                        <label for="">Nombre del Producto</label>
                        <input type="name" name="name"  id="name" value="{{ $product->name }}" class="form-control"  placeholder="Nombre del Producto"/>
                        <br>
                        <label for="">Precio</label>
                        <input type="price" name="price"  id="price" value="{{ $product->price }}" class="form-control"  placeholder="Precio del Producto"/>
                        <br>
                        <label for="">Modelo</label>
                        <input type="slug" name="slug"  id="slug" value="{{ $product->slug }}" class="form-control"  placeholder="Precio del Producto"/>
                        <br>
                        <label for="">Cantidad</label>
                        <input type="stock" name="stock"  id="stock" value="{{ $product->stock }}" class="form-control"  placeholder="Precio del Producto"/>
                        <br>
                        <label for="">Detalles</label>
                        <input type="details" name="details"  id="details" value="{{ $product->details }}" class="form-control"  placeholder="Cantidad"/>
                        <br>
                        <label for="">Imagen del Producto</label>
                        <input type="file" name="file"  id="file" value="{{ $product->image_path }}" class="form-control"  placeholder="Nombre del Producto"/>
                        <br>
                        <label for="">Descripcion del Producto</label>
                        <textarea  id="description"  class="form-control" name="description" placeholder="Descripcion del Producto">{{ $product->description }}</textarea>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning ">Actualizar producto</button>
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
