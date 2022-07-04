<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $categories=Category::with('SubCategories')->paginate(10);

        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create([
            'name'=>$request->name

          ]);


          if ($category)
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $Category=Category::findOrFail($id);


          if (!$Category)
              return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
              ]);


        return view('admin.categories.edit',compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $Category=Category::findOrFail($id);

        $Category->update($request->all());




          if ($Category)
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

        $Category=Category::find($id);


            if($Category){
         $Category->SubCategories()->delete();

                $Category->delete();

            return response()->json([
               'status'=>true,
               'msg'=>'deleted successfully',
               'id'=>$Category->id
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
