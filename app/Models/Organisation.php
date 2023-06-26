<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;
    protected $table = 'organisation';


    public function mobile(){
        return $this->hasMany('App\Models\OrganisationPhone', 'oid', 'id')->where('status','=', 1)->orderBy('status');
    }

    public function email(){
        return $this->hasMany('App\Models\OrganisationEmail', 'oid', 'id')->where('status','=', 1)->orderBy('status');
    }


    public function details(){
        return $this->hasOne('App\Models\Organisation_details', 'oid','id');
    }

    public function address(){
        return $this->hasMany('App\Models\Organisation_address', 'oid','id');
    }

    public function identities(){
        return $this->hasMany('App\Models\OrganisationIdentities', 'oid','id')->where('status','=', 1);
    }

    public function web(){
        return $this->hasOne('App\Models\OrganisationWebaddress', 'oid','id');
    }
}
