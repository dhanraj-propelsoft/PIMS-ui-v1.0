<?php

namespace App\Http\Controllers\version1\Hrm\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class HrmDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('HrmDesignationController > index function Inside.');
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'getHrmDesignation/' . $orgId);
        $datas = $response->json();
        $result = $datas['data'];
        Log::info('HrmDesignationController > index function Return.' . json_encode($result));
        if ($response->status() == 200) {
            return view("hrm.masters.designation", ['datas' => $result['model'], 'departments' => $result['department']]);
        } else {
            dd('Not Working');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('HrmDesignationController > create function Inside.');
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'createHrmDesignationData/' . $orgId);
        $datas = $response->json();
        Log::info('HrmDesignationController > create function Return.' . json_encode($datas));
        if ($response->status() == 200) {
            return view("hrm.masters.designationadd", ['datas' => $datas['data']]);
        } else {
            dd('Not Working');
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
        Log::info('HrmDesignationController > store function Inside.' . json_encode($request));
        $datas = $request->all();
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->post(config('api_base') . 'storeHrmDesignation/' . $orgId, $datas);
        $datas = $response->json();
        Log::info('HrmDesignationController > store function Return.' . json_encode($datas));
        if ($response->status() == 200) {
            if ($request->saveAndNew) {
                return redirect()->route("hrmDesignation.create")->with('message', 'Designation has been added successfully!');
            } else {
                $msg = ($request->id) ? "updated" : "added";
                return redirect()->route("hrmDesignation.index")->with('message', 'Designation has been ' . $msg . ' successfully!');
            }
        } else {
            dd('Not working');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Log::info('HrmDesignationController > edit function Inside.' . json_encode($id));
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'findHrmDesignationDataById/' . $orgId . '/' . $id);
        $datas = $response->json();
        $result = $datas['data'];
        Log::info('HrmDesignationController > edit function Return.' . json_encode($result));
        if ($response->status() == 200) {
            return view("hrm.masters.designationedit", ['datas' => $result['responseModelData'], 'departments' => $result['department']]);
        } else {
            dd('Not Working');
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info('HrmDesignationController > destroy function Inside.');
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'destroyHrmDesignationById/' . $orgId . '/' . $id);
        $datas = $response->json();
        Log::info('HrmDesignationController > destroy function Return.' . json_encode($datas));
        if ($response->status() == 200) {
            return redirect()->route("hrmDesignation.index")->with('message', 'Designation  has been Deleted successfully!');
        } else {
            dd('Not Working');
        }
    }
}