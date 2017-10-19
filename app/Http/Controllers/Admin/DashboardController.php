<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //


    public function index(){
//        $teachers = Teacher::all()->count();
//        $messages = ContactEmails::all()->count();
//        $laboratories = Laboratory::all()->count();
//        $activities = Activity::all()->count();
//        $news = News::all()->count();
//        $roles = AdmissionRole::all()->count();

        return view('admin.dashboard.index');
    }
}
