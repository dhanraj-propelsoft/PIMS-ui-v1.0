<?php

namespace App\Http\Controllers\version1\Hrm\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HrmDepartmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('HrmDepartmentController > profileUpdate function Inside.');
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'getHrmDepartmentData/' . $orgId);
        $datas = $response->json();
        Log::info('HrmDepartmentController > profileUpdate function Return.' . json_encode($datas));
        if ($response->status() == 200) {
            return view("hrm.masters.department", ['datas' => $datas['data']]);
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
        Log::info('HrmDepartmentController > create function Inside.');
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'createHrmDepartmentData/' . $orgId);
        $parentDeptDatas = $response->json();
        Log::info('HrmDepartmentController > create function Return.' . json_encode($parentDeptDatas));
        if ($response->status() == 200) {
            return view("hrm.masters.departmentadd", ['parentDeptDatas' => $parentDeptDatas]);
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
        Log::info('HrmDepartmentController > store function Inside.' . json_encode($request));
        $datas = $request->all();
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->post(config('api_base') . 'storeHrmDepartment/' . $orgId, $datas);
        $datas = $response->json();
        Log::info('HrmDepartmentController > store function Return.' . json_encode($datas));
        $msg = ($request->id) ? "updated" : "added";
        if ($response->status() == 200) {

            if ($request->saveAndNew) {
                return redirect()->route("hrmDepartment.create")->with('message', 'Last Entered Department has been ' . $msg . ' successfully!');
            } else {

                return redirect()->route("hrmDepartment.index")->with('message', 'Department has been ' . $msg . ' successfully!');
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
        Log::info('HrmDepartmentController > edit function Inside.' . json_encode($id));
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'findHrmDepartmentDataById/' . $orgId . '/' . $id);
        $datas = $response->json();
        $allDatas = $datas['data'];
        $modelData = $allDatas['responseModelData'];
        $parentDeptDatas = $allDatas['responseParentDeptData'];
        Log::info('HrmDepartmentController > edit function Return.' . json_encode($parentDeptDatas));
        // dd($datas);
        if ($response->status() == 200) {
            return view("hrm.masters.departmentedit", ['datas' => $modelData, 'parentDeptDatas' => $parentDeptDatas]);
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
        Log::info('HrmDepartmentController > destroy function Inside.' . json_encode($id));
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'deleteHrmDepartmentDataById/' . $orgId . '/' . $id);
        $datas = $response->json();
        Log::info('HrmDepartmentController > destroy function Return.' . json_encode($datas));
        if ($response->status() == 200) {
            return redirect()->route("hrmDepartment.index")->with('message', 'Department has been Deleted successfully!');
        } else {
            dd('Not Working');
        }
    }
}