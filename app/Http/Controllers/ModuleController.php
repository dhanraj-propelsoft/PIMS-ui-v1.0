<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\PersonDetails;
use App\Models\BasicModels\Gender;
use App\Models\BasicModels\BloodGroup;
use App\Models\BasicModels\Salutation;
use App\Models\Organisation;
use App\Models\OrganisationIdentities;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ModuleController extends Controller
{

    public function user()
    {
        $bearerToken = Session::get('token');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $bearerToken
        ])->post(config('api_base') . 'get_user_data/');
        $data = $response->json();
        if (!isset($data['message'])) {
            Session::put('uid', $data['uid']);
            return $data['uid'];
        } else {
            if ($data['message'] == 'Unauthenticated.') {
                Session::put('uid', "");
                return false;
            }
        }
    }

    public function list()
    {
        $data = $this->user();
        if ($data) {
            return view("module.list", ['uid' => $data]);
        } else {
            return redirect('/login');
        }
    }
}
