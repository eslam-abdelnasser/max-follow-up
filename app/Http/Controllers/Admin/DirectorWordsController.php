<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DirectorWord ;
use App\Models\DirectorWordDescription ;
use App\Models\Language ;
use Image ;
class DirectorWordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDirectorWord(){


        $director = DirectorWord::updateOrCreate([

            'id'=>1
        ]);



        $languages = Language::where('status','1')->get();



        foreach($languages as $lang){

            $content =  DirectorWordDescription::updateOrCreate([

                'director_id'=>$director->id ,
                'lang_id'=>$lang->id

            ]);



        }


//        dd($who);
        return view('admin.directors-words.index' , ['director'=>$director , 'languages'=>$languages] ) ;


    }

    public function updateDirectorWord(Request $request , $id){

        $languages = Language::where('status','=','1')->get();
        foreach ($languages as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
        }


        $this->validate($request , $rules) ;


        $director = DirectorWord::find($id);

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/director-words/';
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(540, 370)->save($dir.$fileName);
            $director->image_url = $fileName ;
        }

        $director->save();


        foreach($director->description as $value){



            $value->title = $request->input('title_'.$value->language->label);
            $value->description = $request->input('description_'.$value->language->label);
            $value->meta_title = $request->input('meta_title_'.$value->language->label);
            $value->meta_description = $request->input('meta_description_'.$value->language->label);

            $value->save();

        }


        // flash a message to tell admin that article is added

        session()->flash('message','تم تحديث البيانات  بنجاح');

        return redirect()->route('admin.director-words.index');



    }
}
