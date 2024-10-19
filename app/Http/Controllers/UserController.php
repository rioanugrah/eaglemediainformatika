<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use \Carbon\Carbon;
use Hash;
use Cache;
use DataTables;
use Validator;

class UserController extends Controller
{
    function __construct(
        User $user,
        Role $role
    ){
        $this->user = $user;
        $this->role = $role;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->user->all();
            return DataTables::of($data)
                            ->addColumn('created_at', function($row){
                                return $row->created_at->diffForHumans();
                            })
                            ->addColumn('updated_at', function($row){
                                return $row->updated_at->isoFormat('DD MMMM YYYY H:m:s');
                            })
                            ->addColumn('roles', function($row){
                                foreach ($row->getRoleNames() as $key => $value) {
                                    return '<label class="badge text-sm fw-semibold bg-primary-600 px-20 py-9 radius-4 text-white">'.$value.'</label>';
                                }
                            })
                            ->addColumn('action', function($row){
                                $btn = '';
                                $btn.= '<a href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                        </a>';
                                $btn.= '<a href="javascript:void(0)" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="lucide:edit"></iconify-icon>
                                        </a>';
                                $btn.= '<a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </a>';
                                return $btn;
                            })
                            ->rawColumns(['action','roles'])
                            ->make(true);
        }

        return view('backend.users.index');
    }

    public function create()
    {
        $data['roles'] = $this->role->pluck('name','name')->all();
        return view('backend.users.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();

        $str        = "";
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
        $max        = strlen($characters) - 1;
        for ($i = 0; $i < 25; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }

        $input['generate'] = $str;
        $input['password'] = Hash::make($input['password']);

        $user = $this->user->create($input);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
}
