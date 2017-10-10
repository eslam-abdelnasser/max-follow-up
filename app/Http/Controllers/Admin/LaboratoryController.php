<?php

namespace App\Http\Controllers\Admin;

use App\Models\Laboratory;
use App\Models\LaboratoryDescription;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image ;
use File;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $laboratories = Laboratory::all();
        return view('admin.laboratories.index')->with('laboratories',$laboratories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $languages = Language::where('status','=','1')->get();
        return view('admin.laboratories.create')->with('languages',$languages);

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

        $languages = Language::where('status','=','1')->get();
        $rules = [
            'image_url' => 'required',
            'homepage_status' => 'required',
            'status' => 'required'
        ];
        foreach ($languages as  $language){
            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
            $rule['slug_'.$language->label] = 'required';
        }


        $this->validate($request,$rules);

        $laboratory = new Laboratory();
        $laboratory->home_page_status = $request->homepage_status;
        $laboratory->status = $request->status;


        //upload image to server directory to service
        $dir = public_path().'/uploads/laboratories/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(540, 370)->save($dir.'540x370/'.$fileName);
        Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280/'.$fileName);
        $laboratory->image_url = $fileName ;
        $laboratory->save();

        foreach ($languages as $language){
            $laboratoryDescription = new LaboratoryDescription();
            $laboratoryDescription->lang_id = $language->id;
            $laboratoryDescription->laboratory_id= $laboratory->id;

            $laboratoryDescription->title = $request->get('title_'.$language->label);
            $laboratoryDescription->meta_title = $request->get('meta_title_'.$language->label);
            $laboratoryDescription->description = $request->get('description_'.$language->label);
            $laboratoryDescription->meta_description = $request->get('meta_description_'.$language->label);
            $laboratoryDescription->slug = $request->get('slug_'.$language->label);
            $laboratoryDescription->save();
        }
        session()->flash('message','Laboratory Added successfully');
        return redirect()->back();

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
        $laboratory= Laboratory::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.laboratories.edit')->with('laboratory',$laboratory)->with('languages',$languages);

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
        $languages = Language::where('status','=','1')->get();
        $rules = [
            'image_url' => 'required',
            'homepage_status' => 'required',
            'status' => 'required'
        ];
        foreach ($languages as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['slug_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
        }


        $this->validate($request,$rules);

        $laboratory = Laboratory::find($id);
        $laboratory->home_page_status = $request->homepage_status;
        $laboratory->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/laboratories/';
            File::delete($dir . $laboratory->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(540, 370)->save($dir.'540x370/'.$fileName);
            Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280/'.$fileName);

            $laboratory->image_url = $fileName ;
        }

        $laboratory->save();


        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($laboratory->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->laboratory_id = $laboratory->id;

                    $description->title = $request->get('title_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->meta_title = $request->get('meta_title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','Laboratory Updated successfully');
        return redirect()->back();

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
        Laboratory::destroy($id);
        session()->flash('message','laboratory deleted successfully');
        return redirect()->back();
    }


    public function destroyAll(Request $request){

        Laboratory::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Laboratories deleted successfully');
        return redirect()->back();
    }

}
