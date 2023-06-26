<?php

namespace App\Http\Controllers\version1\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrganizationController extends Controller
{
    public function createOrganisation()
    {
        Log::info('OrganizationController > createOrganisation function Inside.');
        $response = apiHeaders()->get(config('api_base') . 'getAllStates');
        $datas = $response->json();
        Log::info('OrganizationController > createOrganisation function Return.' . json_encode($datas));
        return view("Organization.organisationForm", ['states' => $datas]);
    }
    public function storeOrganization(Request $request)
    {
        Log::info('OrganizationController > storeOrganization function Inside.' . json_encode($request));
        if ($request->isMethod('post')) {
            $request->validate([
                'organizationName' => 'required',
                'organizationEmail' => 'required',
                'organizationGst' => 'required',
            ]);
            $datas = $request->all();
            $datas['uid'] = Session::get('uid');
            $response = apiHeaders()->post(config('api_base') . 'organizationStore', $datas);
            $datas = $response->json();
            Log::info('OrganizationController > storeOrganization function Return.' . json_encode($datas));
            if ($response->status() == 200) {

                return redirect()->route('myAccount');
            } else {
                return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }
    public function getDistrict(Request $request)
    {
        Log::info('OrganizationController > getDistrict function Inside.' . json_encode($request));
        $response = apiHeaders()->post(config('api_base') . 'getDistrict', ["stateId" => $request->stateId]);
        $data = $response->json();
        Log::info('OrganizationController > getDistrict function Return.' . json_encode($data));
        return $data;
    }
    public function getOrganizationAccount()
    {

        Log::info('OrganizationController > getOrganizationAccount function Inside.');
        $uid = Session::get('uid');
        $ipData = ['uid' => $uid];
        $response = apiHeaders()->post(config('api_base') . 'getOrganizationAccountByUid', $ipData);
        $data = $response->json();

        Log::info('OrganizationController > getOrganizationAccount function Return.' . json_encode($data));
        if ($response->status() == 200) {
            return view("Organization.OrganizationAccount", ['uid' => Session::get('uid'), "organisation" => $data['data']]);
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }

    public function defaultLogin()
    {
        Log::info('OrganizationController > getOrganizationAccount function Inside.');
        $uid = Session::get('uid');
        $ipData = ['uid' => $uid];
        $response = apiHeaders()->post(config('api_base') . 'getOrganizationAccountByUid', $ipData);
        $data = $response->json();
        Log::info('OrganizationController > getOrganizationAccount function Return.' . json_encode($data));
        if ($response->status() == 200) {

            return view("Profiles.defaultLogin", ['uid' => Session::get('uid'), "organisation" => $data['data']]);
            # code...

        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }

    public function setOrganizationId(Request $request)
    {
        $orgId = $request->orgId;
        $orgName = $request->orgName;
        Session::put('currentOrgId', $orgId);
        Session::put('organizationName', $orgName);
        $data = ['orgId' => $orgId, 'orgName' => $orgName];
        return $data;
    }

    public function user()
    {
        $bearerToken = Session::get('token');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->post(config('api_base') . 'get_user_data/');
        $data = $response->json();
        if (!isset($data['message'])) {
            Session::put('uid', $data['uid']);
            return $data['uid'];
        } else {
            if ($data['message'] == 'Unauthenticated.') {
                Session::put('uid', "");
                return false;
            }
        }
    }
    public function setDefaultOrganization(Request $request)
    {
        Log::info('OrganizationController > setDefaultOrganization function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'setDefaultOrganization', ['orgId' => $request->orgId, 'orgName' => $request->orgName, 'uid' => $uid]);
            $data = $response->json();
            Log::info('OrsanizationController > setDefaultOrganization function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return $data;
            }
        }
    }

}
