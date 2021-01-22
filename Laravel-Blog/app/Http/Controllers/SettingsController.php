<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __constructor()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.setting')->with('setting',Setting::first());
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'site_name' => 'required',
            'contact_name' => 'required',
            'contact_email' => 'required',
            'contact_address' => 'required'
        ]);
        $setting  = Setting::find($id);
        $setting->site_name = $request->site_name;
        $setting->contact_email = $request->contact_email;
        $setting->contact_name = $request->contact_name;
        $setting->contact_address = $request->contact_address;
        $setting->save();
        session()->flash('success_message','Setting successfully updated');
        return redirect(route('setting'));
    }
}
