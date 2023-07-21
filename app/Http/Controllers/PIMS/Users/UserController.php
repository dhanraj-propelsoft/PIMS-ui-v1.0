<?php

namespace App\Http\Controllers\PIMS\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userLogin(Request $request)
    {
        $datas = $request->all();
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'userLogin', $datas);
        $result = $response->json();
        if ($response->status() == 200) {
            $datas = $result['data'];
            if ($datas==1) {
                return view('home');
            } else {
                return redirect()->back()->with('message', 'Email or  Password Is Wrong');

            }

        }

    }
    public function userRegister(Request $request)
    {
        $datas = $request->all();
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'userRegister', $datas);
        $result = $response->json();
        if ($response->status() == 200) {
           return redirect()->back();
        }
    }
}
