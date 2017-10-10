<?php

namespace App\Http\Controllers\Admin;

use App\Models\Career;
use App\Models\CareerDescription;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Http\Controllers\Controller;
use Image ;
use File;
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $careers = Career::all();
        return view('admin.careers.index')->with('careers',$careers);
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
        return view('admin.careers.create')->with('languages',$languages);
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

        $career = new Career();
        $career->status = $request->status;
        $career->save();

        foreach ($languages as $language){
            $careerDescription = new CareerDescription();
            $careerDescription->lang_id = $language->id;
            $careerDescription->career_id = $career->id;

            $careerDescription->title = $request->get('title_'.$language->label);
            $careerDescription->description = $request->get('description_'.$language->label);
            $careerDescription->meta_title = $request->get('meta_title_'.$language->label);
            $careerDescription->meta_description = $request->get('meta_description_'.$language->label);
            $careerDescription->slug = $request->get('slug_'.$language->label);
            $careerDescription->save();
        }
        session()->flash('message','Career Added successfully');
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
        $career = Career::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.careers.edit')->with('career',$career)->with('languages',$languages);
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
            'status' => 'required'
        ];
        foreach ($languages as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['slug_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_description_'.$language->label] = 'required|max:255';
        }


        $this->validate($request,$rules);

        $career = Career::find($id);
        $career->status = $request->status;
        $career->save();


        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($career->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->career_id = $career->id;

                    $description->title = $request->get('title_'.$language->label);
                    $description->meta_title = $request->get('meta_title_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','Career Updated successfully');
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
        Career::destroy($id);
        session()->flash('message','Career deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

        Career::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Careers deleted successfully');
        return redirect()->back();
    }
}
