<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ImageSystem ;
use Image ;

class ImageSystemController extends Controller
{


    public function index(Request $request)
    {


        $images = ImageSystem::all() ;

        return view('admin.image-system.albums.show')->withImages($images);


    }



    public function create($type)
    {


        return view('admin.image-system.albums.create')->withType($type);
    }

    public function  store(Request $request)
    {

        $galleryId = $request->input('type');


        // images uploads to gallery



            if($request->hasFile('file')){
                $dir = public_path().'/uploads/galleries/types/';

                // check if gallery exist or not
                if($request->hasFile('file')){
                    $files = $request->file('file');
                    $type  = $request->get('type');
                    // looping on uploaded images
                    foreach ($files as $file) {
                        $gallery =  new ImageSystem();
                        $fileName =  str_random(6).'.'.$file->getClientOriginalExtension();
                        $file->move($dir , $fileName);
                        $gallery->image_url = $fileName ;

                        if( $type == 'accreditation'){
                            Image::make($dir . $fileName)->resize(320, 320)->save($dir . '320x320/' . $fileName);
//                            Image::make($dir . $fileName)->resize(600, 600)->save($dir . '600x600/' . $fileName);
//                            Image::make($dir . $fileName)->resize(1200, 900)->save($dir . '1200x900/' . $fileName);
                            //images type
                            $gallery->type = 'accreditation' ;
                            $gallery->save();
                        }elseif ($request->input('type') == 'small-images') {
                            Image::make($dir . $fileName)->resize(108, 122)->save($dir . '108x122/' . $fileName);
//                            Image::make($dir . $fileName)->resize(600, 600)->save($dir . '600x600/' . $fileName);
//                            Image::make($dir . $fileName)->resize(1200, 900)->save($dir . '1200x900/' . $fileName);
                            //images type
                            $gallery->type = 'small-images' ;
                            $gallery->save();
                        }


                    }
                }
                // video uploads to gallery
            }

        }






    public function delete($id)
    {
        ImageSystem::destroy($id);
        return redirect()->back();
    }


}
