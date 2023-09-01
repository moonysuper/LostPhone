<?php

namespace App\Http\Controllers;

use App\Models\PhoneModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MinController extends Controller
{
    //

    
       
        function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'status'=>'Failed',
                    'Message' => ['Email or password invaild']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'status'=>'Success',
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 200);
    }

    function register(Request $request)
    {
        $rules = array('email' => 'unique:users,email',
                        'password' => 'required|string|min:8',
    );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
         
        return response()->json([
            'status'=>'Failed',
            'Message' => $validator->errors()->getMessages()
        ]);
        }
        else
        {
            $register = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile'=> $request->mobile,
                'address'=>$request->address,
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]);
            if($register)
        {
            $user= User::where('email', $request->email)->first();
            $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'status'=>'Success',
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 200);
        }
        }
        
        
    }
    
    function AddLostPhone(Request $request)
    {
        $phone = new PhoneModel();
        $rules = [
            'report' => 'required|mimes:jpeg,png|max:2048',
            'box' => 'mimes:jpeg,png|max:2048',
            'ownername' => 'required|string|max:50',
            'ptheft' => 'required|string|max:50',
            'phone' => 'required|String|digits:10',
            'imei' => 'required|integer|digits:15' ,
            'brand' => 'required|string|max:20',
            'model' => 'required|string|max:20',
            'date' => 'required|date|before:tomorrow'
        ];
        $validator = Validator::make($request->all(), $rules);

  
    if ($validator->fails())
    { 
          return response()->json(['Error' => $validator->errors()->getMessages()]);
    }
        if(PhoneModel::where('Imei',$request->input('imei'))->exists())
          {
           
            return ['message'=>'This IMEI Already Reported'];
          }
          if($request->hasFile('box'))
          {
            $request->file('box')->getClientOriginalName();
            $imageName = time().'.'.$request->box->extension();
            $request->box->move(public_path('asset/uploads/'), $imageName);
            $phone->box_image = $imageName;
          }
       
        
             $request->file('report')->getClientOriginalName();
             $images = time().'.'.$request->report->extension();
             $request->report->move(public_path('asset/uploads/box/'), $images);
       
        
          
          
    $phone->ownerid = Auth::id(); //Auth::id();
    $phone->ownername = $request->input('ownername');
    $phone->phone = $request->input('phone');
    $phone->imei = $request->input('imei');
    $phone->brand = $request->input('brand');
    $phone->model = $request->input('model');
    $phone->ptheft = $request->input('ptheft');
    $phone->date = $request->input('date');
    $phone->rep_image = $images;
    if($phone->save())
        {
            return ['status'=>"Your report has been successfully added. Please wait for confirmation from the admin"];
        }

    }

    function Search($imei)
    {
            if(PhoneModel::where('Imei',$imei)->exists())
            {
                $phone= PhoneModel::where('Imei', $imei)->first();
                $response = [
                    'status'=>'Success',
                    'Data' => $phone];
                    return response($response);
            }
            else{
                return [
                    'status'=>'Failed',
                    'Message'=>'not found'
                ];
            }
    }
    function GetData()
    {
        $phone =  PhoneModel::all();
        $response = [
            'status'=>'Success',
            'Data' => $phone
        ];

            return response($response);
    }
}
