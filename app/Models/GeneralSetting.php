<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    //
    protected $table = 'general-setting';
    protected $fillable = ['site_url','email',
        'site_description' , 'site_keywords' ,
        'google_analytics_id' , 'google_analytics_script',
        'phone','address_ar','address_en'];

}
