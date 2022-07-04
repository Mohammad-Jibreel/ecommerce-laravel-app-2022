<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password as RulesPassword;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

         $users=User::paginate(10);



        return view('admin.customers.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed',
            Rules\Password::defaults(),
            RulesPassword::min(8)->letters()->numbers()->mixedCase()->symbols(),
        ],
            'email_verified_at'=>['required','string']
        ]);


        date_default_timezone_set('Asia/Dhaka');
        $datetime = Carbon::now()->toDateTimeString();
    $date = Carbon::createFromFormat('Y-m-d H:i:s',$datetime)->format('Y-m-d h:i:s');
          $result =($request->email_verified_at)==='verified' ? $date : null ;



        $user = User::create([
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
        $user=User::findOrFail($id);


        if (!$user)
            return response()->json([
              'status' => false,
              'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);


      return view('admin.customers.edit',compact('user'));
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
        $user=User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'email_verified_at'=>['required','string']
        ]);


        date_default_timezone_set('Asia/Dhaka');
        $datetime = Carbon::now()->toDateTimeString();
    $date = Carbon::createFromFormat('Y-m-d H:i:s',$datetime)->format('Y-m-d h:i:s');
          $result =($request->email_verified_at)==='verified' ? $date : null ;


        if ($user){
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at'=>$result,

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=user::find($id);


        if($user){
     $user->delete();
        return response()->json([
           'status'=>true,
           'msg'=>'deleted successfully',
           'id'=>$user->id
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
