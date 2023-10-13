<?php

namespace App\Http\Controllers\PIMS\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->get($baseUrl . 'country');
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldatas = $datas['data'];
            return view('pimsUi/Master/Country/list', compact('modeldatas'));
        } else {
            return redirect()->route('logout');
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
            return view('pimsUi/Master/Country/add', compact('statusData'));
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
        $response = apiHeaders()->Post($baseUrl . 'country', $datas);

        if ($response->status() == 200) {
            if (isset($datas['link']) && $datas['link'] == "saveAndNew") {
                return redirect()->route('country.create');
            } else {
                return redirect()->route('country.index');
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
        $response = apiHeaders()->get(getBaseUrl() . 'country/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            return view('pimsUi/Master/Country/view', compact('modeldata'));
        } else {
           return redirect()->route('/');
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
        $response = apiHeaders()->get(getBaseUrl() . 'country/' . $id);
        $datas = $response->json();
        if ($response->status() == 200) {
            $modeldata = $datas['data'];
            return view('pimsUi/Master/Country/edit', compact('modeldata'));
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

    public function check_duplicate(Request $request)
    {
        $datas = $request->all(); 
        //dd($datas);
        $baseUrl = getBaseUrl();
        $response = apiHeaders()->Post($baseUrl . 'countryValidation', $datas);
        $res_data = $response->json();
       
        if ($res_data['data']['errors'] != false) {
            $res = $res_data['data']['errors'];
           
        }else{
           $res = false;
        }
      
        return response()->json(['error'=> $res]);
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
            $response = apiHeaders()->delete(getBaseUrl() . 'country/' . $id);
            $datas = $response->json();
            if ($response->status() == 200) {
                $result = $datas['data'];
                if ($result['type'] == 2) {
                    return redirect()->back()->with('failed', 'This Country  Used in State');
                } elseif($result['type'] == 1) {
                    return redirect()->route('country.index');
                }else{
                    dd("un authendicated");
                }

            }
        }
    }
}
