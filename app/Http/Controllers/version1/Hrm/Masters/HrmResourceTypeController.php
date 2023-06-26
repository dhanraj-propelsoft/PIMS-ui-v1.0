<?php

namespace App\Http\Controllers\version1\Hrm\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HrmResourceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        Log::info('HrmResourceTypeController > index function Inside.');
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'getHrmResourceTypeData/' . $orgId);
        $datas = $response->json();
        Log::info('HrmResourceTypeController > index function Return.' . json_encode($datas));
        if ($response->status() == 200) {
            return view("hrm.masters.ResourceType", ['datas' => $datas['data']]);
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

        //   $response =apiHeaders()->get(config('api_base') . 'hrmHumanResourceType/create');
        //   $parentDeptDatas = $response->json();
        return view("hrm.masters.ResourceTypeadd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('HrmResourceTypeController > store function Inside.' . json_encode($request));
        $ipdatas = $request->all();
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->post(config('api_base') . 'storeHrmResourceTypeData/' . $orgId, $ipdatas);
        $datas = $response->json();
        Log::info('HrmResourceTypeController > store function Return.' . json_encode($datas));
        $msg = ($request->id) ? "updated" : "added";
        if ($response->status() == 200) {
            if ($request->saveAndNew) {
                return redirect()->route("hrmResourceType.create")->with('message', 'Last Hrm Human Resource Type has been ' . $msg . ' successfully!');
            } else {
                return redirect()->route("hrmResourceType.index")->with('message', ' Hrm Human Resource Type has been ' . $msg . ' successfully!');
            }
        } else {
            dd('Not Working');
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
        Log::info('HrmResourceTypeController > edit function Inside.' . json_encode($id));
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'findHrmResourceType/' . $orgId . '/' . $id);
        $datas = $response->json();
        Log::info('HrmResourceTypeController > edit function Return.' . json_encode($datas));
        if ($response->status() == 200) {
            return view("hrm.masters.ResourceTypeEdit", ['datas' => $datas['data']]);
        } else {
            dd('Not Working');
        }


    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info('HrmResourceTypeController > destroy function Inside.' . json_encode($id));
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'deleteHrmResourceTypeData/' . $orgId . '/' . $id);
        $datas = $response->json();
        Log::info('HrmResourceTypeController > destroy function Return.' . json_encode($datas));
        if ($response->status() == 200) {
            return redirect()->route("hrmResourceType.index")->with('message', 'Human Resource Type  has been Deleted successfully!');
        } else {
            dd('Not Working');
        }
    }
}