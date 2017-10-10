<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Career;
use App\Models\Laboratory;
use App\Models\News;
use App\Models\Service;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Blog ;

class ListController extends Controller
{
    //

    public function blog(){
        $blog = Blog::where('status','=','1')->paginate(10);
        return view('front.list.blog')->withBlog($blog);
    }


    public function teacher(){
        $teachers = Teacher::where('status','=','1')->paginate(10);
        return view('front.list.teacher')->with('teachers',$teachers);

    }
    public function News(){
        $news = News::where('status','=','1')->paginate(10);
        return view('front.list.news')->with('news',$news);

    }
    public function laboratory(){
        $laboratories = Laboratory::where('status','=','1')->paginate(10);
        return view('front.list.laboratory')->with('laboratories',$laboratories);

    }
    public function activity(){
        $activities = Activity::where('status','=','1')->paginate(10);
        return view('front.list.activity')->with('activities',$activities);

    }
    public function  career(){
        $careers = Career::where('status','=','1')->paginate(10);
        return view('front.list.career')->with('careers',$careers);
    }

    public function  service(){
        $services = Service::where('status','=','1')->paginate(10);
        return view('front.list.service')->with('services',$services);
    }



}
