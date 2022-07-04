<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $subcategories=SubCategory::with('category')->paginate(10);
        return view('admin.subcategories.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();

        return view('admin.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $subcategories = SubCategory::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id

          ]);


          if ($subcategories)
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
     * @param  \App\Models\SubCategory  $SubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $SubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $SubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $subcategories=SubCategory::findOrFail($id);
        $categories=Category::all();

          if (!$subcategories)
              return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
              ]);


        return view('admin.subcategories.edit',compact('subcategories','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, $id)
    {
        $subcategories=SubCategory::findOrFail($id);

        $subcategories->update($request->all());




          if ($subcategories)
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


    public function destroy($id)
    {

        $subcategories=SubCategory::findOrFail($id);

            if($subcategories){
                $subcategories->delete();

            return response()->json([
               'status'=>true,
               'msg'=>'deleted successfully',
               'id'=>$subcategories->id
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
