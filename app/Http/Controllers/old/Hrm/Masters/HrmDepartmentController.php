<?php

namespace App\Http\Controllers\Hrm\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        $response =apiHeaders()->get(config('api_base') . 'hrmDepartment');
        $datas = $response->json();        

        return view("hrm.masters.department", ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $response = apiHeaders()->get(config('api_base') . 'hrmDepartment/create');
        $parentDeptDatas = $response->json();

        return view("hrm.masters.departmentadd", ['parentDeptDatas' => $parentDeptDatas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->department;
        $parent_dept_id = $request->parent_dept_id;
        $description = $request->description;

        $response = apiHeaders()->post(config('api_base') . 'hrmDepartment', ['name' => $name, 'parent_dept_id' => $parent_dept_id, 'description' => $description]);
        $datas = $response->json();

        if ($request->saveAndClose) {
            return redirect()->route("hrmDepartmentMaster.index")->with('message', 'Department has been added successfully!');
        } else {
            return redirect()->route("hrmDepartmentMaster.create")->with('message', 'Last Entered Department has been added successfully!');
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
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = apiHeaders()->get(config('api_base') . 'hrmDepartment/' . $id . '/edit');
        $datas = $response->json();

        $modelData = $datas['resposeModelData'];
        $parentDeptDatas = $datas['responseParentDeptData'];
        // dd($datas);

        return view("hrm.masters.departmentedit", ['datas' => $modelData, 'parentDeptDatas' => $parentDeptDatas]);
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
        $name = $request->department;
        $parent_dept_id = $request->parent_dept_id;
        $description = $request->description;
        $status = $request->status;
        $response = apiHeaders()->put(config('api_base') . 'hrmDepartment/' . $id, ['name' => $name, 'parent_dept_id' => $parent_dept_id, 'description' => $description, 'status' => $status]);
        $datas = $response->json();
        return redirect()->route("hrmDepartmentMaster.index")->with('message', 'Department has been Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $response = apiHeaders()->delete(config('api_base') . 'hrmDepartment/' . $id);
        $datas = $response->json();
        return redirect()->route("hrmDepartmentMaster.index")->with('message', 'Department has been Deleted successfully!');
    }
}