<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/


function __construct()
{

$this->middleware('permission:صلاحيات المستخدمين', ['only' => ['index']]);
// $this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
// $this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
// $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);

}




/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
    $premissions = Permission::get();
    $roles =Role::get();
return view('roles.index',compact('roles','premissions'));

}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $premissions = Permission::get();
return view('roles.add',compact('premissions'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
    // return $request;
   $roles = Role::create([ 'name'=>$request->role_name]);
   $roles->syncPermissions($request->get('permission'));
    toastr()->success("تمت إضافة الصلاحيه بنجاح");
    return redirect()->route('roles.index');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{

}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
        $role = Role::findOrFail($id);
        $premissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view('roles.edit',compact('role','premissions','rolePermissions'));

}
/**
* Update the specified resource in storage.
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    // return $request;
    $role = Role::find($id);
    $role->name = $request->input('role_name');
    $role->save();
    $role->syncPermissions($request->input('permission'));
    toastr()->success("تم تعديل الصلاحيه بنجاح");
    return redirect()->route('roles.index');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{

}
}
