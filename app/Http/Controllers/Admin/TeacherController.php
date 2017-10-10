<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Teacher;
use App\Models\TeacherDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image ;
use File ;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = Teacher::all();
        return view('admin.teachers.index')->with('teachers',$teachers);
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
        return view('admin.teachers.create')->withLanguages($languages);
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
            'status' => 'required',
        ];
        foreach ($languages as  $language){
            $rules['name_'.$language->label] = 'required|max:255';
            $rules['job_title_'.$language->label] = 'required|max:255';
        }


        $this->validate($request,$rules);

        $teacher = new Teacher();
        $teacher->status = $request->status;

        //upload image to server directory to service
        $dir = public_path().'/uploads/teachers/275x370/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(275, 370)->save($dir. $fileName);
        $teacher->image_url = $fileName ;



        $teacher->save();

        foreach ($languages as $language){
            $teacherDescription = new TeacherDescription();
            $teacherDescription->lang_id = $language->id;
            $teacherDescription->teacher_id = $teacher->id;

            $teacherDescription->name = $request->get('name_'.$language->label);
            $teacherDescription->job_title = $request->get('job_title_'.$language->label);

            $teacherDescription->save();
        }
        session()->flash('message','Teacher Added successfully');
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
        $teacher = Teacher::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.teachers.edit')->with('teacher',$teacher)->withLanguages($languages);
        //
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

            $rules['name_'.$language->label] = 'required|max:255';
            $rules['job_title_'.$language->label] = 'required|max:255';

        }


        $this->validate($request,$rules);

        $teacher = Teacher::find($id);
        $teacher->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/teachers/275x370/';
            File::delete($dir . $teacher->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(540, 370)->save($dir.$fileName);
//            Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280/'.$fileName);
            $teacher->image_url = $fileName ;
        }

        $teacher->save();


        foreach ($languages as $language){
            foreach($teacher->description  as $description){

                if($description->lang_id == $language->id){
                    $description->name = $request->get('name_'.$language->label);
                    $description->job_title = $request->get('job_title_'.$language->label);
                    $description->save();
                }

            }

        }
        session()->flash('message','Teacher Updated successfully');
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
        Teacher::destroy($id);
        session()->flash('message','Teacher deleted successfully');
        return redirect()->back();
    }


    public function destroyAll(Request $request){

//        dd($request);

        Teacher::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Teachers deleted successfully');
        return redirect()->back();


    }
}
