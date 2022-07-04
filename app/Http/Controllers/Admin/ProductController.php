<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsAttribtues;
use App\Models\SubCategory;
use App\Traits\DeleteImageTrait;
use App\Traits\SaveImageTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use SaveImageTrait;
    use DeleteImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $products=Product::with('SubCategory')->with('prodcuts_attributes')->get();


        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories=SubCategory::all();
        $categories=Category::all();

        return view('admin.products.create',compact('subcategories','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $filename=$this->saveImage($request->image,'products');

        $product=Product::create([
         'name'=>$request->name,
         'price'=>$request->price,
         'description'=>$request->description,
         'image'=>$filename,
         'category_id'=>$request->category_id,
         'quantity'=>100,
         'color'=>$request->color
        ]);

        foreach($request->size as $item) {
        ProductsAttribtues::create([
            'product_id'=>$product->id,
            'size'=>$item
        ]);
    }




        if ($product)
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }
    public function fetch(Request $request)
    {
        return $request;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::with('prodcuts_attributes')->findOrFail($id);

        $categories=Category::all();


        if (!$product)
            return response()->json([
              'status' => false,
              'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);

        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


          $products=Product::find($id);


       if($request->has('image')) {
         $image=$this->DeleteImage($products->image,'products');
         $filename=$this->saveImage($request->image,'products');
         $product= $products->update([
           'name'=>$request->name,
           'price'=>$request->price,
           'description'=>$request->description,
           'image'=>$filename,
           'category_id'=>$request->category_id,
           'quantity'=>100,
           'color'=>$request->color
          ]);








       }


        else {
            $product= $products->update([
             'name'=>$request->name,
             'price'=>$request->price,
             'description'=>$request->description,
             'image'=>$products->image,
             'category_id'=>$request->category_id,
             'quantity'=>100,
             'color'=>$request->color
            ]);

        }
        if($request->has('size')) {
            $products->prodcuts_attributes()->delete();
            foreach($request->size as $size)
            $products->prodcuts_attributes()->insert([
                'product_id'=>$id,
                'size'=>$size
            ]);
        }










            if ($product)
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $image=$this->DeleteImage($product->image,'products');
        if($image){
            $product->prodcuts_attributes()->delete();

            $product->delete();
            return response()->json([
               'status'=>true,
               'msg'=>'deleted successfully',
               'id'=>$product->id
            ]);

        }
        else {
            $product->delete();
            return response()->json([
               'status'=>false,
               'msg'=>'error',

            ]);
        }
    }



    public function getproducts($id)
    {
       $subcategories=SubCategory::where('category_id',$id)->pluck("name", "id");


        return json_encode($subcategories);
    }

}
