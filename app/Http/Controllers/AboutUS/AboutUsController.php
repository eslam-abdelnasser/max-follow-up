<?php

namespace App\Http\Controllers\AboutUS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AboutUs ;
use App\Models\WhyUs ;
use App\Models\AdminStructure ;
use App\Models\BoardTrustees ;
use App\Models\ImageSystem ;
class AboutUsController extends Controller
{
    //
    public function index()
    {
        $about = AboutUs::find(1);

        return view('front.about-us')->withAboutUs($about);
    }


    public function adminStructure()
    {

        $admin_structure = AdminStructure::where('status','=','1')->get();
//        dd($admin_structure);
        return view('front.about-us.amin-structure')->withAdminStructure($admin_structure);
    }

    public function whyUS(){


        $why = WhyUs::where('status','=','1')->get()->take(6);
//        dd($why);
        return view('front.about-us.why-us')->withWhy($why);
    }

    public function boardTrustees()
    {
        $admin_structure = BoardTrustees::where('status','=','1')->get();
//        dd($admin_structure);
        return view('front.about-us.board-trustees')->withAdminStructure($admin_structure);
    }


    public function accreditation()
    {

        $images = ImageSystem::where('type','=','accreditation')->get();
//        dd($images);/
        return view('front.about-us.accreditation')->withImages($images);
    }
}
