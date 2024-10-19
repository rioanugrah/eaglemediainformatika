<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cooperation;

use DataTables;
use Validator;

class CooperationController extends Controller
{
    function __construct(
        Cooperation $cooperation
    ){
        $this->cooperation = $cooperation;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (auth()->user()->hasRole('Administrator') == true) {
                $data = $this->cooperation::all();
            }else{
                $data = $this->cooperation::where('user_id',auth()->user()->generate)->get();
            }
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('status', function($row){
                                switch ($row->status) {
                                    case 'Verification':
                                        return '<span class="badge text-sm fw-semibold bg-warning-600 px-20 py-9 radius-4 text-white">Waiting Verification</span>';
                                        break;

                                    default:
                                        # code...
                                        break;
                                }
                            })
                            ->addColumn('action', function($row){
                                $btn = '';
                                $btn.= '<a href='.route('cooperation.detail',['cooperation_code' => $row->cooperation_code]).' class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                        </a>';
                                $btn.= '<a href='.route('cooperation.edit',['cooperation_code' => $row->cooperation_code]).' class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="lucide:edit"></iconify-icon>
                                        </a>';
                                $btn.= '<a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </a>';
                                return $btn;
                            })
                            ->rawColumns(['action','status'])
                            ->make(true);
        }
        return view('backend.cooperation.index');
    }

    public function create()
    {
        return view('backend.cooperation.create');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'cooperation_name'  => 'required',
            'cooperation_email'  => 'required',
            'cooperation_company'  => 'required',
            'cooperation_email_company'  => 'required',
            'cooperation_location'  => 'required',
            'cooperation_address_one'  => 'required',
            // 'cooperation_address_two'  => 'required',
            'cooperation_no_telp'  => 'required',
            'cooperation_city'  => 'required',
            'cooperation_state'  => 'required',
            'cooperation_country'  => 'required',
            'cooperation_zip_code'  => 'required',
        ];

        $messages = [
            'cooperation_name.required'  => 'Name is required.',
            'cooperation_email.required'  => 'Email is required.',
            'cooperation_company.required'  => 'Company is required.',
            'cooperation_email_company.required'  => 'Email Company is required.',
            'cooperation_location.required'  => 'Location is required.',
            'cooperation_address_one.required'  => 'Address 1 is required.',
            'cooperation_no_telp.required'  => 'Phone Number is required.',
            'cooperation_city.required'  => 'City is required.',
            'cooperation_state.required'  => 'State is required.',
            'cooperation_country.required'  => 'Country is required.',
            'cooperation_zip_code.required'  => 'Zip Code is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['cooperation_code'] = "COO-".rand(10000,99999).date('Ymd');
            $input['user_id'] = auth()->user()->generate;
            $input['status'] = 'Verification';
            $cooperation = $this->cooperation->create($input);

            if($cooperation){
                $message_title="Success !";
                $message_content="Cooperation ".$request->cooperation_company." is success. Waiting for confirmation";
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

    public function detail($cooperation_code)
    {
        $data['cooperation'] = $this->cooperation::where('cooperation_code',$cooperation_code)->first();

        if (empty($data['cooperation'])) {
            return redirect()->back()->with('error','Cooperation Not Found');
        }

        return view('backend.cooperation.detail',$data);
    }

    public function edit($cooperation_code)
    {
        $data['cooperation'] = $this->cooperation::where('cooperation_code',$cooperation_code)->first();

        if (empty($data['cooperation'])) {
            return redirect()->back()->with('error','Cooperation Not Found');
        }

        return view('backend.cooperation.edit',$data);
    }

    public function update(Request $request,$cooperation_code)
    {
        $rules = [
            'cooperation_name'  => 'required',
            'cooperation_email'  => 'required',
        ];

        $messages = [
            'cooperation_name.required'  => 'Name is required.',
            'cooperation_email.required'  => 'Email is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            // dd($input);
            $input['status'] = 'Verification';
            $cooperation = $this->cooperation->where('cooperation_code',$cooperation_code)->first();
            // dd($cooperation);
            $cooperation->update($input);

            if($cooperation){
                $message_title="Success !";
                $message_content="Cooperation is success. Waiting for confirmation";
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
