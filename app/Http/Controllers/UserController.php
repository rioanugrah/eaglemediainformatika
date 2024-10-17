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
                            ->rawColumns(['action'])
                            ->make(true);
        }

        return view('backend.users.index');
    }

    public function create()
    {
        $data['roles'] = $this->role->pluck('name','name')->all();
        return view('backend.users.create',$data);
    }
}
