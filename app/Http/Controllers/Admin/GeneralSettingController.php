<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting ;
class GeneralSettingController extends Controller
{
    //
    public function index(){


        $setting = GeneralSetting::updateOrCreate([
            'id'=>1 ,

        ]);

        return view('admin.general_setting.index')->withGeneral($setting);
    }

    public function update(Request $request , $id){


        $rules = [


            'site_url'=>'required',
            'email'=>'required',
            'site_description'=>'required',
            'phone' => 'required',
            'address_ar'=> 'required',
            'address_en'=> 'required',

        ];

        $this->validate($request , $rules ) ;

        $setting = GeneralSetting::find($id);


        $setting->update(
                ['site_url' => $request->site_url ,
                    'email'=> $request->email ,
                    'site_description'=> $request->site_description ,
                    'site_keywords'=> $request->site_keywords ,
                    'google_analytics_id'=> $request->google_analytics_id ,
                    'google_analytics_script'=> $request->google_analytics_script ,
                    'phone'=> $request->phone ,
                    'address_ar' => $request->address_ar,
                    'address_en' => $request->address_en
                ]);

            session()->flash('message','general setting updating successfully');

        return back();

    }
}
