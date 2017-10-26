<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News ;
use App\Models\NewsDescription ;
use Image ;
use File ;
use App\Models\Language ;
class NewsController extends Controller
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
        $new = News::all();
        return view('admin.news.index')->withNews($new);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.news.create')->with('languages',$this->language);
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
            $rule['slug_'.$language->label] = 'required|unique:news-description,slug';
        }


        $this->validate($request,$rules);

        $news = new News();
        $news->status = $request->status;


        //upload image to server directory to service
        $dir = public_path().'/uploads/news/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(790, 433)->save($dir.'790x433/'.$fileName);
        Image::make($dir . $fileName)->resize(1079, 646)->save($dir.'1079x646/'.$fileName);
        $news->image_url = $fileName ;
        $news->save();

        foreach ($this->language as $language){
            $blogDescription = new NewsDescription();
            $blogDescription->lang_id = $language->id;
            $blogDescription->news_id = $news->id;

            $blogDescription->title = $request->get('title_'.$language->label);
            $blogDescription->meta_title = $request->get('meta_title_'.$language->label);
            $blogDescription->description = $request->get('description_'.$language->label);
            $blogDescription->meta_description = $request->get('meta_description_'.$language->label);
            $blogDescription->slug = $request->get('slug_'.$language->label);
            $blogDescription->save();
        }
        session()->flash('message','New Added successfully');
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
        $news = News::find($id);
        return view('admin.news.edit')->with('new', $news)->with('languages',$this->language);
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

        $news = News::find($id);
        $news->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/news/';
            File::delete($dir.'790x433/' . $news->image_url);
            File::delete($dir.'1079x646/' . $news->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(790, 433)->save($dir.'790x433/'.$fileName);
            Image::make($dir . $fileName)->resize(1079, 646)->save($dir.'1079x646/'.$fileName);
            $news->image_url = $fileName ;
        }

        $news->save();


        foreach ($this->language as $language){
            foreach($news->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->news_id = $news->id;
                    $description->title = $request->get('title_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->meta_title = $request->get('meta_title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','New Updated successfully');
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
        News::destroy($id);
        session()->flash('message','New deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

        News::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected News deleted successfully');
        return redirect()->back();
    }


    public function showImages($id)
    {

    }

    public function storeImage()
    {

    }

    public function deleteImage($id)
    {

    }

    public function createImage($id)
    {

    }
}
