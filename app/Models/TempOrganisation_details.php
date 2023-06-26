<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempOrganisation_details extends Model
{
    use HasFactory;
    protected $table = 'temp_organisation_details';

    public function temp_organisation(){
        return $this->hasOne('App\Models\TempOrganisation', 'id', 'oid')->where('status','=', 1)->orderBy('id',"desc")->take(1);
    }

    public function temp_email(){
        return $this->hasMany('App\Models\TempOrganisationEmail', 'oid', 'id')->where('status','=', 1)->orderBy('id',"desc")->take(1);
    }

    
}
