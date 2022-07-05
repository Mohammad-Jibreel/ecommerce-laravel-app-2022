<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddress as RequestsUserAddress;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      //  $pivot_entries  =
      $products = DB::table('carts')
            ->join('users', 'carts.user_id', '=', 'users.id')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.*','carts.*')->where('carts.user_id','=',Auth::id())
            ->get();

    //  return $products;
        return view('front.chekout.index',compact('products'));
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
    public function store(RequestsUserAddress $request)
    {
        $checkout=UserAddress::create($request->all());
          if ($checkout)
          return response()->json([
              'status' => true,
              'msg' => 'تم الحفظ بنجاح',
          ]);

      else
          return response()->json([
              'status' => false,
              'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $userAddresses=UserAddress::where('user_id',$id)->get();
      return view('front.user.address',compact('userAddresses'));
    }
    public function total($total) {
        return $total;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAddress $userAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAddress $userAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAddress $userAddress)
    {
        //
    }
}
