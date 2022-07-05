<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Product;
use App\Models\ProductsAttribtues;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::with('products')->where('user_id',Auth::id())->paginate(15);

        return view('front.order.index',compact('orders'));




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
    public function store(Request $request)
    {
        $order=Order::create($request->all());


        $product_orders=Cart::where('user_id',$request->user_id)->get();
        foreach($product_orders as $product_or)
        $product_order=Order_product::create([
            'product_id'=>$product_or->product_id,
            'order_id'=>$order->id,

        ]);



        if ($order && $product_order){
            Cart::where('user_id',Auth::id())->delete();


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $orders=Order::with('products')->where('id',$id)->paginate(15);
        return view('front.order.show',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
