<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Models\Accreditation ;
Use Image ;
use File ;
class AccreditationController extends Controller
{
    //

    public function index()
    {
        $images = Accreditation::all();

        return view('admin.accreditation.show');
    }

    public function postImage(Request $request)
    {

        


    }
}
