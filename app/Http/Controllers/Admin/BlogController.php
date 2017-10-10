<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogDescription;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image ;
use File;
use Symfony\Component\VarDumper\Tests\Fixtures\NotLoadableClass;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('admin.blogs.index')->with('blogs',$blogs);
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
        return view('admin.blogs.create')->with('languages',$languages);

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
            $rules['auther_name_'.$language->label] = 'required';
            $rules['title_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
            $rule['slug_'.$language->label] = 'required';
        }


        $this->validate($request,$rules);

        $blog = new Blog();
        $blog->home_page_status = $request->homepage_status;
        $blog->status = $request->status;


        //upload image to server directory to service
        $dir = public_path().'/uploads/blogs/';
        $file = $request->file('image_url') ;
        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
        $file->move($dir , $fileName);
        // resize image using intervention
        Image::make($dir . $fileName)->resize(540, 370)->save($dir.'540x370/'.$fileName);
        Image::make($dir . $fileName)->resize(80, 55)->save($dir.'80x55/'.$fileName);
        Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280/'.$fileName);
        $blog->image_url = $fileName ;
        $blog->save();

        foreach ($languages as $language){
            $blogDescription = new BlogDescription();
            $blogDescription->lang_id = $language->id;
            $blogDescription->blog_id = $blog->id;

            $blogDescription->auther_name = $request->get('auther_name_'.$language->label);
            $blogDescription->title = $request->get('title_'.$language->label);
            $blogDescription->meta_title = $request->get('meta_title_'.$language->label);
            $blogDescription->description = $request->get('description_'.$language->label);
            $blogDescription->meta_description = $request->get('meta_description_'.$language->label);
            $blogDescription->slug = $request->get('slug_'.$language->label);
            $blogDescription->save();
        }
        session()->flash('message','Blog Added successfully');
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
        $blog = Blog::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.blogs.edit')->with('blog',$blog)->with('languages',$languages);

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

            $rules['auther_name_'.$language->label] = 'required';
            $rules['title_'.$language->label] = 'required|max:255';
            $rules['slug_'.$language->label] = 'required|max:255';
            $rules['description_'.$language->label] = 'required';
            $rules['meta_title_'.$language->label] = 'required|max:255';
            $rules['meta_description_'.$language->label] = 'required|max:255';
        }


        $this->validate($request,$rules);

        $blog = Blog::find($id);
        $blog->home_page_status = $request->homepage_status;
        $blog->status = $request->status;

        if($request->hasFile('image_url')){
            //upload image to server directory to service
            $dir = public_path().'/uploads/blogs/';
            File::delete($dir . $blog->image_url);
            $file = $request->file('image_url') ;
            $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir , $fileName);
            // resize image using intervention
            Image::make($dir . $fileName)->resize(540, 370)->save($dir.'540x370/'.$fileName);
            Image::make($dir . $fileName)->resize(80, 55)->save($dir.'  80x55/'.$fileName);
            Image::make($dir . $fileName)->resize(1920, 1280)->save($dir.'1920x1280/'.$fileName);
            $blog->image_url = $fileName ;
        }

        $blog->save();


        $languages = Language::where('status','=','1')->get();
        foreach ($languages as $language){
            foreach($blog->description  as $description){
                if($description->lang_id == $language->id){
                    $description->lang_id = $language->id;
                    $description->blog_id = $blog->id;

                    $description->auther_name = $request->get('auther_name_'.$language->label);
                    $description->title = $request->get('title_'.$language->label);
                    $description->slug = $request->get('slug_'.$language->label);
                    $description->meta_title = $request->get('meta_title_'.$language->label);
                    $description->description = $request->get('description_'.$language->label);
                    $description->meta_description = $request->get('meta_description_'.$language->label);
                    $description->save();
                }
            }
        }
        session()->flash('message','Blog Updated successfully');
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
        Blog::destroy($id);
        session()->flash('message','Blog deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

        Blog::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected Blogs deleted successfully');
        return redirect()->back();
    }

}
