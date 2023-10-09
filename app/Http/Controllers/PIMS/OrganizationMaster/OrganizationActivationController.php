<?php

namespace App\Http\Controllers\PIMS\OrganizationMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationActivationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'tempOrganizationList');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/organizationMaster/organizationActivation/list', compact('modeldatas'));
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
        //return view('pimsUi/organizationMaster/organizationActivation/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $datas = $request->all();
        // $baseUrl = getBaseUrl();
        // $response = apiHeaders()->Post($baseUrl . 'tempOrganizationList', $datas);
        // $result = $response->json();
        // if ($response->status() == 200) {
        //     if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
        //         return view('pimsUi/organizationMaster/organizationActivation/add');
        //     } else {
        //         return redirect()->route('orgActivation.index');
        //     }
        // } else {
        //     dd("un authendicated");
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id) {
            dd($id);
        }
        // $response = apiHeaders()->get(getBaseUrl() . 'tempOrganizationList/' . $id);
        // $datas = $response->json();
        // if ($response->status() == 200) {
        //     $modeldata = $datas['data'];
        //     return view('pimsUi/organizationMaster/organizationActivation/view', compact('modeldata'));
        // } else {
        //     dd("un authendicated");
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $response = apiHeaders()->get(getBaseUrl() . 'tempOrganizationList/' . $id);

        // $datas = $response->json();

        // if ($response->status() == 200) {

        //     $modeldata = $datas['data'];

        //     return view('pimsUi/organizationMaster/organizationActivation/edit', compact('modeldata'));
        // } else {
        //     dd("un authendicated");
        // }
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
        // if ($id) {
        //     $baseUrl = getBaseUrl();
        //     $response = apiHeaders()->delete(getBaseUrl() . 'tempOrganizationList/' . $id);
        //     $result = $response->json();
        //     if ($response->status() == 200) {
        //         return redirect()->route('orgActivation.index');
        //     }
        // }
    }
}
