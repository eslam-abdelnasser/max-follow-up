<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EducationLevel ;
use App\Models\EducationLevelDescription ;
use App\Models\ImageEducationLevel ;
use Image ;
use File ;
use App\Models\Language ;
class EducationLevelController extends Controller
{

    protected $language ;


    public function __construct()
    {
        $this->language = Language::where('status','=','1')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $education = EducationLevel::all();
        return view('admin.education-level.index')->withEducations($education);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.education-level.create')->with('languages',$this->language);
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
        $rules = [
            'status' => 'required'
        ];
        foreach ($this->language as  $language){
            $rules['school_level_'.$language->label] = 'required';
            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
            $rule['slug_'.$language->label] = 'required|unique:education-level-description,slug';
        }


        $this->validate($request,$rules);

        $education_level = new EducationLevel();
        $education_level->status = $request->status;



        $education_level->save();

        foreach ($this->language as $language){
            $educationLevelDescription = new EducationLevelDescription();
            $educationLevelDescription->lang_id = $language->id;
            $educationLevelDescription->education_level_id = $education_level->id;
            $educationLevelDescription->school_level = $request->get('school_level_'.$language->label);
            $educationLevelDescription->title = $request->get('title_'.$language->label);
            $educationLevelDescription->meta_title = $request->get('meta_title_'.$language->label);
            $educationLevelDescription->description = $request->get('description_'.$language->label);
            $educationLevelDescription->meta_description = $request->get('meta_description_'.$language->label);
            $educationLevelDescription->slug = $request->get('slug_'.$language->label);
            $educationLevelDescription->save();
        }
        session()->flash('message','Education level Added successfully');
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
        $education_level = EducationLevel::find($id);
        return view('admin.education-level.edit')->with('education_level',$education_level)->with('languages',$this->language);
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
        $rules = [
            'status' => 'required'
        ];
        foreach ($this->language  as  $language){

            $rules['school_level_'.$language->label] = 'required';
            $rules['title_'.$language->label] = 'required|max:255';
            $rules['slug_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
        }


        $this->validate($request,$rules);

        $education_level = EducationLevel::find($id);
        $education_level->status = $request->status;
        $education_level->save();


        foreach ($this->language as $language){
            foreach($education_level->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->education_level_id = $education_level->id;

                    $description->school_level = $request->get('school_level_'.$language->label);
                    $description->title = $request->get('title_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->meta_title = $request->get('meta_title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','Education level Updated successfully');
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
        EducationLevel::destroy($id);
        session()->flash('message','Education level deleted successfully');
        return redirect()->back();
    }


    public function destroyAll(Request $request){

        EducationLevel::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Education levels deleted successfully');
        return redirect()->back();
    }
}
