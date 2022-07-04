<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function __construct()
 {
    $this->middleware('auth');
 }




    public function index()
    {
        $id=Auth::id();
        $carts=User::find($id);
        return view('front.cart.index',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartRequest $request)
    {


        if(Cart::where('product_id',  $request->id)->exists()){

            Cart::where('product_id',$request->id)->where('size',$request->size)->update(
[               'quantity'=>$request->quantity

]            );
        }



      $products=Cart::find($request);


      if ($products){
      $carts=Cart::updateOrCreate([
        'product_id'=>$request->product_id,
        'user_id'=>Auth::user()->id,
        'quantity'=>$request->quantity,
        'size'=>$request->size,
      ]);



      return response()->json([
          'status' => true,
          'msg' => 'تم الحفظ بنجاح',
      ]);
    }
  else
      return response()->json([

          'status' => false,
          'msg' => 'فشل الحفظ برجاء المحاوله مجددا',


      ]);
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::with('prodcuts_attributes')->find($id);
       return view('front.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $cart=Cart::find($request->id);

        $carts=$cart->update($request->all());

        if($carts) {

            return response()->json([
                'status'=>true,
                'msg'=>'update successfully',
             ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'msg'=>'update fail',
             ]);
        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart=Cart::findOrFail($id);

        if($cart){
            $cart->delete();

        return response()->json([
           'status'=>true,
           'msg'=>'deleted successfully',
           'id'=>$cart->id
        ]);
    }


    else {
        return response()->json([
           'status'=>false,
           'msg'=>'error',

        ]);
    }
    }
}
