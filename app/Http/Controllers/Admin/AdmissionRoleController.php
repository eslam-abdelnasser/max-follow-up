<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdmissionRole;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmissionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admissionroles = AdmissionRole::paginate(10);
        return view('admin.admission_roles.index')->with('admissionroles',$admissionroles);
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
        return view('admin.admission_roles.create')->withLanguages($languages);
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
            $admissionrole = new AdmissionRole();
            $admissionrole->lang_id = $language->id;
            $admissionrole->title = $request->get('title_'.$language->label);
            $admissionrole->description = $request->get('description_'.$language->label);
            $admissionrole->save();
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
        $admissionrole = AdmissionRole::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.admission_role.edit')->with('admissionrole',$admissionrole)->with('languages',$languages);

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

        $admissionrole = AdmissionRole::find($id);

        $label = Language::where('id',$admissionrole->lang_id)->value('label');
        $rules=[
            'title_'.$label => 'required|max:255',
            'description_'.$label => 'required'
        ];


        $this->validate($request,$rules);

        $admissionrole->title = $request->get('title_'.$label);
        $admissionrole->description = $request->get('description_'.$label);
        $admissionrole->save();

        return redirect()->route('admission_role.index');

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
        AdmissionRole::destroy($id);
        session()->flash('message','Admission Roles deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

        AdmissionRole::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Admission Roles deleted successfully');
        return redirect()->back();
    }
}
