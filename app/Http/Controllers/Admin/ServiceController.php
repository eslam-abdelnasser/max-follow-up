<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language ;
use App\Models\Service ;
use Image ;
use File ;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('admin.services.index')->with('services',$services);
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

        return view('admin.services.create')->withLanguages($languages);
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
            'icon' => 'required',
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
            $rule['slug_'.$language->label] = 'required';
        }


        $this->validate($request,$rules);

        $service = new Service();
        $service->icon = $request->icon;
        $service->home_page_status = $request->homepage_status;
        $service->status = $request->status;

        //upload image to server directory to service
        $dir = public_path().'/uploads/services/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(540, 370)->save($dir.'540x370/'. $fileName);
        Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280/'. $fileName);
        $service->image_url = $fileName ;



//        $service->image_url = time().$request->image_url;
        $service->save();

        foreach ($languages as $language){
            $serviceDescription = new ServiceDescription();
            $serviceDescription->lang_id = $language->id;
            $serviceDescription->service_id = $service->id;

            $serviceDescription->title = $request->get('title_'.$language->label);
            $serviceDescription->slug = $request->get('slug_'.$language->label);
            $serviceDescription->description = $request->get('meta_title_'.$language->label);
            $serviceDescription->meta_title = $request->get('description_'.$language->label);
            $serviceDescription->meta_description = $request->get('meta_description_'.$language->label);
          $serviceDescription->save();
        }
        session()->flash('message','Service Added successfully');
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
//        dd($id);

        $service = Service::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.services.edit')->withService($service)->withLanguages($languages);
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
        //
        $languages = Language::where('status','=','1')->get();
        $rules = [
            'icon' => 'required',
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

        $service = Service::find($id);
        $service->icon = $request->icon;
        $service->home_page_status = $request->homepage_status;
        $service->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/services/540x370/';
            File::delete($dir . $service->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(540, 370)->save($dir. $fileName);
            $service->image_url = $fileName ;
        }

        $service->save();


        foreach ($languages as $language){
            foreach($service->description  as $description){

                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->service_id = $service->id;

                    $description->title = $request->get('title_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->description = $request->get('meta_title_'.$language->label);
                    $description->meta_title = $request->get('description_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }

            }

        }
        session()->flash('message','Service Updated successfully');
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
        Service::destroy($id);
        session()->flash('message','service deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

//        dd($request);

        Service::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected services deleted successfully');
        return redirect()->back();


    }
}
