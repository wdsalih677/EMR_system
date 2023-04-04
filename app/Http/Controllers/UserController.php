<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('role:Admin');
    }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$roles = Role::get();
$data = User::orderBy('id','DESC')->paginate(5);
return view('users.index',compact('data','roles'))
->with('i', ($request->input('page', 1) - 1) * 5);
}


/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$roles = Role::pluck('name','name')->all();

return view('users.index',compact('roles'));

}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required|same:confirm-password',
'roles_name' => 'required'
]);

$input = $request->all();


$input['password'] = Hash::make($input['password']);

$user = User::create($input);
$user->assignRole($request->input('roles_name'));
return redirect()->route('users.index')
->with('success','تم اضافة المستخدم بنجاح');
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$user = User::find($id);
return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$user = User::findOrFail($id);
$roles = Role::all();
$userRole = $user->roles->pluck('name','name')->all();
return view('users.edit',compact('user','roles','userRole'));
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
    // dd($request);
    $role =  [
        'name'   => 'required|min:3|max:100',
        'email' => 'required|max:255',
        'password' => 'same:confirm-password',
    ];
    $messages =[
        'name.required'=>'يجب إدخال اسم المستخدم',
        'name.min'=>'يجب أن لا يقل اسم القسم عن 3 احرف',

        'email.required'=>'يجب إدخال البريد الإلكتروني',

        'password.same'=>'يجب تأكيد كلمة المرور',
    ];
    //validate
    $validator = Validator::make($request->all(),$role,$messages);
    if($validator  -> fails()){
        return redirect()->back()->withErrors( $validator)->withInput($request->all());
    }
    //update
    $users = User::findOrFail($id);

    $users->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'Status'=>$request->Status,
        'roles_name'=>$request->roles_name
    ]);
    DB::table('model_has_roles')->where('model_id',$id)->delete();
    $users->assignRole($request->input('roles_name'));
    toastr()->success("تم تعديل المستخدم بنجاح");
    return redirect()->route('users.index');
// $this->validate($request, [
// 'name' => 'required',
// 'email' => 'required|email',
// 'password' => 'same:confirm-password',
// 'roles' => 'required'
// ]);
// $input = $request->all();
// if(!empty($input['password'])){
// $input['password'] = Hash::make($input['password']);
// }else{
// $input = Arr::except($input,array('password'));
// }
// $user = User::find($id);
// $user->update($input);
// DB::table('model_has_roles')->where('model_id',$id)->delete();
// $user->assignRole($request->input('roles'));
// return redirect()->route('users.index')
// ->with('success','تم تحديث معلومات المستخدم بنجاح');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request)
{
    User::findOrFail($request->id)->delete();
    toastr()->success("تم حذف المستخدم بنجاح");
    return redirect()->route('users.index');
}
}
