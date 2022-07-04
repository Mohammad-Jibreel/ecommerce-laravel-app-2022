<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Validation\Rules;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::paginate(10);


        return view('admin.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => [
                'required',
                 'confirmed',
                  Rules\Password::defaults(),
                  Password::min(8)->letters()->numbers()->mixedCase()->symbols(),


        ],
            'email_verified_at'=>['required','string']
        ]);


        date_default_timezone_set('Asia/Dhaka');
        $datetime = Carbon::now()->toDateTimeString();
    $date = Carbon::createFromFormat('Y-m-d H:i:s',$datetime)->format('Y-m-d h:i:s');
          $result =($request->email_verified_at)==='verified' ? $date : null ;



        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at'=>$result,

        ]);
        if ($user)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=Admin::findOrFail($id);


        if (!$admin)
            return response()->json([
              'status' => false,
              'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);


      return view('admin.admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {

        $admin=Admin::find($id);


        date_default_timezone_set('Asia/Dhaka');
        $datetime = Carbon::now()->toDateTimeString();
    $date = Carbon::createFromFormat('Y-m-d H:i:s',$datetime)->format('Y-m-d h:i:s');
          $result =($request->email_verified_at)==='verified' ? $date : null ;


        if (isset($request->password)){
      $admins=  $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at'=>$result,

        ]);
    }
    else {
        $admins=  $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $admin->password,
            'email_verified_at'=>$result,

        ]);
    }

        if($admins){
        return response()->json([
            'status' => true,
            'msg' => 'تم الحفظ بنجاح',
        ]);
    }
    else {
        return response()->json([
            'status' => false,
            'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
        ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=Admin::find($id);


        if($admin){
     $admin->delete();
        return response()->json([
           'status'=>true,
           'msg'=>'deleted successfully',
           'id'=>$admin->id
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
