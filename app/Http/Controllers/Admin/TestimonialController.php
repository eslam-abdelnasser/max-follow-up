<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial ;
use App\Models\TestimonialDescription ;
use App\Models\Language ;
use Image ;
use File ;
class TestimonialController extends Controller
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
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index')->with('testimonials',$testimonials);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.testimonial.create')->with('languages',$this->language);
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
            $rules['name_'.$language->label] = 'required';
            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
        }


        $this->validate($request,$rules);

        $testimonial = new Testimonial();
        $testimonial->status = $request->status;


        //upload image to server directory to service
        $dir = public_path().'/uploads/testimonial/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(114, 114)->save($dir.$fileName);
        $testimonial->image_url = $fileName ;
        $testimonial->save();

        foreach ($this->language as $language){
            $testimonial_description = new TestimonialDescription();
            $testimonial_description->lang_id = $language->id;
            $testimonial_description->testimonial_id = $testimonial->id;

            $testimonial_description->name = $request->get('name_'.$language->label);
            $testimonial_description->title = $request->get('title_'.$language->label);
            $testimonial_description->description = $request->get('description_'.$language->label);
            $testimonial_description->save();
        }
        session()->flash('message','Testimonial Added successfully');
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit')->with('testimonial',$testimonial)->with('languages',$this->language);
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

            $rules['name_'.$language->label] = 'required';
            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
        }


        $this->validate($request,$rules);

        $testimonial = Testimonial::find($id);
        $testimonial->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/testimonial/';
            File::delete($dir . $testimonial->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(114, 114)->save($dir.$fileName);
            $testimonial->image_url = $fileName ;
        }

        $testimonial->save();


        foreach ($this->language as $language){
            foreach($testimonial->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->testimonial_id = $testimonial->id;
                    $description->name = $request->get('name_'.$language->label);
                    $description->title = $request->get('title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','Testimonial Updated successfully');
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
        Testimonial::destroy($id);
        session()->flash('message','Testimonial deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

        Testimonial::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Testimonials deleted successfully');
        return redirect()->back();
    }

}
