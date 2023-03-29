<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sales;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartServiceProvider;
use Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
      // dd($products);
        return view('shop')->with(['products' => $products]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart')->with(['cartCollection' => $cartCollection]);;
    }

    public function sale()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('sale')->with(['cartCollection' => $cartCollection]);;
    }


    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Producto Removido');
    }

    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug


            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Carrito Actualizado!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Carrito Vacio!');
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  $cantidad = $request->input('quantity');
       // $idProducto =  $request->input('product_id');
        // $consulta = Product::find($idProducto);

        // $validar = $consulta['stock'];

        // if($cantidad > $validar)
        // {
        //     $mensaje = "No hay muchos en stok";

        //     return redirect()->route('cart.index')->with('error_msg', 'No disponemos de esa Cantidad!');
        // }


        $sales = new Sales();
       $sales->user_name = $request->input('user_name');
       $sales->ci = $request->input('ci');
       $sales->date = $request->input('date');
       $sales->name = collect($request->name);
       $sales->price = collect($request->price);
       $sales->quantity = collect($request->quantity);
       $sales->phone = $request->input('phone');
       $sales->subTotal = $request->input('subTotal');
       $sales->iva = $request->input('iva');
       $sales->total = $request->input('total');
     //  $sales->product_id = collect($request->product_id);
       $sales->save();

               $name = $request->name;
      $price = $request->price;
      $quantity = $request->quantity;
      $product_id = $request->product_id;

            for($i=0; $i < count($name); $i++)
            {
                $database = [
                    'name' => $name[$i],
                    'price' => $price[$i],
                    'quantity' => $quantity[$i],
                    'product_id' => $product_id[$i]
                ];
                DB::table('products_sales')->insert($database);

            $product_sold = DB::select("UPDATE products INNER JOIN products_sales
            ON products.id = products_sales.product_id
            SET products.stock = products.stock - $quantity[$i]
            WHERE products.id = $product_id[$i]");
        }
          //  Session::put('success', "Ok");




       $success = "Venta realiza con exito";
       \Cart::clear();
       return redirect()->route('cart.index')->with('success_msg', 'Gracias por su Compra!');
    }


    public function listSales ()
    {
        $sales = Sales::all();
          return response()->json([
                'data' => $sales,
                'msg2' => 'Producto creado con exito'
            ],200);
    }

}
