<?php

namespace App\Http\Controllers\version1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function userLogin($userName, $password)
    {
        Log::info('UserController > userLogin function Inside.' . json_encode($userName));
        Log::info('UserController > userLogin function Inside.' . json_encode($password));
        $response = Http::post(config('api_base') . 'userLogin', ["userName" => $userName, "password" => $password]);
        $data = $response->json();
        Log::info('PersonController > userLogin function Return.' . json_encode($data));

        if ($response->status() == 200) {
            $loginDatas = $data['data'];
            Session::put('token', $loginDatas['token']);
            if (Session::get('token')) {
                return $loginDatas;
            }
        } else {
            $error = "";
            if (isset($data['message'])) {
                $error = $data['message'];
            } else if (isset($data['errors'])) {
                $error = $data['errors'];
            }
            return $error;
        }
    }
    public function changePasswordPage()
    {
        return view("entitlement.changePassword");
    }
    public function changePassword(Request $request)
    {

        Log::info('UserController > changePassword function Inside.' . json_encode($request));

        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required',
                'passwordConfirmation' => 'required',
                'oldpassword' => 'required',
            ]);
            $oldPassword = $request->oldpassword;
            $password = $request->password;
            $passwordConfirmation = $request->passwordConfirmation;
            $uid = Session::get('uid');
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token'),
            ])->post(config('api_base') . 'changePassword', ["oldPassword"=> $oldPassword, "password" => $password, "passwordConfirmation" => $passwordConfirmation, "uid" => $uid]);
            $data = $response->json();
          
            Log::info('PersonController > changePassword function Return.' . json_encode($data));
            return $data;
        } 
    }
}
