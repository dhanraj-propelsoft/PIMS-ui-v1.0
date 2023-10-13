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
        $response = apiHeaders()->get($baseUrl . 'state');
        $datas = $response->json();
        $response1 = apiHeaders()->get($baseUrl . 'activeStatus');
        $datas1 = $response1->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            $modeldatas1 = $datas1['data'];
            return view('pimsUi/Master/district/add', compact('modeldatas','modeldatas1'));
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
        $result = $response->json();
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

        $response = apiHeaders()->get(getBaseUrl() . 'district/' . $id);
        $datas = $response->json();
        $response1 = apiHeaders()->get(getBaseUrl() . 'activeStatus');
        $datas1 = $response1->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            $modeldata1 = $datas1['data'];
            return view('pimsUi/Master/district/view', compact('modeldata','modeldata1'));
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

        $response = apiHeaders()->get(getBaseUrl() . 'district/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $result = $datas['data'];
            $baseUrl = getBaseUrl();
            $response = apiHeaders()->get($baseUrl . 'state');
            $datas = $response->json();
            $modeldatas = $datas['data'];
            $response1 = apiHeaders()->get($baseUrl . 'activeStatus');
            $datas1 = $response1->json();
            $modeldatas1 = $datas1['data'];
            if ($response->status() == 200) {
                return view('pimsUi/Master/district/edit', compact('modeldatas', 'modeldatas1', 'result'));
            }
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
            $response = apiHeaders()->delete(getBaseUrl() . 'district/' . $id);
            $result = $response->json();
            if ($response->status() == 200) {
                return redirect()->route('district.index');
            }
        }
    }
}
