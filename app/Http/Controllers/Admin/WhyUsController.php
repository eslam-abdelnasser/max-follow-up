<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WhyUs ;
use App\Models\WhyUsDescription ;
use App\Models\Language ;
class WhyUsController extends Controller
{

    protected  $language ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function  __construct()
    {
        $this->language = Language::where('status','=','1')->get();

    }


    public function index()
    {
        //

        $whyUs = WhyUs::all() ;

        return view('admin.why-us.index')->withItems($whyUs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.why-us.create')->withLanguages($this->language);
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
            'status' => 'required'
        ];
        foreach ($this->language as  $language){
            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
            $rule['slug_'.$language->label] = 'required|unique:why-us-description,slug';
        }


        $this->validate($request,$rules);

        $whyUs = new WhyUs();
        $whyUs->status = $request->status;
        //upload image to server directory to service
        $dir = public_path().'/uploads/why-us/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
//        Image::make($dir . $fileName)->resize(540, 370)->save($dir.'540x370/'.$fileName);
//        Image::make($dir . $fileName)->resize(80, 55)->save($dir.'80x55/'.$fileName);
//        Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280/'.$fileName);
        $whyUs->image_url = $fileName ;
        $whyUs->save();

        foreach ($this->language as $language){
            $whyUsDescription = new WhyUsDescription();
            $whyUsDescription->lang_id = $language->id;
            $whyUsDescription->why_id = $whyUs->id;

            $whyUsDescription->title = $request->get('title_'.$language->label);
            $whyUsDescription->meta_title = $request->get('meta_title_'.$language->label);
            $whyUsDescription->description = $request->get('description_'.$language->label);
            $whyUsDescription->meta_description = $request->get('meta_description_'.$language->label);
            $whyUsDescription->slug = $request->get('slug_'.$language->label);
            $whyUsDescription->save();
        }
        session()->flash('message','Record Added successfully');
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
        $whyUs = WhyUs::find($id);

        return view('admin.why-us.edit')->withItem($whyUs)->withLanguages($this->language);
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
        foreach ($this->language as  $language){

            $rules['title_'.$language->label] = 'required|max:255';
            $rules['slug_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
        }


        $this->validate($request,$rules);

        $whyUs = WhyUs::find($id);
        $whyUs->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/why-us/';
            File::delete($dir . $whyUs->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);

            $whyUs->image_url = $fileName ;
        }

        $whyUs->save();


        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($whyUs->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->why_id = $whyUs->id;

                    $description->title = $request->get('title_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->meta_title = $request->get('meta_title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','Record Updated successfully');
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
        WhyUs::destroy($id);
        session()->flash('message','Record deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

        WhyUs::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Records deleted successfully');
        return redirect()->back();
    }
}
