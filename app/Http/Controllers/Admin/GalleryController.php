<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryDescription;
use App\Models\Media ;
Use Image ;
use File ;
use App\Models\Language ;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galleries = Gallery::all();

        return view('admin.galleries.index')->withGalleries($galleries);
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

        return view('admin.galleries.create')->withLanguages($languages);
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
            'homepage_status' => 'required',
            'status' => 'required'
        ];
        foreach ($languages as  $language){

            $rules['name_'.$language->label] = 'required|max:255';

        }


        $this->validate($request,$rules);

        $gallery = new Gallery();
        $gallery->home_page_status = $request->homepage_status;
        $gallery->status = $request->status;

        //upload image to server directory to service
       ;



//        $service->image_url = time().$request->image_url;
        $gallery->save();

        foreach ($languages as $language){
            $galleryDescription = new GalleryDescription();
            $galleryDescription->lang_id = $language->id;
            $galleryDescription->gallery_id = $gallery->id;

            $galleryDescription->title = $request->get('name_'.$language->label);

            $galleryDescription->save();
        }
        session()->flash('message','Gallery Added successfully');
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
        $galelry = Gallery::find($id);
        $languages = Language::where('status','=','1')->get();
        return view('admin.galleries.edit')->withGallery($galelry)->withLanguages($languages);
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
            'homepage_status' => 'required',
            'status' => 'required'
        ];
        foreach ($languages as  $language){

            $rules['title_'.$language->label] = 'required|max:255';

        }


        $this->validate($request,$rules);

        $gallery = Gallery::find($id);
        $gallery->home_page_status = $request->homepage_status;
        $gallery->status = $request->status;


        $gallery->save();


        foreach ($languages as $language){
            foreach($gallery->description  as $description){

                if($description->lang_id == $language->id){


                    $description->title = $request->get('title_'.$language->label);

                    $description->save();
                }

            }

        }
        session()->flash('message','Gallery Updated successfully');
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
        Gallery::destroy($id);
        session()->flash('message','Gallery deleted successfully');
        return redirect()->back();
    }

    public function destroyAll(Request $request){

//        dd($request);

        Gallery::whereIn('id',explode(',',$request->items))->delete();
        session()->flash('message','All  selected galleries deleted successfully');
        return redirect()->back();


    }

    public function addMedia($id){
        $languages = Language::where('status','=','1')->get();
        return view('admin.galleries.albums.create')->withLanguages($languages)->withGalleryId($id);


    }


    public function postMedia(Request $request){
        $galleryId = $request->input('gallery_id');
        $gallery = Gallery::find($galleryId);

        // images uploads to gallery
        if($request->hasFile('file')){
            $dir = public_path().'/uploads/galleries/';

            // check if gallery exist or not
            if($request->hasFile('file') && count($gallery)){
                $files = $request->file('file');

                // looping on uploaded images
                foreach ($files as $file) {
                    $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
                    $file->move($dir , $fileName);
                    $image = new Media();
                    $image->gallery_id =  $galleryId ;
                    $image->image_url = $fileName ;
                    $image->type = '0' ;
                    Image::make($dir . $fileName)->resize(600, 600)->save($dir .'/admin/600x600/'. $fileName);
                    Image::make($dir . $fileName)->resize(1200, 900)->save($dir .'/admin/1200x900/'. $fileName);
                    Image::make($dir . $fileName)->resize(285, 195)->save($dir . $fileName);
                    $image->save();
                }
            }
            // video uploads to gallery
        }elseif(isset($request->video_url)){
            $video = new Media();
            $video->gallery_id = $galleryId ;
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->video_url, $match);
            $video->video_url = $match[1] ;
            $video->type = '1' ;
            $video->save() ;
            return response()->json(['success'=>"Products Deleted successfully."]);


        }

    }



    public function showAlbum($id){

        $media = Media::where('gallery_id','=',$id)->get();

        return view('admin.galleries.albums.show')->withMedia($media);


    }

    public function delete($id){

//        dd(decrypt($id));

        Media::destroy(decrypt($id));

        return redirect()->back();
    }
}
