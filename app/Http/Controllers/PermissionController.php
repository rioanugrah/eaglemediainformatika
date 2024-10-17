<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DataTables;
use Validator;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Permission::all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                $btn = '';
                                $btn.= '<a href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                        </a>';
                                $btn.= '<a href='.route('permissions.edit',['id' => $row->id]).' class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
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
        return view('backend.permissions.index');
    }

    public function create()
    {
        return view('backend.permissions.create');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'name'  => 'required',
            'guard_name'  => 'required',
        ];

        $messages = [
            'name.required'  => 'Nama wajib diisi.',
            'guard_name.required'  => 'Guard Name wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $permissions = Permission::create($input);

            if($permissions){
                $message_title="Berhasil !";
                $message_content="Permission Berhasil Disimpan";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return response()->json($array_message);
        }

        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        if (empty($permission)) {
            return redirect()->back()->with('error','Permission Tidak Ditemukan');
        }

        return view('backend.permissions.edit',compact('permission'));
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'name'  => 'required',
            'guard_name'  => 'required',
        ];

        $messages = [
            'name.required'  => 'Nama wajib diisi.',
            'guard_name.required'  => 'Guard Name wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $permissions = Permission::find($id)->update($input);

            if($permissions){
                $message_title="Berhasil !";
                $message_content="Permission Berhasil Update";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return response()->json($array_message);
        }

        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }
}
