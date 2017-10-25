<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminStructure ;
use App\Models\AdminStructureDescription ;
use App\Models\Language ;
use Image ;
class AdminStructureController extends Controller
{

    public function __construct()
    {
        $this->languages =  Language::where('status','=','1')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $team =  AdminStructure::all();
        return view('admin.admin-structure.index')->withTeam($team);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admin-structure.create')->withLanguages($this->languages);
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
            'image_url' => 'required',
            'status' => 'required',
            'email' => 'email|required',
            'years' => 'required|integer'
        ];

        foreach ($this->languages as  $language){
            $rules['teacher_name_'.$language->label] = 'required';
            $rules['job_title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['degree_'.$language->label] = 'required|max:255';
            $rules['university_'.$language->label] = 'required|max:255';
            $rule['work_as_'.$language->label] = 'required';
        }

        $this->validate($request,$rules);

        $team = new AdminStructure();
        $team->facebook_url = $request->facebook_url ;
        $team->tweeter_url  = $request->tweeter_url ;
        $team->google_plus_url = $request->google_url ;
        $team->email = $request->email ;
        $team->years = $request->years ;
        $team->status = $request->status ;

        //upload image to server directory to service
        $dir = public_path().'/uploads/admin-structure/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(263, 349)->save($dir.'263x349/'.$fileName);
        Image::make($dir . $fileName)->resize(337, 335)->save($dir.'337x335/'.$fileName);
        $team->image_url = $fileName ;
        $team->save();


        foreach ($this->languages as $language){
            $teamDescripiton = new AdminStructureDescription();
            $teamDescripiton->lang_id = $language->id;
            $teamDescripiton->admin_structure_id = $team->id;
            $teamDescripiton->name = $request->get('teacher_name_'.$language->label);
            $teamDescripiton->job_title = $request->get('job_title_'.$language->label);
            $teamDescripiton->description = $request->get('description_'.$language->label);
            $teamDescripiton->degree = $request->get('degree_'.$language->label);
            $teamDescripiton->university = $request->get('university_'.$language->label);
            $teamDescripiton->work_as = $request->get('work_as_'.$language->label);
            $teamDescripiton->save();
        }

        session()->flash('message','Team added successfully');

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
        $team = AdminStructure::find($id);

//        dd($team);
        return view('admin.admin-structure.edit')->withLanguages($this->languages)->withTeam($team);
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
        foreach ($this->languages as  $language){

            $rules['teacher_name_'.$language->label] = 'required';
            $rules['job_title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['degree_'.$language->label] = 'required|max:255';
            $rules['university_'.$language->label] = 'required|max:255';
            $rule['work_as_'.$language->label] = 'required';
        }


        $this->validate($request,$rules);

        $team = AdminStructure::find($id);
        $team->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/admin-structure/';
            File::delete($dir . $team->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(263, 349)->save($dir.'263x349/'.$fileName);
            Image::make($dir . $fileName)->resize(337, 335)->save($dir.'337x335/'.$fileName);

            $team->image_url = $fileName ;
        }

        $team->save();


        foreach ($this->languages as $language){
            foreach($team->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->team_id = $team->id;
                    $description->name = $request->get('teacher_name_'.$language->label);
                    $description->job_title = $request->get('job_title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->degree = $request->get('degree_'.$language->label);
                    $description->university = $request->get('university_'.$language->label);
                    $description->work_as = $request->get('work_as_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','Team Updated successfully');
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
        AdminStructure::destroy($id);
        session()->flash('message','Teacher deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

        AdminStructure::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Teachers deleted successfully');
        return redirect()->back();
    }


}
