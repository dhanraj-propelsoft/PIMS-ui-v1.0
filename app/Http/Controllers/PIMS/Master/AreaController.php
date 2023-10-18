<?php

namespace App\Http\Controllers\PIMS\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'area');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/Master/area/list', compact('modeldatas'));
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
            return view('pimsUi/Master/area/add', compact('countryData', 'statusData'));
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
        $response = apiHeaders()->Post($baseUrl . 'area', $datas);
        if ($response->status() == 200) {
            if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
                return redirect()->route('area.create');
            } else {
                return redirect()->route('area.index');
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
        $response = apiHeaders()->get($baseUrl . 'area/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            return view('pimsUi/Master/area/view', compact('modeldata'));
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
        $response = apiHeaders()->get(getBaseUrl() . 'area/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            $data1['countryId'] =  $modeldata['countryId'];
            $stateResponse = apiHeaders()->Post($baseUrl . 'getStateByCountryId', $data1);
            $stateDatas = $stateResponse->json();
            $stateData = $stateDatas['data'];
            $data2['stateId'] =  $modeldata['stateId'];
            $districtResponse = apiHeaders()->Post($baseUrl . 'getDistrictByStateId', $data2);
            $districtDatas = $districtResponse->json();
            $districtData = $districtDatas['data'];
            $data3['districtId'] =  $modeldata['districtId'];
            $cityResponse = apiHeaders()->Post($baseUrl . 'getCityByDistrictId', $data3);
            $cityDatas = $cityResponse->json();
            $cityData = $cityDatas['data'];
            return view('pimsUi/Master/area/edit', compact('modeldata', 'stateData', 'districtData', 'cityData'));
        } else {
            dd("un authendicated");
        }
    }

    public function areaValidation(Request $request)
    {
        $datas = $request->all(); 
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'areaValidation', $datas);
        $res_data = $response->json();
        if ($res_data['data']['errors'] != false) {
            $res = $res_data['data']['errors'];
           
        }else{
           $res = false;
        }
      
        return response()->json(['error'=> $res]);
    }

    public function get_areas(Request $request)
    {
        $datas = $request->all(); 
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'getAreaByCityId', $datas);
        $res_data = $response->json();
        return json_encode($res_data['data']);
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
            $response = apiHeaders()->delete(getBaseUrl() . 'area/' . $id);
            if ($response->status() == 200) {
                return redirect()->route('area.index');
            }
        }
    }
}
