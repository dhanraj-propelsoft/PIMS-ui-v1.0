<?php

namespace App\Http\Controllers\Hrm\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
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

        $response =apiHeaders()->get(config('api_base') . 'hrmHumanResourceType');
        $datas = $response->json();
        return view("hrm.masters.ResourceType", ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
      $response =apiHeaders()->get(config('api_base') . 'hrmHumanResourceType/create');
      $parentDeptDatas = $response->json();
      return view("hrm.masters.ResourceTypeadd", ['parentDeptDatas' => $parentDeptDatas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $name = $request->name;
        $description = $request->description;
        $status=($request->status =="on")?1:0;
  
        $response = apiHeaders()->post(config('api_base') . 'hrmHumanResourceType', ['name' => $name,'description' => $description ,'status' => $status ]);
        $datas = $response->json();
      
        if ($request->saveAndClose) {
            return redirect()->route("hrmResourceTypeMaster.index")->with('message', ' Hrm Human Resource Type has been added successfully!');
        } else {
            return redirect()->route("hrmResourceTypeMaster.create")->with('message', 'Last Hrm Human Resource Type has been added successfully!');
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
        $response =apiHeaders()->get(config('api_base') . 'hrmHumanResourceType/' . $id . '/edit');
        $datas = $response->json();
        return view("hrm.masters.ResourceTypeEdit", ['datas' => $datas]);
        

 
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
       
        $name = $request->name;
        $department = $request->department;
        $description = $request->description;
        $status=($request->status =="on")?1:0;
        $response =apiHeaders()->put(config('api_base') . 'hrmHumanResourceType/' . $id, ['name' => $name,'description' => $description, 'status' => $status]);
        $datas = $response->json();
        return redirect()->route("hrmResourceTypeMaster.index")->with('message', 'Human Resource Type  has been Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = apiHeaders()->delete(config('api_base') . 'hrmHumanResourceType/' . $id);
        $datas = $response->json();
        return redirect()->route("hrmResourceTypeMaster.index")->with('message', 'Human Resource Type  has been Deleted successfully!');

    }
}