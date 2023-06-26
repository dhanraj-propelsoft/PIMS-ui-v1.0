<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\BasicModels\Salutation;
use App\Models\BasicModels\BloodGroup;
use App\Models\BasicModels\Gender;
use App\Models\PersonMobile;
use App\Models\PersonDetails;
use App\Models\PersonEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('entitlement.loginMobilePage');
    }
    public function loginMobilePage()
    {

        if(Session::get('uid')){
            return redirect()->route('myAccount');
        }else{
            return view('entitlement.loginMobilePage');
        }

    }
}
