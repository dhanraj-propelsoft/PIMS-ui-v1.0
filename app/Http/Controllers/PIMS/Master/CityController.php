<?php

namespace App\Http\Controllers\PIMS\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'city');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/Master/city/list', compact('modeldatas'));
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
            $stateResponse = apiHeaders()->get($baseUrl . 'state');
            $stateDatas = $stateResponse->json();
            $stateData = $stateDatas['data'];
            $districtResponse = apiHeaders()->get($baseUrl . 'district');
            $districtDatas = $districtResponse->json();
            $districtData = $districtDatas['data'];
            $statusResponse = apiHeaders()->get($baseUrl . 'activeStatus');
            $statusDatas = $statusResponse->json();
            $statusData = $statusDatas['data'];
            return view('pimsUi/Master/city/add', compact('countryData', 'stateData', 'districtData', 'statusData'));
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
        $response = apiHeaders()->Post($baseUrl . 'city', $datas);
        if ($response->status() == 200) {
            if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
                return redirect()->route('city.create');
            } else {
                return redirect()->route('city.index');
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
        $response = apiHeaders()->get($baseUrl . 'city/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            $countryResponse = apiHeaders()->get($baseUrl . 'country');
            $countryDatas = $countryResponse->json();
            $countryData = $countryDatas['data'];
            $stateResponse = apiHeaders()->get($baseUrl . 'state');
            $stateDatas = $stateResponse->json();
            $stateData = $stateDatas['data'];
            $districtResponse = apiHeaders()->get($baseUrl . 'district');
            $districtDatas = $districtResponse->json();
            $districtData = $districtDatas['data'];
            $statusResponse = apiHeaders()->get($baseUrl . 'activeStatus');
            $statusDatas = $statusResponse->json();
            $statusData = $statusDatas['data'];
            return view('pimsUi/Master/city/view', compact('modeldata', 'countryData', 'stateData', 'districtData', 'statusData'));
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
        $response = apiHeaders()->get($baseUrl . 'city/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            $countryResponse = apiHeaders()->get($baseUrl . 'country');
            $countryDatas = $countryResponse->json();
            $countryData = $countryDatas['data'];
            $stateResponse = apiHeaders()->get($baseUrl . 'state');
            $stateDatas = $stateResponse->json();
            $stateData = $stateDatas['data'];
            $districtResponse = apiHeaders()->get($baseUrl . 'district');
            $districtDatas = $districtResponse->json();
            $districtData = $districtDatas['data'];
            $statusResponse = apiHeaders()->get($baseUrl . 'activeStatus');
            $statusDatas = $statusResponse->json();
            $statusData = $statusDatas['data'];
            return view('pimsUi/Master/city/edit', compact('modeldata', 'countryData', 'stateData', 'districtData', 'statusData'));
        } else {
            dd("un authendicated");
        }
    }

    public function check_city(Request $request)
    {
        $datas = $request->all(); 
        //dd($datas);
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'CityValidation', $datas);
        $res_data = $response->json();
       
        if ($res_data['data']['errors'] != false) {
            $res = $res_data['data']['errors'];
           
        }else{
           $res = false;
        }
      
        return response()->json(['error'=> $res]);
    }

    public function get_cities(Request $request)
    {
        $datas = $request->all(); 
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'getCityByDistrictId', $datas);
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
            $response = apiHeaders()->delete(getBaseUrl() . 'city/' . $id);
            if ($response->status() == 200) {
                return redirect()->route('city.index');
            }
        }
    }
}
