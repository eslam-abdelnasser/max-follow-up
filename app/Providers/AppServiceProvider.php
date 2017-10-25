<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\GeneralSetting ;
//use App\Models\Social ;
//use App\Models\AboutUs ;
//use App\Models\Blog ;

use App\Models\ImageSystem ;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
//        $social = Social::where('status','=','1')->get();
//        $about_us = AboutUs::find(1);
        $general_setting= GeneralSetting::find(1);
        $mainImages = ImageSystem::where('type','=','small-images')->get()->take(4);
////        dd($general_setting);
//        $blog = Blog::where('status',"1")->latest()->get()->take(3);

        return view()->share(['setting'=>$general_setting ,'mainImages'=>$mainImages]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
