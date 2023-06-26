<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\PersonDetails;
use App\Models\BasicModels\Gender;
use App\Models\BasicModels\BloodGroup;
use App\Models\BasicModels\Salutation;
use App\Models\City;
use App\Models\Organisation;
use App\Models\OrganisationIdentities;
use App\Models\TempOrganisation;
use App\Models\TempOrganisationEmail;
use App\Models\TempOrganisation_address;
use App\Models\TempOrganisation_details;
use App\Models\TempOrganisationAdmin;
use App\Models\Ciy;
use App\Models\State;
use App\Models\Address_of;
use App\Models\PersonAddress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    function check(Request $request)
    {

        //validation
        $request->validate([
            'username' => 'required|exists:admins,email',
            'password' => 'required|min:5|max:30',
        ], [
            'username.exists' => 'Incorrect username'
        ]);

        if ($this->attemptLogin($request)) {
            return $this->successfulLogin($request);
        }
        return $this->failedLogin($request);
    }

    protected function attemptLogin(Request $request)
    {
        //Try with email AND username fields
        if (
            Auth::guard('admin')->attempt([
                'mobile' => $request['username'],
                'password' => $request['password']
            ], $request->has('remember'))
            || Auth::guard('admin')->attempt([
                'email' => $request['username'],
                'password' => $request['password']
            ], $request->has('remember'))
        ) {
            return true;
        }
        return false;
    }

    protected function successfulLogin(Request $request)
    {
        // return redirect()->route('/home');
        return redirect()->route('admin.home');
    }

    protected function failedLogin(Request $request)
    {
        return redirect()->back()->withErrors(['password' => 'Incorrect password']);
    }

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







    public function set_password(Request $request)
    {
        $data = $this->user();
        if ($data) {
            if ($request->isMethod('post')) {

                $this->validate($request, [
                    'password' => 'required|confirmed|min:6',
                ]);

                $password = $request->password;
                $password_confirmation = $request->password_confirmation;
                $uid = $data;
                $response = Http::post(config('api_base') . 'update_password', ["password" => $password, "password_confirmation" => $password_confirmation, "uid" => $uid]);
                $data = $response->json();
                // echo "<pre>";
                // print_r($response->status());
                // die();
                if ($response->status() == 200) {
                    if ($data['param']) {
                        $params = $data['param'];
                    } else {
                        $params = "";
                    }
                    return view("admin.change_password", ['uid' => $data, 'success' => 'Password Updated Successfuly']);
                } else {
                    $error = "";
                    if (isset($data['message'])) {
                        $error = $data['message'];
                    } else if (isset($data['errors'])) {
                        $error = $data['errors'];
                    }
                    return view("admin.change_password", ['uid' => $data, 'err' => $error]);
                }
            } else {
                return view("admin.change_password", ['uid' => $data]);
            }
        } else {
            return redirect('/login');
        }
    }
    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
