<?php

namespace App\Http\Controllers\PIMS\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'state');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/Master/state/list', compact('modeldatas'));
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
        $countryResponse = apiHeaders()->get($baseUrl . 'country');
        $countryDatas = $countryResponse->json();
        if ($countryResponse->status() == 200) {
            $countryData = $countryDatas['data'];
            $statusResponse = apiHeaders()->get($baseUrl . 'activeStatus');
            $statusDatas = $statusResponse->json();
            $statusData = $statusDatas['data'];
            return view('pimsUi/Master/state/add', compact('countryData','statusData'));
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
        $response = apiHeaders()->Post($baseUrl . 'state', $datas);
        
        if ($response->status() == 200) {
            if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
                return redirect()->route('state.create');
            } else {
                return redirect()->route('state.index');
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
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'state/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            return view('pimsUi/Master/state/view', compact('modeldata'));
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
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'state/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            return view('pimsUi/Master/state/edit', compact('modeldata'));
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

    public function stateValidation(Request $request)
    {
        $datas = $request->all(); 
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'stateValidation', $datas);
        $res_data = $response->json();
        
        if ($res_data['data']['errors'] != false) {
            $res = $res_data['data']['errors'];
           
        }else{
           $res = false;
        }
      
        return response()->json(['error'=> $res]);
    }

    public function get_states(Request $request)
    {
        $datas = $request->all(); 
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'getStateByCountryId', $datas);
        $res_data = $response->json();
        return json_encode($res_data['data']);
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
            $response = apiHeaders()->delete(getBaseUrl() . 'state/' . $id);
            $datas = $response->json();
            if ($response->status() == 200) {
                $result = $datas['data'];
                if ($result['type'] == 2) {
                    return redirect()->back()->with('failed', 'This State Used in City');
                } elseif($result['type'] == 1) {
                    return redirect()->route('state.index');
                }else{
                    dd("un authendicated");
                }
            }
        }
    }
}
