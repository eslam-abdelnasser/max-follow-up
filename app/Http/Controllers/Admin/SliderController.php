<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider ;
use File ;
use App\Models\Languages;
use App\Models\SliderDescription;
use Image ;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = Slider::all();

        return view('admin.slider.index' , ['sliders'=>$sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $languages = Language::where('status','1')->get();
        return view('admin.slider.create')->withLanguages($languages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $slider_caption  = $request->slider_url ;
        $slider_status   = $request->status  ;


        $slider = new Slider ;

        $slider->slider_url = $slider_caption ;
        $slider->status = $slider_status ;

        if($request->hasFile('slider_image')){

            $dir = public_path().'/uploads/slider/';

            $file = $request->file('slider_image');
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);

            Image::make($dir . $fileName)->resize(1920, 743)->save($dir.'1920x743/'.$fileName);
            $slider->slider_image = $fileName ;
        }

        $slider->save();

        $languages = Language::where('status','1')->get();
        foreach ($languages as $language){
            SliderDescription::create([
                'title_first'=>$request->input('title_first_'.$language->label),
                'title_second'=>$request->input('title_second_'.$language->label),
                'description' => $request->input('description_'.$language->label),
                'lang_id' => $language->id ,
                'slider_id' => $slider->id,

            ]);
        }

        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $languages = Language::where('status','1')->get();
        $slider = Slider::find($id);
        return view('admin.slider.edit' , ['slider'=>$slider,'languages'=> $languages]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $slider = Slider::find($id);
        $languages = Language::where('status' , '1')->get();
        $slider->slider_url  = $request->slider_url ;

        $slider->status   = $request->status  ;

        if($request->hasFile('slider_image')){

            $old_file_name = $slider->slider_image ;
            $oldFilePath = public_path('uploads/slider/'.$old_file_name);
            File::delete($oldFilePath);


            // new coming file

            $dir = public_path().'/uploads/slider/';

            $file = $request->file('slider_image');
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            Image::make($dir . $fileName)->resize(1920, 743)->save($dir .'image/'. $fileName);
            $slider->slider_image = $fileName ;


        }

        $slider->save();


        foreach($languages as $language){
            foreach($slider->description as $description){
//
                if($description->lang_id == $language->id){
                    $description->title_first = $request->input('title_first_'.$language->label);
                    $description->title_second = $request->input('title_second_'.$language->label);
                    $description->description = $request->input('description_'.$language->label);


                    $description->save();
                }
            }
        }

        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $slider_image = Slider::find($id);
        $old_file_name = $slider_image->slider_image ;
        $oldFilePath = public_path('uploads/slider/'.$old_file_name);
        File::delete($oldFilePath);
        $slider_image->delete();
        return back();
    }
}
