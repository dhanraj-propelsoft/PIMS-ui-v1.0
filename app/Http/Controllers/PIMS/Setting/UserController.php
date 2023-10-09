<?php

namespace App\Http\Controllers\PIMS\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'user');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];

            return view('PimsUi.Setting.Users.list', compact('modeldatas'));
        } else {
            dd("un authendicated");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'getRoleMaster');
        dd($response->json());
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/Setting/Users/add', compact('modeldatas'));
        } else {
            dd("un authendicated");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'user', $datas);
        $result = $response->json();
        if ($response->status() == 200) {
            if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
                return view('pimsUi/setting/Users/add');
            } else {
                return redirect()->route('users.index');
            }
        } else {
            dd("un authendicated");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = apiHeaders()->get(getBaseUrl() . 'user/' . $id);
        $userData = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $userData['data'];
            $baseUrl = getBaseUrl();
            $response = apiHeaders()->get($baseUrl . 'getRoleMaster');
            $datas = $response->json();
            $result = $datas['data'];
            return view('pimsUi/setting/Users/view', compact('modeldatas', 'result'));
        } else {
            dd("un authendicated");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = apiHeaders()->get(getBaseUrl() . 'user/' . $id);
        $userData = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $userData['data'];
            $baseUrl = getBaseUrl();
            $response = apiHeaders()->get($baseUrl . 'getRoleMaster');
            $datas = $response->json();
            $result = $datas['data'];
            return view('pimsUi/setting/Users/edit', compact('modeldatas', 'result'));
        } else {
            dd("un authendicated");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            $baseUrl = getBaseUrl();
            $response = apiHeaders()->delete(getBaseUrl() . 'user/' . $id);
            $result = $response->json();
            if ($response->status() == 200) {
                return redirect()->route('users.index');
            }
        }
    }
    public function userAccess(Request $request)
    {
     
        $datas = $request->all(); 
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'userAccess', $datas);
        $datas = $response->json();
      
        if ($response->status() == 200) {
            $result = $datas['data'];
           
           
            if ($result['type'] == 1) {
                Session::put('token', $result['token']);
                return redirect()->route('users.index');
            } else if ($result['type'] == 2) {
                return redirect()->back()->with('error', 'Mobile or Password is Wrong');            }

        }
    }
}
