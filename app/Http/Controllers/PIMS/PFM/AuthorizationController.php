<?php

namespace App\Http\Controllers\PIMS\PFM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'authorization');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/pfm/authorization/list', compact('modeldatas'));
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
        $statusResponse = apiHeaders()->get($baseUrl . 'activeStatus');
        $statusDatas = $statusResponse->json();
        if ($statusResponse->status() == 200) {
            $statusData = $statusDatas['data'];
            return view('pimsUi/pfm/authorization/add', compact('statusData'));
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
        $response = apiHeaders()->Post($baseUrl . 'authorization', $datas);
        $result = $response->json();
        if ($response->status() == 200) {
            if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
                return redirect()->route('authorization.create');
            } else {
                return redirect()->route('authorization.index');
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
        $response = apiHeaders()->get(getBaseUrl() . 'authorization/' . $id);
        $datas = $response->json();
        $response1 = apiHeaders()->get(getBaseUrl() . 'activeStatus');
        $datas1 = $response1->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            $modeldata1 = $datas1['data'];
            return view('pimsUi/pfm/authorization/view', compact('modeldata','modeldata1'));
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
        $response = apiHeaders()->get(getBaseUrl() . 'authorization/' . $id);

        $datas = $response->json();
        $response1 = apiHeaders()->get(getBaseUrl() . 'activeStatus');
        $datas1 = $response1->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            $modeldatas1 = $datas1['data'];
            return view('pimsUi/pfm/authorization/edit', compact('modeldata', 'modeldatas1'));
        } else {
            dd("un authendicated");
        }
    }

    public function authorizationValidation(Request $request)
    {
        $datas = $request->all(); 
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'authorizationValidation', $datas);
        $res_data = $response->json();
        
        if ($res_data['errors'] != false) {
            $res = $res_data['errors'];
           
        }else{
           $res = false;
        }
      
        return response()->json(['error'=> $res]);
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
            $response = apiHeaders()->delete(getBaseUrl() . 'authorization/' . $id);
            $result = $response->json();
            if ($response->status() == 200) {
                return redirect()->route('authorization.index');
            }
        }
    }
}
