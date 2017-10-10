<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sliders = Slider::where('status','1')->latest()->get()->take(3);
        $data = [];
        foreach ($sliders as $slider){
            $data[] = $slider ;
        }
//        dd($data);
        $blog    = Blog::where(['status'=>'1','home_page_status'=>'1'])->get();
        $gallery = Gallery::where('status','=','1')->get();
        $sevices = Service::where(['status'=>'1','home_page_status'=>'1'])->get()->take(6);
        $teachers = Teacher::where('status','=','1')->get() ;

        return view('front.index')->withBlog($blog)->withGalleries($gallery)->withServices($sevices)->with('teachers',$teachers)->withSlider($data);


    }
}
