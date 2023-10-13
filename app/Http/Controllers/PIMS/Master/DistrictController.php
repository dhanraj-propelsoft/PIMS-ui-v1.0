<?php

namespace App\Http\Controllers\PIMS\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'district');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/Master/district/list', compact('modeldatas'));
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
            $statusResponse = apiHeaders()->get($baseUrl . 'activeStatus');
            $statusDatas = $statusResponse->json();
            $statusData = $statusDatas['data'];
            return view('pimsUi/Master/district/add', compact('countryData', 'stateData', 'statusData'));
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
        $response = apiHeaders()->Post($baseUrl . 'district', $datas);
        if ($response->status() == 200) {
            if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
                return redirect()->route('district.create');
            } else {
                return redirect()->route('district.index');
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
        $response = apiHeaders()->get($baseUrl . 'district/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            $countryResponse = apiHeaders()->get($baseUrl . 'country');
            $countryDatas = $countryResponse->json();
            $countryData = $countryDatas['data'];
            $stateResponse = apiHeaders()->get($baseUrl . 'state');
            $stateDatas = $stateResponse->json();
            $stateData = $stateDatas['data'];
            $statusResponse = apiHeaders()->get($baseUrl . 'activeStatus');
            $statusDatas = $statusResponse->json();
            $statusData = $statusDatas['data'];
            return view('pimsUi/Master/district/view', compact('modeldata', 'countryData', 'stateData', 'statusData'));
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
        $response = apiHeaders()->get($baseUrl . 'district/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            $countryResponse = apiHeaders()->get($baseUrl . 'country');
            $countryDatas = $countryResponse->json();
            $countryData = $countryDatas['data'];
            $stateResponse = apiHeaders()->get($baseUrl . 'state');
            $stateDatas = $stateResponse->json();
            $stateData = $stateDatas['data'];
            $statusResponse = apiHeaders()->get($baseUrl . 'activeStatus');
            $statusDatas = $statusResponse->json();
            $statusData = $statusDatas['data'];
            return view('pimsUi/Master/district/edit', compact('modeldata', 'countryData', 'stateData', 'statusData'));
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
            $response = apiHeaders()->delete(getBaseUrl() . 'district/' . $id);
            if ($response->status() == 200) {
                return redirect()->route('district.index');
            }
        }
    }
}
