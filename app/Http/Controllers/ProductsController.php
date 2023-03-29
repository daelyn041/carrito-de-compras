<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('pantallas.listProducts', compact('products'));
        // return response()->json([
        //     'data' => $product,
        //     'msg2' => 'Lista de productos'
        // ],200);
    }

    public function index2()
    {
        $products = Product::all();

        return view('home', compact('products'));
        // return response()->json([
        //     'data' => $product,
        //     'msg2' => 'Lista de productos'
        // ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pantallas.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->details = $request->input('details');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');

        //$product->photo = $request->input('photo');

        if($request->file('file'))
        {
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('stortage', $filename);
            $product->image_path=$filename;
        }
        // $product->product_name = $request->product_name;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->stock = $request->stock;
        // //$product->photo = $request->input('photo');

        // //$product->photo = $request->file->store('products');
        $product->save();
        // return response()->json([
        //         'data' => $product,
        //         'msg2' => 'Producto creado con exito'
        //     ],200);

        $success = "Producto creado con exito";
        return back()->with(compact('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('pantallas.editProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->details = $request->input('details');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');

        //$product->photo = $request->input('photo');

        if($request->file('file'))
        {
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('stortage', $filename);
            $product->image_path=$filename;
        }
        $product->save();

        $success = "Producto actualizado con exito";

        return redirect('home')->with(compact('success'));

        // return response()->json([
        //     'data' => $product,
        //     'msg' => 'Actualizado con exito'
        // ],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        //  return response()->json([
        //     'data' => $product,
        //     'msg' => 'Eliminado con exito'
        // ],200);


            $danger = "Producto Eliminado con exito";

        return redirect('/home')->with(compact('danger'));
    }
}
