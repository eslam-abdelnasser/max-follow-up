<?php

namespace App\Http\Controllers;

use App\Models\AdmissionRole;
use App\Models\EducationLevel;
use App\Models\Gallery;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //

    public function index(){

        return view('front.about-us');
    }


    public function media(){
        $gallery = Gallery::where('status','=','1')->get();
        return view('front.media')->withGalleries($gallery);
    }


    public function educationLevel(){

        $levels = EducationLevel::all();
        return view('front.education-level')->with('levels',$levels);

    }


    public function   supervisor(){
        $supervisors = Supervisor::all();
        return view('front.supervisor')->with('supervisors',$supervisors);

    }


    public function admissionRoles(){
        $roles = AdmissionRole::all();
        return view('front.admission-roles')->with('roles' ,$roles);
    }
}
