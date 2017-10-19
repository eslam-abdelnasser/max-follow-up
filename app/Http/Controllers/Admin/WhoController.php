<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Who ;
use App\Models\WhoDescription ;
use App\Models\Language ;
use Image ;
class WhoController extends Controller
{
    //
    public function getWho(){


        $who = Who::updateOrCreate([

            'id'=>1
        ]);



        $languages = Language::where('status','1')->get();



        foreach($languages as $lang){

            $content =  WhoDescription::updateOrCreate([

                'who_id'=>$who->id ,
                'lang_id'=>$lang->id

            ]);



        }


//        dd($who);
        return view('admin.who.index' , ['who'=>$who , 'languages'=>$languages] ) ;


    }

    public function updateWho(Request $request , $id){

        $languages = Language::where('status','=','1')->get();
        foreach ($languages as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
        }


        $this->validate($request , $rules) ;


        $who = Who::find($id);

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/who/';
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(540, 370)->save($dir.$fileName);
            $who->image_url = $fileName ;
        }

        $who->save();


        foreach($who->description as $value){



            $value->title = $request->input('title_'.$value->language->label);
            $value->description = $request->input('description_'.$value->language->label);
            $value->meta_title = $request->input('meta_title_'.$value->language->label);
            $value->meta_description = $request->input('meta_description_'.$value->language->label);

            $value->save();

        }


        // flash a message to tell admin that article is added

        session()->flash('message','تم تحديث البيانات  بنجاح');

        return redirect()->route('admin.who.index');



    }
}
