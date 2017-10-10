<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityDescription;
use App\Models\Blog;
use App\Models\BlogDescription;
use App\Models\Career;
use App\Models\CareerDescription;
use App\Models\Laboratory;
use App\Models\LaboratoryDescription;
use App\Models\NewDescription;
use App\Models\News;
use App\Models\Service;
use App\Models\ServiceDescription;
use App\Models\Teacher;
use App\Models\TeacherDescription;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    //
    public function blog($slug){


        $blogDescription = BlogDescription::where('slug','=',$slug)->first();
        $blog = Blog::find($blogDescription->blog_id);
        return view('front.details.blog')->withBlog($blog);
    }

    public function  career($slug){
        $careerDescription = CareerDescription::where('slug','=',$slug)->first();
        $career = Career::find($careerDescription->career_id);
        return view('front.details.career')->with('career',$career);
    }
    public function  teacher($slug){
        $teacherDescription = TeacherDescription::where('slug','=',$slug)->first();
        $teacher = Teacher::find($teacherDescription->teacher_id);
        return view('front.details.teacher')->with('teacher',$teacher);
    }
    public function  news($slug){
        $newsdescription = NewDescription::where('slug','=',$slug)->first();
        $news = News::find($newsdescription->new_id);
        return view('front.details.news')->with('news',$news);
    }
    public function  activity($slug){
        $activityDescription = ActivityDescription::where('slug','=',$slug)->first();
        $activity = Activity::find($activityDescription->activity_id);
        return view('front.details.activity')->with('activity',$activity);
    }
    public function laboratory($slug)
    {
        $laboratoryDescription = LaboratoryDescription::where('slug','=',$slug)->first();
        $laboratory = Laboratory::find($laboratoryDescription->laboratory_id);
        return view('front.details.laboratory')->with('laboratory',$laboratory);
    }
    public function service($slug)
    {
        $serviceDescription = ServiceDescription::where('slug','=',$slug)->first();
        $service = Service::find($serviceDescription->service_id);
        return view('front.details.service')->with('service',$service);
    }


}
