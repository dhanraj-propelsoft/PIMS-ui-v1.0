<?php

namespace App\Http\Controllers\version1\Hrm\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class hrmResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orgId = Session::get('currentOrgId');
        $response = apiHeaders()->get(config('api_base') . 'findAllResources/' . $orgId);
        $responseDatas = $response->json();
        
        $datas = $responseDatas['data'];
        Log::info('hrmResourceController > index function Return.' . json_encode($datas));
        if ($response->status() == 200) {
        return view('hrm.transaction.hrmResourceIndex', compact('datas'));
        // return view('hrm.transaction.add-resource-stage-1');
    }
}
    public function create()
    {
        return view('hrm.transaction.add-resource-stage-1');
    }

    public function findResourceWithEmailAndMobile(Request $request)
    {
      
        Log::info('hrmResourceController > findResourceWithEmailAndMobile function Inside.'. json_encode($request));
        $orgId = Session::get('currentOrgId');
        $ipdatas = $request->all();
        $response = apiHeaders()->post(config('api_base') . 'findResourceWithCredentials/' . $orgId, $ipdatas);
        $datas = $response->json(); 
      Log::info('hrmResourceController > findResourceWithEmailAndMobile function Return.' . json_encode($datas));
        // $status = $datas['results'];
        if ($response->status() == 200) {
            $resDatas = $datas['data'];
            if ($resDatas['type'] == 1) {
                $personData=$resDatas['AllPersons'];
                return view('hrm.transaction.resourceListMobileAndEmail',['personDatas'=>$personData,'mobile'=>$request->mobileNo,'email'=>$request->email]);
            } else if ($resDatas['type'] == 2) {
                $response1 = apiHeaders()->get(config('api_base') . 'getResourceMasterData/' . $orgId);
                $resDatas = $response1->json();
                $datas1 = $resDatas['data'];
                $mobileNo = $request->mobileNo;
                $email = $request->email;
                return view('hrm.transaction.add-resource-stage-3', ['mobileNo' => $mobileNo, 'email' => $email, 'saluationLists' => $datas1['saluationLists'], 'bloodGroupLists' => $datas1['bloodGroupLists'], 'genderLists' => $datas1['genderLists'], 'addressOfLists' => $datas1['addressOfLists'], 'hrmDepartmentLists' => $datas1['hrmDepartmentLists'], 'hrmDesignationLists' => $datas1['hrmDesignationLists'], 'hrmResourceTypeLists' => $datas1['hrmResourceTypeLists'], 'maritalStatusLists' => $datas1['maritalStatusLists'], 'languageLists' => $datas1['languageLists'], 'idDocumentTypes' => $datas1['idDocumentTypes'], 'bankAccountTypes' => $datas1['bankAccountTypes']]);
            } else if ($resDatas['type'] == 7) {
                $person = $resDatas['data'];
                $response2 = apiHeaders()->post(config('api_base') . 'generateMobileOtp/' . $orgId, ['uid' => $person['uid']]);
                $resDatas2 = $response2->json();
                $mobileNo = $request->mobileNo;
               $maskedPhone = substr($mobileNo, 0, 4) . "****" . substr($mobileNo, 7, 4);
                return view('hrm.transaction.resourceMobileOtp', ['userName' => $person['first_name'], 'number' => $maskedPhone, 'uid' => $person['uid']]);
            }
            // else if($resDatas['type']==8){
            //     $person = $resDatas ['mobileOnly'];
            //     return view('hrm.transaction.resourceMobile',['person'=>$person]);
        
            // }
            // else if($resDatas['type']==9){
            // $person = $resDatas['emailOnly'];
            // return view('hrm.transaction.resourceEmail',['person'=>$person]);
            // }


            // if ($status['status'] == 'FreshPerson') {
            //     return view('hrm.transaction.add-resource-stage-3', ['saluationLists' => $datas['saluationLists'], 'bloodGroupLists' => $datas['bloodGroupLists'], 'genderLists' => $datas['genderLists'], 'addressOfLists' => $datas['addressOfLists'], 'hrmDepartmentLists' => $datas['hrmDepartmentLists'], 'hrmDesignationLists' => $datas['hrmDesignationLists'], 'hrmResourceTypeLists' => $datas['hrmResourceTypeLists'], 'maritalStatusLists' => $datas['maritalStatusLists'], 'languageLists' => $datas['languageLists'], 'idDocumentTypes' => $datas['idDocumentTypes'], 'bankAccountTypes' => $datas['bankAccountTypes']]);
            // } else {
            //     dd("oldsomedata");
            // }
        }
    }

    public function getDesignationDataByDept(Request $request)
    {
        $orgId = Session::get('currentOrgId');
        $ipDatas = $request->all();
        $response = apiHeaders()->post(config('api_base') . 'findDesignationByDepartmentId/' . $orgId, $ipDatas);
        $datas = $response->json();
        Log::info('hrmResourceController > getDesignationDataByDept function Return.' . json_encode($datas));
        if ($response->status() == 200) {
        return $datas['data'];
    }
}

public function resourceMobileOtp(Request $request)
{

$result = explode(',',$request->personDetails);
$datas['uid']=$result[0];
$mobileNo=$result[1];
$email=$result[2];
$orgId = Session::get('currentOrgId');
$response = apiHeaders()->post(config('api_base') . 'generateMobileOtp/' . $orgId, $datas);
$datas = $response->json();
if ($response->status() == 200) {
    $datas=$datas['data'];
$person=$datas['datas'];
$maskedPhone = substr($mobileNo, 0, 4) . "****" . substr($mobileNo, 7, 4);
     return view('hrm.transaction.resourceMobileOtp', ['number' => $maskedPhone, 'uid' => $result[0],'email'=>$email]);
} else {
    return redirect()->back()->withErrors(['mobile' => $datas['message']]);
}
}
public function resourceEmailOtp(Request $request)
{
    $orgId = Session::get('currentOrgId');
    $datas = $request->all();
    $response = apiHeaders()->post(config('api_base') . 'resourceEmailOtp/' . $orgId, $datas);
    $datas = $response->json();

    if ($response->status() == 200) {
        $datas=$datas['data'];
    $person=$datas['datas'];
    $email = $request->email;
    $email = substr($email, 0, 4) . "****" . substr($email, 7);
         return view('hrm.transaction.resourceEmailOtp', ['userName' => $person['firstName'], 'email' => $email, 'uid' => $person['uid']]);
    } else {
        return redirect()->back()->withErrors(['mobile' => $datas['message']]);
    }
}
    public function edit($id)
    {

        dd($id);
        return view('hrm.transaction.hrmResourceEdit');
    }

    public function reliveResourcePage($id)
    {
        dd("well");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orgId = Session::get('currentOrgId');
        $datas = $request->all();
        $response = apiHeaders()->post(config('api_base') . 'resourcesStore/' . $orgId, $datas);
        $datas = $response->json();
        dd($datas);
        if ($response->status() == 200) {
            return redirect()->route('hrmResource.index');
        } else {
            return redirect()->back()->withErrors(['mobile' => $datas['message']]);
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
        //
    }
    public function resourceOtpValidate(Request $request)
{
    $orgId = Session::get('currentOrgId');
        $ipData = $request->all();
        $response = apiHeaders()->post(config('api_base') . 'resourceOtpValidate/' . $orgId, $ipData);
    $datas = $response->json();
    if ($response->status() == 200) {
            $result = $datas['data'];
            // if (!empty($result['otherLanguages'])) {
            //     $mother_tounge = $result['otherLanguages'][0]['mother_tongue'];
            // }
        //     $anniverasaryData = $result['anniversaryDate'];  
        //     $date=$anniverasaryData['anniversary_date'];    
        //    $anniverasaryDate =($date)? $date :"";
           return view('hrm.transaction.resourceWizard', ['saluationLists' => $result['salutation'], 'bloodGroupLists' => $result['bloodGroup'], 'genderLists' => $result['gender'], 'addressOfLists' => $result['addressOf'], 'hrmDepartmentLists' => $result['hrmDepartment'], 'hrmDesignationLists' => $result['hrmDesignation'], 'idDocumentTypes' => $result['idDocumentTypes'], 'personData' => $result['getPersonPrimaryData'],'hrmResources'=>$result['hrmResourceType'],'maritalStatus'=>$result['maritalStatus'],'languages'=>$result['language'],'bankAccount'=>$result['bankAccount'],'otherLanguages'=>$result['otherLanguages'],'personAddresses'=>$result['personAddress']]);   
        return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
    }
}
public function resourceEmailOtpValidate(Request $request)
{
    $orgId = Session::get('currentOrgId');
        $ipData = $request->all();
        $response = apiHeaders()->post(config('api_base') . 'resourceEmailOtpValidate/' . $orgId, $ipData);
    $datas = $response->json();
    dd($datas);
    if ($response->status() == 200) {
            $result = $datas['data']; 
           return view('hrm.transaction.resourceWizard', ['saluationLists' => $result['salutation'], 'bloodGroupLists' => $result['bloodGroup'], 'genderLists' => $result['gender'], 'addressOfLists' => $result['addressOf'], 'hrmDepartmentLists' => $result['hrmDepartment'], 'hrmDesignationLists' => $result['hrmDesignation'], 'idDocumentTypes' => $result['idDocumentTypes'], 'personData' => $result['getPersonPrimaryData'],'hrmResources'=>$result['hrmResourceType'],'maritalStatus'=>$result['maritalStatus'],'languages'=>$result['language'],'bankAccount'=>$result['bankAccount'],'otherLanguages'=>$result['otherLanguages'],'personAddresses'=>$result['personAddress']]);   
        return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
    }
}
public function hrmResourceEdit(Request $request)
{
    return view('hrm.transaction.resourceEdit');
    // $orgId = Session::get('currentOrgId');
    // $response = apiHeaders()->post(config('api_base') . '/'. $orgId,$uid);
    // $datas = $response->json();
    // if ($response->status() == 200) {
    //     $result=$datas['data'];
    // } else {
    //     return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
    // }
}
}