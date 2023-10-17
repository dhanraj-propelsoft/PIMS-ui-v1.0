<?php

namespace App\Http\Controllers\PIMS\OrganizationMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationDocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'orgDocumentType');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/organizationMaster/organizationDocumentType/list', compact('modeldatas'));
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
            return view('pimsUi/organizationMaster/organizationDocumentType/add', compact('statusData'));
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
        $response = apiHeaders()->Post($baseUrl . 'orgDocumentType', $datas);
        $result = $response->json();
        if ($response->status() == 200) {
            if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
                return redirect()->route('orgDocumentType.create');
            } else {
                return redirect()->route('orgDocumentType.index');
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
        $response = apiHeaders()->get(getBaseUrl() . 'orgDocumentType/' . $id);
        $datas = $response->json();
        $response1 = apiHeaders()->get(getBaseUrl() . 'activeStatus');
        $datas1 = $response1->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            $modeldata1 = $datas1['data'];
            return view('pimsUi/organizationMaster/organizationDocumentType/view', compact('modeldata','modeldata1'));
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
        $response = apiHeaders()->get(getBaseUrl() . 'orgDocumentType/' . $id);
        $datas = $response->json();
        $response1 = apiHeaders()->get(getBaseUrl() . 'activeStatus');
        $datas1 = $response1->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            $modeldata1 = $datas1['data'];
            return view('pimsUi/organizationMaster/organizationDocumentType/edit', compact('modeldata','modeldata1'));
        } else {
            dd("un authendicated");
        }
    }

    public function documentTypeValidation(Request $request)
    {
        $datas = $request->all(); 
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'documentTypeValidation', $datas);
        $res_data = $response->json();
        
        if ($res_data['data']['errors'] != false) {
            $res = $res_data['data']['errors'];
           
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
            $response = apiHeaders()->delete(getBaseUrl() . 'orgDocumentType/' . $id);
            $result = $response->json();
            if ($response->status() == 200) {
                return redirect()->route('orgDocumentType.index');
            }
        }
    }
}
