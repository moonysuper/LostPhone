<?php

namespace App\Http\Controllers;

use App\Models\PhoneModel;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admindashborad');
    }
    public function user()
    {   
        $user = User::all();
        return view('admin.adminusers',compact('user'));
    }
    public function delete_User($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('status',"Users Deleted ")->with('result','success');
    }
    public function getreport()
    {
        $report = PhoneModel::all();
        return view('admin.adminreportview',compact('report'));
    }
    public function delete_report($id)
    {
        if(PhoneModel::where('ID' ,$id)->delete())
        return redirect('/report')->with('status',"Report Deleted ")->with('result','success');
    }
    public function update_report($id,Request $request)
    {
  
        if(PhoneModel::where('ID' ,$id)->update(['confirm'=> 1]))
      return redirect('/report')->with('status',"Report Confirm ")->with('result','success');

    }
}
