<?php

namespace App\Http\Controllers\PIMS\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = getBaseUrl();     

        $response = apiHeaders()->get($baseUrl. 'salutation');
      
        $datas = $response->json();
       
        if ($response->status() == 200) 
        {
            
            $modeldatas = $datas['data'];           
            return view('pimsUi/salutation/list',compact('modeldatas'));
        } 
        else
        {
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
        return view('pimsUi/salutation/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = apiHeaders()->get(getBaseUrl(). 'salutation/'.$id);    
      
        $datas = $response->json();
    
        if ($response->status() == 200) 
        {
            
            $modeldata = $datas['data'];           
            return view('pimsUi/salutation/view',compact('modeldata'));
        } 
        else
        {
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
      
        $response = apiHeaders()->get(getBaseUrl(). 'salutation/'.$id);    
      
        $datas = $response->json();
  //  dd($datas);
        if ($response->status() == 200) 
        {
            
            $modeldata = $datas['data'];           
            return view('pimsUi/salutation/edit',compact('modeldata'));
        } 
        else
        {
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
        //
    }
}
