<?php

namespace App\Http\Controllers\PIMS\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'state');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/Master/state/list', compact('modeldatas'));
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
        $response = apiHeaders()->get($baseUrl . 'country');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/Master/state/add', compact('modeldatas'));
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
        $response = apiHeaders()->Post($baseUrl . 'state', $datas);
        $result = $response->json();
        if ($response->status() == 200) {
            if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
                return redirect()->route('state.create');
            } else {
                return redirect()->route('state.index');
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

        $response = apiHeaders()->get(getBaseUrl() . 'state/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            return view('pimsUi/Master/state/view', compact('modeldata'));
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
        $response = apiHeaders()->get(getBaseUrl() . 'state/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $result = $datas['data'];
            $baseUrl = getBaseUrl();
            $response = apiHeaders()->get($baseUrl . 'country');
            $datas = $response->json();
            $modeldatas = $datas['data'];
            if ($response->status() == 200) {
                return view('pimsUi/Master/state/edit', compact('modeldatas', 'result'));
            }
        } else {
            dd("un authendicated");
        }
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
            $response = apiHeaders()->delete(getBaseUrl() . 'state/' . $id);
            $datas = $response->json();
            if ($response->status() == 200) {
                $result = $datas['data'];
                if ($result['type'] == 2) {
                    return redirect()->back()->with('failed', 'This State  Used in City');
                } elseif($result['type'] == 1) {
                    return redirect()->route('state.index');
                }else{
                    dd("un authendicated");
                }
            }
        }
    }
}
