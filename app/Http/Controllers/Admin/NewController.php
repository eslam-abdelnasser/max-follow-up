<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\NewDescription;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image ;
use File;
class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = News::all();
        return view('admin.news.index')->with('news',$news);
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
        return view('admin.news.create')->with('languages',$languages);

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

        $news = new News();
        $news->home_page_status = $request->homepage_status;
        $news->status = $request->status;


        //upload image to server directory to service
        $dir = public_path().'/uploads/news/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(540, 370)->save($dir.'540x370/'.$fileName);
        Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280/'.$fileName);
        $news->image_url = $fileName ;
        $news->save();

        foreach ($languages as $language){
            $newsDescription = new NewDescription();
            $newsDescription ->lang_id = $language->id;
            $newsDescription ->new_id= $news->id;

            $newsDescription ->title = $request->get('title_'.$language->label);
            $newsDescription ->meta_title = $request->get('meta_title_'.$language->label);
            $newsDescription ->description = $request->get('description_'.$language->label);
            $newsDescription ->meta_description = $request->get('meta_description_'.$language->label);
            $newsDescription ->slug = $request->get('slug_'.$language->label);
            $newsDescription ->save();
        }
        session()->flash('message','News Added successfully');
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
        $languages = Language::where('status','=','1')->get();
        return view('admin.news.edit')->with('news',$news)->with('languages',$languages);

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

        $news = News::find($id);
        $news->home_page_status = $request->homepage_status;
        $news->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/news/540x370/';
            File::delete($dir . $news->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(540, 370)->save($dir.$fileName);
//            Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280'.$fileName);

            $news->image_url = $fileName ;
        }

        $news->save();


        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($news->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->new_id = $news->id;

                    $description->title = $request->get('title_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->meta_title = $request->get('meta_title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','News Updated successfully');
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
        session()->flash('message','Activity deleted successfully');
        return redirect()->back();
    }


    public function destroyAll(Request $request){

        News::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Activities deleted successfully');
        return redirect()->back();
    }

}
