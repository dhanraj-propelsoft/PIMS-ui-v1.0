<?php

namespace App\Http\Controllers\PIMS\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'getRoleMaster');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/Setting/role/list', compact('modeldatas'));
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
        $response = apiHeaders()->get($baseUrl . 'roles');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/Setting/role/add', compact('modeldatas'));
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
        $response = apiHeaders()->Post($baseUrl . 'roles', $datas);
        $result = $response->json();
        if ($response->status() == 200) {
            if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
                return redirect()->route('roles.create');
            } else {
                return redirect()->route('roles.index');
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
        $response = apiHeaders()->get(getBaseUrl() . 'roles/' . $id);
        $datas = $response->json();

        if ($response->status() == 200) {
            $modeldatas = $datas['data'];

            return view('pimsUi/Setting/role/view', compact('modeldatas'));
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
        $response = apiHeaders()->get(getBaseUrl() . 'roles/' . $id);
        $datas = $response->json();

        if ($response->status() == 200) {
            $modeldatas = $datas['data'];

            return view('pimsUi/Setting/role/edit', compact('modeldatas'));
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
            $response = apiHeaders()->delete(getBaseUrl() . 'roles/' . $id);
            $datas = $response->json();
            if ($response->status() == 200) {
                $result = $datas['data'];
                if ($result['type'] == 2) {
                    return redirect()->back()->with('failed', 'This Role Using in Users');
                } elseif($result['type'] == 1) {
                    return redirect()->route('roles.index');
                }else{
                    dd("un authendicated");
                }

            }
        }
    }
}
