<?php

namespace App\Http\Controllers\Admin;

use App\Models\EducationLevel;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $educationlevels = EducationLevel::paginate(10);
        return view('admin.education_levels.index')->with('educationlevels',$educationlevels);
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
        return view('admin.education_levels.create')->withLanguages($languages);

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
        $rules=[];
        foreach ($languages as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
        }
        $this->validate($request,$rules);

        foreach ($languages as $language){
            $educationlevel = new EducationLevel();
            $educationlevel->lang_id = $language->id;
            $educationlevel->title = $request->get('title_'.$language->label);
            $educationlevel->description = $request->get('description_'.$language->label);
            $educationlevel->save();
        }
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
        $educationlevel = EducationLevel::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.admission_role.edit')->with('educationlevel',$educationlevel)->with('languages',$languages);

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

        $educationlevel = EducationLevel::find($id);

        $label = Language::where('id',$educationlevel->lang_id)->value('label');
        $rules=[
            'title_'.$label => 'required|max:255',
            'description_'.$label => 'required'
        ];


        $this->validate($request,$rules);

        $educationlevel->title = $request->get('title_'.$label);
        $educationlevel->description = $request->get('description_'.$label);
        $educationlevel->save();

        return redirect()->route('education_levels.index');

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
        session()->flash('message','Education Level deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

        EducationLevel::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Education Levels deleted successfully');
        return redirect()->back();
    }
}
