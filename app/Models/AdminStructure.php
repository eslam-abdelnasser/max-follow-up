<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminStructure extends Model
{
    //
    protected  $table = 'admin-structure';


    public function description()
    {
        return $this->hasMany('App\Models\AdminStructureDescription','admin_structure_id');
    }
}
