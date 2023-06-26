<?php

namespace App\Http\Controllers\Hrm\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class hrmResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hrm.transaction.add-resource-stage-1');
    }

    public function findResourceWithEmailAndMobile(Request $request)
    {

        $email = $request->email;
        $mobile = $request->mobile;      

        $response =apiHeaders()->post(config('api_base') . 'findResourceWithCredentials', ['email' => $email, 'mobile' => $mobile]);
        $datas = $response->json(); 
    
        $status=$datas['results'];
   
        if ($response->status() == 200) {
            if (isset($data['param'])) {
                $params = $data['param'];
              
            } else {
                $params = "";
            }  
            
    } 
      if($status['status']=='FreshPerson')
      {
     return view('hrm.transaction.add-resource-stage-3',['saluationLists' => $datas['saluationLists'] ,'bloodGroupLists' => $datas['bloodGroupLists'],'genderLists'=> $datas['genderLists'],'addressOfLists' => $datas['addressOfLists'],'hrmDepartmentLists' => $datas['hrmDepartmentLists'],'hrmDesignation' => $datas['hrmDesignation'],'hrmResourceTypeLists' => $datas['hrmResourceTypeLists'],'maritalStatusLists'=> $datas['maritalStatusLists'],'languageLists' =>$datas['languageLists'],'idDocumentTypes' =>$datas['idDocumentTypes'],'bankAccountTypes'=>$datas['bankAccountTypes']]);

      }    
      else{
        dd("oldsomedata");
      }
    }

    public function getDesignationDataByDept(Request $request) {    
        $deptId = $request->deptId;
        $response =apiHeaders()->post(config('api_base') . 'findDesignationByDepartmentId', ['deptId' => $deptId]);
        $datas = $response->json(); 
        return response()->json($datas);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        //
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
        $response =apiHeaders()->post(config('api_base') . 'freshPersonOrganizationDetails', ['datas' => $datas]);
        $datas = $response->json(); 
     
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
        //
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
        //
    }
}