<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    public function description(){

        return $this->hasMany('App\Models\TeacherDescription','teacher_id');
    }

//    public function clinic(){
//        return $this->belongsTo('App\Models\Clinic','clinic_id');
//    }
}
