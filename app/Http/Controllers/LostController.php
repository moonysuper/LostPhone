<?php

namespace App\Http\Controllers;

use App\Models\PhoneModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LostController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('usersBlade.lostphone');
    }

    public function report(Request $request)
    {
            $phone = new PhoneModel();
            $this->validate($request,[
                'report' => ['required','mimes:jpeg,png','max:2048'],
                'box' => ['mimes:jpeg,png','max:2048'],
                'ownername' => ['required', 'string', 'max:50'],
                'ptheft' => ['required', 'string', 'max:50'],
                'phone' => ['required', 'integer','digits:9'],
                'imei' => ['required', 'integer','digits:15' ],
                'brand' => ['required', 'string', 'max:20'],
                'model' => ['required', 'string', 'max:20'],
                'date' => ['required','date','before:tomorrow']
    
            ]);
            if(PhoneModel::where('Imei',$request->input('imei'))->exists())
              {
                return redirect('/lostphone')->with('status',"This Imei Already reported")->with('result','error');
              }
            $request->file('report')->getClientOriginalName();
            $imageName = time().'.'.$request->report->extension();
            $request->report->move(public_path('asset/uploads/'), $imageName);
            if($request->file('box'))
            {
                 $request->file('box')->getClientOriginalName();
                 $images = time().'.'.$request->box->extension();
                 $request->box->move(public_path('asset/uploads/box/'), $images);
                 $phone->box_image = $images;
            }
            
              
              
        $phone->ownerid = Auth::id();
        $phone->ownername = $request->input('ownername');
        $phone->phone = $request->input('phone');
        $phone->imei = $request->input('imei');
        $phone->brand = $request->input('brand');
        $phone->model = $request->input('model');
        $phone->ptheft = $request->input('ptheft');
        $phone->date = $request->input('date');
        $phone->rep_image = $imageName;
        $phone->save();
        // echo($request->input('phone'));
        // echo('***********');
        // echo($request->input('imei'));
       return redirect('/lostphone')->with('status',"Your report has been successfully added. Please wait for confirmation from the admin")->with('result','success');

    }

    public function search4(Request $request)
    {
        $this->validate($request,[
            'imei' => ['required', 'integer','digits:15' ],
        ]);
        $phone = PhoneModel::where('Imei',$request->input('imei'))->where('confirm','1')->first();
        // foreach($phone as $item)
        // {
        //     echo($phone->ID);
        //     echo('*************');
        //     echo($phone->Imei);
        // }
        if(!empty($phone))
        return view('usersBlade.search',compact('phone'));
         else
         return redirect('/search')->with('status',"The phone is not in the blacklist or not reported")->with('result','success');
   


    }
}
