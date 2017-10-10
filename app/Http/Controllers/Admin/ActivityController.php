<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\ActivityDescription;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image ;
use File;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = Activity::all();
        return view('admin.activities.index')->with('activities',$activities);
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
        return view('admin.activities.create')->with('languages',$languages);

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

        $activity = new Activity();
        $activity->home_page_status = $request->homepage_status;
        $activity->status = $request->status;


        //upload image to server directory to service
        $dir = public_path().'/uploads/activities/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(540, 370)->save($dir.'540x370/'.$fileName);
        Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280/'.$fileName);
        $activity->image_url = $fileName ;
        $activity->save();

        foreach ($languages as $language){
            $activityDescription = new ActivityDescription();
            $activityDescription->lang_id = $language->id;
            $activityDescription->activity_id = $activity->id;

            $activityDescription->title = $request->get('title_'.$language->label);
            $activityDescription->meta_title = $request->get('meta_title_'.$language->label);
            $activityDescription->description = $request->get('description_'.$language->label);
            $activityDescription->meta_description = $request->get('meta_description_'.$language->label);
            $activityDescription->slug = $request->get('slug_'.$language->label);
            $activityDescription->save();
        }
        session()->flash('message','Activity Added successfully');
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
        $activity = Activity::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.activities.edit')->with('activity',$activity)->with('languages',$languages);

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

        $activity = Activity::find($id);
        $activity->home_page_status = $request->homepage_status;
        $activity->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/activities/';
            File::delete($dir . $activity->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(540, 370)->save($dir.'540x370/'.$fileName);
            Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280'.$fileName);

            $activity->image_url = $fileName ;
        }

        $activity->save();


        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($activity->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->activity_id = $activity->id;

                    $description->title = $request->get('title_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->meta_title = $request->get('meta_title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','Activity Updated successfully');
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
        Activity::destroy($id);
        session()->flash('message','Activity deleted successfully');
        return redirect()->back();
    }


    public function destroyAll(Request $request){

        Activity::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Activities deleted successfully');
        return redirect()->back();
    }

}
