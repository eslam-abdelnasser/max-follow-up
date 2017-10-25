<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language ;
use App\Models\AboutUs ;
use App\Models\AboutUsDescription ;

use Image ;
class AboutUsController extends Controller
{
    //
    public function getAboutUs(){


        $about = AboutUs::updateOrCreate([

            'id'=>1
        ]);



        $languages = Language::where('status','1')->get();



        foreach($languages as $lang){

            $content =  AboutUsDescription::updateOrCreate([

                'about_id'=>$about->id ,
                'lang_id'=>$lang->id

            ]);



        }

//        dd($about);

        return view('admin.about.index' , ['about'=>$about , 'languages'=>$languages] ) ;


    }

    public function updateAboutUs(Request $request , $id){

        $languages = Language::where('status','=','1')->get();
        foreach ($languages as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
        }


        $this->validate($request , $rules) ;


        $about = AboutUs::find($id);


        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/about-us/';
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(575, 681)->save($dir.$fileName);
            $about->image_url = $fileName ;
        }


        $about->save() ;
        foreach($about->description as $value){



            $value->title = $request->input('title_'.$value->language->label);
            $value->description = $request->input('description_'.$value->language->label);
            $value->meta_title = $request->input('meta_title_'.$value->language->label);
            $value->meta_description = $request->input('meta_description_'.$value->language->label);

            $value->save();

        }


        // flash a message to tell admin that article is added

        session()->flash('message','تم تحديث البيانات  بنجاح');

        return redirect()->route('admin.about.index');



    }
}
