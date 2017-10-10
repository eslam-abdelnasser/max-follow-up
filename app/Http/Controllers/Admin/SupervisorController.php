<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supervisors = Supervisor::paginate(10);
        return view('admin.supervisors.index')->with('supervisors',$supervisors);
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
        return view('admin.supervisors.create')->withLanguages($languages);
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

        $supervisors = Supervisor::all();
        if($supervisors){
            foreach ($supervisors as $supervisor){
                Supervisor::destroy($supervisor->id);
            }
        }

        foreach ($languages as $language){
            $supervisor = new Supervisor();
            $supervisor->lang_id = $language->id;
            $supervisor->title = $request->get('title_'.$language->label);
            $supervisor->description = $request->get('description_'.$language->label);
            $supervisor->save();
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
        $supervisor = Supervisor::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.supervisors.edit')->with('supervisor',$supervisor)->with('languages',$languages);

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
        $supervisor = Supervisor::find($id);

        $label = Language::where('id',$supervisor->lang_id)->value('label');
        $rules=[
            'title_'.$label => 'required|max:255',
            'description_'.$label => 'required'
        ];


        $this->validate($request,$rules);

        $supervisor->title = $request->get('title_'.$label);
        $supervisor->description = $request->get('description_'.$label);
        $supervisor->save();
        return redirect()->route('supervisors.index');

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

        Supervisor::destroy($id);
        session()->flash('message','Supervisor deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

        Supervisor::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Supervisors deleted successfully');
        return redirect()->back();
    }
}
