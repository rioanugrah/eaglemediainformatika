<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RolesController extends Controller
{
    function __construct()
    {

    }

    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('backend.roles.index',compact('roles'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        DB::statement("SET SQL_MODE=''");;
        $role_permission = Permission::select('name','id')->groupBy('name')->get();
        $data['custom_permission'] = array();
        foreach($role_permission as $per){

            $key = substr($per->name, 0, strpos($per->name, "-"));

            if(str_starts_with($per->name, $key)){

                $data['custom_permission'][$key][] = $per;
            }

        }

        return view('backend.roles.create',$data);
    }

    public function store(Request $request)
    {
        // dd($request->input('permission'));
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $permissions = Permission::whereIn('id', $request->permission)->get();
        $role->syncPermissions($permissions);
        // $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        // return view('backend.roles.show',compact('role','rolePermissions'));
    }

    public function edit($id)
    {
        $data['role'] = Role::find($id);
        DB::statement("SET SQL_MODE=''");
        $role_permission = Permission::select('name','id')->groupBy('name')->get();

        $data['custom_permission'] = array();

        foreach($role_permission as $per){

            $key = substr($per->name, 0, strpos($per->name, "-"));

            if(str_starts_with($per->name, $key)){
                $data['custom_permission'][$key][] = $per;
            }

        }

        return view('backend.roles.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $permissions = Permission::whereIn('id', $request->permission)->get();
        $role->syncPermissions($permissions);
        // $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
