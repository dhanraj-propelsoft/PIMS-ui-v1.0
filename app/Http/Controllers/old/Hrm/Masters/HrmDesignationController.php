<?php

namespace App\Http\Controllers\HRM\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        
        //check by dhana 
        $response = apiHeaders()->get(config('api_base') . 'hrmDesignation');
        $datas = $response->json();
        return view("hrm.masters.designation", ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = apiHeaders()->get(config('api_base') . 'hrmDesignation/create');
        $datas = $response->json(); 
        return view("hrm.masters.designationadd", ['datas' => $datas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $designation = $request->designation;
        $dept_id = $request->department;
        $no_of_posting =$request->no_of_posting;
        $description = $request->description;
        // $status=($request->status =="on")?1:0;

        $response =apiHeaders()->post(config('api_base') . 'hrmDesignation', ['designation' => $designation, 'dept_id' => $dept_id, 'description' => $description ,'no_of_posting' => $no_of_posting]);
        $datas = $response->json();
        if ($request->saveAndClose) {
            return redirect()->route("hrmDesignationMaster.index")->with('message', 'Designation has been added successfully!');
        } else {
            return redirect()->route("hrmDesignationMaster.create")->with('message', 'Last Entered Designation has been added successfully!');
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
     
        $response = apiHeaders()->get(config('api_base') . 'hrmDesignation/' . $id . '/edit');
        $datas = $response->json();
        $modelData = $datas['modelData'];
        $departmentDatas = $datas['depatmentData'];
        return view("hrm.masters.designationedit", ['datas' => $modelData, 'departmentDatas'=>$departmentDatas]);
        

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
        //check by dhana
  
        $designation = $request->designation;
        $dept_id = $request->department;
        $no_of_posting=$request->no_of_posting; 
        $description = $request->description;
        $status=($request->status =="on")?1:0;

        $response = apiHeaders()->put(config('api_base') . 'hrmDesignation/' . $id, ['designation' => $designation, 'dept_id' => $dept_id, 'description' => $description, 'status' => $status , 'no_of_posting' => $no_of_posting]);
        $datas = $response->json();
        return redirect()->route("hrmDesignationMaster.index")->with('message', 'Designation has been Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = apiHeaders()->delete(config('api_base') . 'hrmDesignation/' . $id);
        $datas = $response->json();
        return redirect()->route("hrmDesignationMaster.index")->with('message', 'Designation  has been Deleted successfully!');

    }
}
