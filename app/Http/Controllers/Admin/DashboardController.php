<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\AdmissionRole;
use App\Models\ContactEmails;
use App\Models\Laboratory;
use App\Models\News;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //


    public function index(){
        $teachers = Teacher::all()->count();
        $messages = ContactEmails::all()->count();
        $laboratories = Laboratory::all()->count();
        $activities = Activity::all()->count();
        $news = News::all()->count();
        $roles = AdmissionRole::all()->count();

        return view('admin.dashboard.index')
            ->with('teachers',$teachers)
            ->with('messages',$messages)
            ->with('laboratories',$laboratories)
            ->with('activities',$activities)
            ->with('news' ,$news)
            ->with('roles',$roles);
    }
}
