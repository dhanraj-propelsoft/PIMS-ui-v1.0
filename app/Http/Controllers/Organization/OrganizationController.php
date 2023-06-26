<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\PersonDetails;
use App\Models\BasicModels\Gender;
use App\Models\BasicModels\BloodGroup;
use App\Models\BasicModels\Salutation;
use App\Models\City;
use App\Models\Organisation;
use App\Models\OrganisationIdentities;
use App\Models\TempOrganisation;
use App\Models\TempOrganisationEmail;
use App\Models\TempOrganisation_address;
use App\Models\TempOrganisation_details;
use App\Models\TempOrganisationAdmin;
use App\Models\Ciy;
use App\Models\State;
use App\Models\Address_of;
use App\Models\PersonAddress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class OrganizationController extends Controller
{
    public function organisation()
    {
        $data = $this->user();
        if ($data) {

            $organisation_array = Organisation::with('mobile', 'email', 'details', 'address', 'identities', 'web')->where("uid", $data)->get();
            $organisation = $organisation_array->toArray();

            return view("admin.organisation", ['uid' => $data, "organisation_count" => count($organisation), "organisation" => $organisation]);
        } else {
            return redirect('/login');
        }
    }
    public function new_organisation(Request $request)
    {
        $data = $this->user();
        if ($data) {
            // print_r($data);
            // die();
            return view("admin.new_organisation", ['uid' => $data, "organisation" => 1]);
        } else {
            return redirect('/login');
        }
    }
    public function organization_wizard(Request $request)
    {

        // ck
        $response = apiHeaders()->get(config('api_base') . 'organizationCommonData');
        $datas = $response->json();


        return view('Organization.organization', ['addressOfLists' => $datas['addressOfLists'], 'idDocumentTypes' => $datas['idDocumentTypes'], 'organizationSector' => $datas['organizationSector'], 'organizationSubset' => $datas['organizationSubset'], 'organizationActivities' => $datas['organizationActivities'], 'organizationOwnerShip' => $datas['organizationOwnerShip'], 'organizationCategory' => $datas['organizationCategory']]);
    }
    public function organizationStore(Request $request)
    {
        $datas = $request->all();

        $response = apiHeaders()->post(config('api_base') . 'organizationStore', $datas);
        $datas = $response->json();
        dd($datas);
        die();
    }

    public function create_organisation()
    {
        $data = $this->user();
        if ($data) {
            $organisation_array = DB::table('organisation')->where('uid', $data)->get();
            $organisation = $organisation_array->toArray();
            return view("admin.create_organisation", ['uid' => $data, "organisation_count" => count($organisation), "organisation" => $organisation]);
        } else {
            return redirect('/login');
        }
    }
    public function organisation_details(Request $request)
    {
        $data = $this->user();
        if ($data) {
            $states = State::where('country_id', 101)->get()->toArray();
            $organisation_name = $request->organisation_name;
            $organisation_email = $request->organisation_email;

            $temp_details = TempOrganisation_details::with('temp_email', 'temp_organisation')->where(["organisation_name" => $organisation_name])->get();
            $temp_result = $temp_details->toArray();



            $temp_organisation_name = ($temp_result) ? $temp_result[0]['organisation_name'] : "";
            $temp_organisation_email = ($temp_result) ? $temp_result[0]['temp_email'][0]['email'] : "";

            if ($temp_organisation_name == '' && $temp_organisation_email == '') {

                $request_array = array(
                    'organisation_name' => $organisation_name,
                    'organisation_email' => $organisation_email,
                    'uid' => $data,
                );

                $response = Http::post(config('api_base') . 'temp_organisation_stage_one', $request_array);
                $datumn = $response->json();
                // echo "<pre>";
                // print_r($datumn);
                // die();
                if ($response->status() == 200) {
                    if (isset($datumn['param'])) {
                        $params = $datumn['param'];
                        $temp_stage = $datumn['param']['temp_stage'];
                    } else {
                        $params = "";
                    }

                    if ($temp_stage == 1) {
                        $temp_id = $datumn['param']['temp_id'];
                    } else {
                        $temp_id = "";
                    }

                    if ($temp_stage == 2) {
                        $temp_address = $datumn['param']['result'][0]['temp_address'];
                    } else {
                        $temp_address = "";
                    }

                    //dd($temp_id);
                    return view("admin.organisation_details", ['temp_id' => $temp_id, 'uid' => $data, "organisation_name" => $organisation_name, "organisation_email" => $organisation_email, "temp_address" => $temp_address, "temp_city" => "", "temp_state" => "", "states" => $states]);
                } else {
                    $error = "";
                    if (isset($datumn['message'])) {
                        $error = $datumn['message'];
                    } else if (isset($datumn['errors'])) {
                        $error = $datumn['errors'];
                    }
                    return redirect()->back()->withErrors(['failure' => $error]);
                }
            } else {
                $temp_address = TempOrganisation::with('temp_details', 'temp_email', 'temp_address')->where(["id" => $temp_result[0]['oid']])->get();
                $address = $temp_address->toArray();

                $organisation_name = $address[0]['temp_details']['organisation_name'];
                $organisation_email = $address[0]['temp_email'][0]['email'];
                if ($address[0]['temp_address']) {
                    $temp_address = $address[0]['temp_address'][0];
                    $temp_state = $temp_address['state'];
                    $temp_city = $temp_address['city'];
                } else {
                    $temp_address = 0;
                    $temp_state = 0;
                    $temp_city = 0;
                }
                return view("admin.organisation_details", ['temp_id' => $address[0]['id'], 'uid' => $data, "organisation_name" => $organisation_name, "organisation_email" => $organisation_email, "temp_address" => $temp_address, "temp_city" => $temp_city, "temp_state" => $temp_state, "states" => $states]);
            }
        } else {
            return redirect('/login');
        }
    }
    public function organisation_confirmation(Request $request)
    {
        $data = $this->user();
        if ($data) {

            if ($request->temp_id != '') {

                $temp_address = TempOrganisation::with('temp_details', 'temp_email', 'temp_address')->where(["id" => $request->temp_id])->first();
                $address = $temp_address->toArray();
                //    print_r($address);
                //             die();
                if (empty($address['temp_address'])) {
                    $request_array = array(
                        'uid' => $data,
                        'door_no' => $request->door_no,
                        'building_name' => $request->building_name,
                        'street' => $request->street,
                        'landmark' => $request->landmark,
                        'pincode' => $request->pincode,
                        'state' => $request->state,
                        'city' => $request->city,
                        'district' => $request->district,
                        'area' => $request->area,
                        'organisation_name' => $request->organisation_name,
                        'organisation_email' => $request->organisation_email,
                        'temp_id' => $request->temp_id
                    );

                    $response = Http::post(config('api_base') . 'temp_organisation_stage_two', $request_array);
                    $datumn = $response->json();



                    if ($response->status() == 200) {
                        if (isset($datumn['param'])) {
                            $params = $datumn['param'];
                            $temp_id = $datumn['param']['temp_id'];
                        } else {
                            $params = "";
                            $temp_id = "";
                        }



                        return view("admin.organisation_confirmation", [
                            'uid' => $data,
                            'door_no' => $request->door_no,
                            'building_name' => $request->building_name,
                            'street' => $request->street,
                            'landmark' => $request->landmark,
                            'pincode' => $request->pincode,
                            'state' => $request->state,
                            'city' => $request->city,
                            'district' => $request->district,
                            'area' => $request->area,
                            'organisation_name' => $request->organisation_name,
                            'organisation_email' => $request->organisation_email,
                            'temp_id' => $temp_id
                        ]);
                    } else {
                        $error = "";
                        if (isset($datumn['message'])) {
                            $error = $datumn['message'];
                        } else if (isset($datumn['errors'])) {
                            $error = $datumn['errors'];
                        }
                        return redirect()->back()->withErrors(['failure' => $error]);
                    }
                } else {
                    return view("admin.organisation_confirmation", [
                        'uid' => $data,
                        'door_no' => $request->door_no,
                        'building_name' => $request->building_name,
                        'street' => $request->street,
                        'landmark' => $request->landmark,
                        'pincode' => $request->pincode,
                        'state' => $request->state,
                        'city' => $request->city,
                        'district' => $request->district,
                        'area' => $request->area,
                        'organisation_name' => $request->organisation_name,
                        'organisation_email' => $request->organisation_email,
                        'temp_id' => $request->temp_id,
                    ]);
                }
            } else {
                return view("admin.organisation_confirmation", [
                    'uid' => $data,
                    'door_no' => $request->door_no,
                    'building_name' => $request->building_name,
                    'street' => $request->street,
                    'landmark' => $request->landmark,
                    'pincode' => $request->pincode,
                    'state' => $request->state,
                    'city' => $request->city,
                    'district' => $request->district,
                    'area' => $request->area,
                    'organisation_name' => $request->organisation_name,
                    'organisation_email' => $request->organisation_email,
                    'temp_id' => "",
                ]);
            }
        } else {
            return redirect('/login');
        }
    }
    public function my_account()
    {
        $data = $this->user();
        if ($data) {

            
            return view("admin.my_account");
        } else {
            return redirect('/login');
        }
    }






    public function get_cities(Request $request)
    {
        $state_id = $request->state_id;
        $cities = City::where('state_id', $state_id)->get()->toArray();
        echo json_encode($cities);
    }


    public function user_organisation(Request $request)
    {
        $data = $this->user();
        if ($data) {

            if ($request->temp_id != '') {
                $request_array = array(
                    'uid' => $data,
                    'organisation_admin' => 2,
                    'temp_id' => $request->temp_id
                );

                $response = Http::post(config('api_base') . 'temp_organisation_stage_three', $request_array);
                $datumn = $response->json();

                // print_r($datumn);
                //     die();

                if ($response->status() == 200) {
                    if (isset($datumn['param'])) {
                        $params = $datumn['param'];
                        $temp_id = $datumn['param']['temp_id'];
                    } else {
                        $params = "";
                        $temp_id = "";
                    }

                    return view("admin.user_organisation", [
                        'uid' => $data,
                        'door_no' => $request->door_no,
                        'building_name' => $request->building_name,
                        'street' => $request->street,
                        'landmark' => $request->landmark,
                        'pincode' => $request->pincode,
                        'state' => $request->state,
                        'city' => $request->city,
                        'district' => $request->district,
                        'area' => $request->area,
                        'organisation_name' => $request->organisation_name,
                        'organisation_email' => $request->organisation_email,
                        'organisation_admin' => 0,
                        'organisation_client' => 1,
                        'temp_id' => $temp_id,
                    ]);
                } else {
                    $error = "";
                    if (isset($datumn['message'])) {
                        $error = $datumn['message'];
                    } else if (isset($datumn['errors'])) {
                        $error = $datumn['errors'];
                    }
                    return redirect()->back()->withErrors(['failure' => $error]);
                }
            } else {
                return view("admin.user_organisation", [
                    'uid' => $data,
                    'door_no' => $request->door_no,
                    'building_name' => $request->building_name,
                    'street' => $request->street,
                    'landmark' => $request->landmark,
                    'pincode' => $request->pincode,
                    'state' => $request->state,
                    'city' => $request->city,
                    'district' => $request->district,
                    'area' => $request->area,
                    'organisation_name' => $request->organisation_name,
                    'organisation_email' => $request->organisation_email,
                    'organisation_admin' => 0,
                    'organisation_client' => 1,
                    'temp_id' => "",
                ]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function admin_organisation(Request $request)
    {
        $data = $this->user();
        if ($data) {

            if ($request->temp_id != '') {

                $temp_admin = TempOrganisation::with('temp_admin')->where(["id" => $request->temp_id])->first();
                $admin = $temp_admin->toArray();
                if (empty($admin['temp_admin'])) {
                    $request_array = array(
                        'uid' => $data,
                        'organisation_admin' => 1,
                        'temp_id' => $request->temp_id
                    );

                    $response = Http::post(config('api_base') . 'temp_organisation_stage_three', $request_array);
                    $datumn = $response->json();

                    // print_r($datumn);
                    //     die();

                    if ($response->status() == 200) {
                        if (isset($datumn['param'])) {
                            $params = $datumn['param'];
                            $temp_id = $datumn['param']['temp_id'];
                        } else {
                            $params = "";
                            $temp_id = "";
                        }

                        return view("admin.admin_organisation", [
                            'uid' => $data,
                            'door_no' => $request->door_no,
                            'building_name' => $request->building_name,
                            'street' => $request->street,
                            'landmark' => $request->landmark,
                            'pincode' => $request->pincode,
                            'state' => $request->state,
                            'city' => $request->city,
                            'district' => $request->district,
                            'area' => $request->area,
                            'organisation_name' => $request->organisation_name,
                            'organisation_email' => $request->organisation_email,
                            "organisation_name" => $request->organisation_name,
                            "organisation_email" => $request->organisation_email,
                            'organisation_admin' => 1,
                            'organisation_client' => 0,
                            'temp_id' => $temp_id
                        ]);
                    } else {
                        $error = "";
                        if (isset($datumn['message'])) {
                            $error = $datumn['message'];
                        } else if (isset($datumn['errors'])) {
                            $error = $datumn['errors'];
                        }
                        return redirect()->back()->withErrors(['failure' => $error]);
                    }
                } else {
                    return view("admin.admin_organisation", [
                        'uid' => $data,
                        'door_no' => $request->door_no,
                        'building_name' => $request->building_name,
                        'street' => $request->street,
                        'landmark' => $request->landmark,
                        'pincode' => $request->pincode,
                        'state' => $request->state,
                        'city' => $request->city,
                        'district' => $request->district,
                        'area' => $request->area,
                        'organisation_name' => $request->organisation_name,
                        'organisation_email' => $request->organisation_email,
                        "organisation_name" => $request->organisation_name,
                        "organisation_email" => $request->organisation_email,
                        'organisation_admin' => 1,
                        'organisation_client' => 0,
                        'temp_id' => $request->temp_id,
                    ]);
                }
            } else {
                return view("admin.admin_organisation", [
                    'uid' => $data,
                    'door_no' => $request->door_no,
                    'building_name' => $request->building_name,
                    'street' => $request->street,
                    'landmark' => $request->landmark,
                    'pincode' => $request->pincode,
                    'state' => $request->state,
                    'city' => $request->city,
                    'district' => $request->district,
                    'area' => $request->area,
                    'organisation_name' => $request->organisation_name,
                    'organisation_email' => $request->organisation_email,
                    "organisation_name" => $request->organisation_name,
                    "organisation_email" => $request->organisation_email,
                    'organisation_admin' => 1,
                    'organisation_client' => 0,
                    'temp_id' => "",
                ]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function gst_form(Request $request)
    {
        $data = $this->user();
        if ($data) {

            // dd($request->all());
            if ($request->temp_id != '') {
                //dhana changes
                $temp_details = TempOrganisation::with('temp_details')->where(["id" => $request->temp_id])->first();
                // $details = $temp_details->toArray();

                $organisation_gst = ($temp_details->temp_details) ? $temp_details->temp_details['organisation_gst'] : "";
                $organisation_pan = ($temp_details->temp_details) ? $temp_details->temp_details['organisation_pan'] : "";

                if ($organisation_gst == '' || $organisation_pan == '') {

                    $request_array = array(
                        'uid' => $data,
                        'stage' => 4,
                        'temp_id' => $request->temp_id
                    );

                    $response = Http::post(config('api_base') . 'temp_organisation_stage_four', $request_array);
                    $datumn = $response->json();



                    if ($response->status() == 200) {
                        if (isset($datumn['param'])) {
                            $params = $datumn['param'];
                            $temp_id = $datumn['param']['temp_id'];
                        } else {
                            $params = "";
                            $temp_id = "";
                        }

                        return view("admin.gst_form", [
                            'uid' => $data,
                            'door_no' => $request->door_no,
                            'building_name' => $request->building_name,
                            'street' => $request->street,
                            'landmark' => $request->landmark,
                            'pincode' => $request->pincode,
                            'state' => $request->state,
                            'city' => $request->city,
                            'district' => $request->district,
                            'area' => $request->area,
                            'organisation_name' => $request->organisation_name,
                            'organisation_email' => $request->organisation_email,
                            'organisation_admin' => $request->organisation_admin,
                            'organisation_client' => $request->organisation_client,
                            'organisation_gst' => "",
                            'organisation_pan' => "",
                            'temp_id' => $temp_id
                        ]);
                    } else {
                        $error = "";
                        if (isset($datumn['message'])) {
                            $error = $datumn['message'];
                        } else if (isset($datumn['errors'])) {
                            $error = $datumn['errors'];
                        }
                        return redirect()->back()->withErrors(['failure' => $error]);
                    }
                } else {
                    return view("admin.gst_form", [
                        'uid' => $data,
                        'door_no' => $request->door_no,
                        'building_name' => $request->building_name,
                        'street' => $request->street,
                        'landmark' => $request->landmark,
                        'pincode' => $request->pincode,
                        'state' => $request->state,
                        'city' => $request->city,
                        'district' => $request->district,
                        'area' => $request->area,
                        'organisation_name' => $request->organisation_name,
                        'organisation_email' => $request->organisation_email,
                        'organisation_admin' => $request->organisation_admin,
                        'organisation_client' => $request->organisation_client,
                        'temp_id' => "",
                        'organisation_gst' => $organisation_gst,
                        'organisation_pan' => $organisation_pan,
                    ]);
                }
            } else {
                return view("admin.gst_form", [
                    'uid' => $data,
                    'door_no' => $request->door_no,
                    'building_name' => $request->building_name,
                    'street' => $request->street,
                    'landmark' => $request->landmark,
                    'pincode' => $request->pincode,
                    'state' => $request->state,
                    'city' => $request->city,
                    'district' => $request->district,
                    'area' => $request->area,
                    'organisation_name' => $request->organisation_name,
                    'organisation_email' => $request->organisation_email,
                    'organisation_admin' => $request->organisation_admin,
                    'organisation_client' => $request->organisation_client,
                    'temp_id' => "",
                    'organisation_gst' => "",
                    'organisation_pan' => "",
                ]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function organisation_form(Request $request)
    {
        $data = $this->user();
        if ($data) {
            $states = State::where('country_id', 101)->get()->toArray();
            if ($request->temp_id != '') {
                $request_array = array(
                    'uid' => $data,
                    'temp_id' => $request->temp_id,
                    'door_no' => $request->door_no,
                    'building_name' => $request->building_name,
                    'street' => $request->street,
                    'landmark' => $request->landmark,
                    'pincode' => $request->pincode,
                    'state' => $request->state,
                    'city' => $request->city,
                    'district' => $request->district,
                    'area' => $request->area,
                    'organisation_name' => $request->organisation_name,
                    'organisation_email' => $request->organisation_email,
                    'organisation_admin' => $request->organisation_admin,
                    'organisation_client' => $request->organisation_client,
                    'gst' => $request->gst,
                    'pan' => $request->pan,
                    'organisation_website' => "",
                    "doc_type" => "",
                    "doc_no" => "",
                    "doc_validity" => "",
                    "attachment" => "",
                );

                $response = Http::post(config('api_base') . 'temp_organisation_stage_five', $request_array);
                $datumn = $response->json();
                // print_r($datumn);
                //  die();

                if ($response->status() == 200) {
                    if (isset($datumn['param'])) {
                        $params = $datumn['param'];
                        $temp_id = $datumn['param']['temp_id'];
                    } else {
                        $params = "";
                        $temp_id = "";
                    }

                    return view("admin.organisation_form", [
                        'uid' => $data,
                        'door_no' => $request->door_no,
                        'building_name' => $request->building_name,
                        'street' => $request->street,
                        'landmark' => $request->landmark,
                        'pincode' => $request->pincode,
                        'state' => $request->state,
                        'city' => $request->city,
                        'district' => $request->district,
                        'area' => $request->area,
                        'organisation_name' => $request->organisation_name,
                        'organisation_email' => $request->organisation_email,
                        'organisation_admin' => $request->organisation_admin,
                        'organisation_client' => $request->organisation_client,
                        'gst' => $request->gst,
                        'pan' => $request->pan,
                        'organisation_website' => "",
                        "doc_type" => "",
                        "doc_no" => "",
                        "doc_validity" => "",
                        "attachment" => "",
                        "temp_id" => $temp_id,
                        "states" => $states
                    ]);
                } else {
                    $error = "";
                    if (isset($datumn['message'])) {
                        $error = $datumn['message'];
                    } else if (isset($datumn['errors'])) {
                        $error = $datumn['errors'];
                    }
                    return redirect()->back()->withErrors(['failure' => $error]);
                }
            } else {
                $details = Organisation::with('mobile', 'email', 'details', 'address', 'identities', 'web')->where("uid", $data)->get();
                $result = $details->toArray();
                // dd($result);
                return view("admin.organisation_form", [
                    'uid' => $data,
                    'door_no' => $request->door_no,
                    'building_name' => $request->building_name,
                    'street' => $request->street,
                    'landmark' => $request->landmark,
                    'pincode' => $request->pincode,
                    'state' => $request->state,
                    'city' => $request->city,
                    'district' => $request->district,
                    'area' => $request->area,
                    'organisation_name' => $request->organisation_name,
                    'organisation_email' => $request->organisation_email,
                    'organisation_admin' => $request->organisation_admin,
                    'organisation_client' => $request->organisation_client,
                    'gst' => $request->gst,
                    'pan' => $request->pan,
                    'organisation_website' => "",
                    "doc_type" => "",
                    "doc_no" => "",
                    "doc_validity" => "",
                    "attachment" => "",
                    "temp_id" => "",
                    "states" => $states
                ]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function organisation_submit(Request $request)
    {
        // print_r($request->all());
        $data = $this->user();
        if ($data) {
            $temp_id = $request->temp_id;
            $states = State::where('country_id', 101)->get()->toArray();
            if ($request->hasfile('doc_file')) {
                $this->validate($request, [
                    'doc_file' => 'required',
                    'doc_file.*' => 'mimetypes:image/jpg'
                ]);
                $image = $request->file('doc_file');
                $extension = strtolower($image->getClientOriginalExtension());
                $uniqueName = md5($image . time());
                $uploadSuccess = $image->move(base_path() . "/public/assets/organisation/", $uniqueName . '.' . $extension);
                if ($uploadSuccess) {
                    $attachment =  url('/') . '/assets/organisation/' . $uniqueName . '.' . $extension;
                } else {
                    $attachment = OrganisationIdentities::where('uid', $data)->first('attachment');
                }
            } else {
                $attachment = OrganisationIdentities::where('uid', $data)->first('attachment');
            }

            $request_array = [
                "organisation_name" => $request['organisation_name'],
                "organisation_email" => $request['organisation_email'],
                "organisation_pan" => $request['organisation_pan'],
                "organisation_gstin" => $request['organisation_gstin'],
                "organisation_website" => $request['organisation_website'],
                "organisation_admin" => $request['organisation_admin'],
                "organisation_client" => $request['organisation_client'],
                "door_no" => $request['door_no'],
                "building_name" => $request['building_name'],
                "street" => $request['street'],
                "landmark" => $request['landmark'],
                "pincode" => $request['pincode'],
                "state" => $request['state'],
                "city" => $request['city'],
                "district" => $request['district'],
                "area" => $request['area'],
                "doc_type" => $request['doc_type'],
                "doc_no" => $request['doc_no'],
                "doc_validity" => $request['doc_validity'],
                "attachment" => $attachment,
                "uid" => $data,
                "states" => $states
            ];
            $response = Http::post(config('api_base') . 'submit_organisation', $request_array);
            $datumn = $response->json();
            // print_r($datumn);
            // die();
            if ($response->status() == 200) {
                if (isset($datumn['param'])) {
                    $params = $datumn['param'];
                } else {
                    $params = "";
                }
                return view("admin.organisation_form", [
                    'success' => "Organisation Created Successfuly",
                    "organisation_name" => $request['organisation_name'],
                    "organisation_email" => $request['organisation_email'],
                    "pan" => $request['organisation_pan'],
                    "gst" => $request['organisation_gstin'],
                    "organisation_website" => $request['organisation_website'],
                    "door_no" => $request['door_no'],
                    "building_name" => $request['building_name'],
                    "street" => $request['street'],
                    "landmark" => $request['landmark'],
                    "pincode" => $request['pincode'],
                    "state" => $request['state'],
                    "city" => $request['city'],
                    "district" => $request['district'],
                    "area" => $request['area'],
                    "organisation_admin" => $request['organisation_admin'],
                    "organisation_client" => $request['organisation_client'],
                    "doc_type" => $request['doc_type'],
                    "doc_no" => $request['doc_no'],
                    "doc_validity" => $request['doc_validity'],
                    "attachment" => $attachment, "temp_id" => $temp_id,
                    "states" => $states
                ]);
            } else {
                $error = "";
                if (isset($datumn['message'])) {
                    $error = $datumn['message'];
                } else if (isset($datumn['errors'])) {
                    $error = $datumn['errors'];
                }

                return view("admin.organisation_form", [
                    'failure' => $error,
                    "organisation_name" => $request['organisation_name'],
                    "organisation_email" => $request['organisation_email'],
                    "pan" => $request['organisation_pan'],
                    "gst" => $request['organisation_gstin'],
                    "organisation_website" => $request['organisation_website'],
                    "door_no" => $request['door_no'],
                    "building_name" => $request['building_name'],
                    "street" => $request['street'],
                    "landmark" => $request['landmark'],
                    "pincode" => $request['pincode'],
                    "state" => $request['state'],
                    "city" => $request['city'],
                    "district" => $request['district'],
                    "area" => $request['area'],
                    "organisation_admin" => $request['organisation_admin'],
                    "organisation_client" => $request['organisation_client'],
                    "doc_type" => $request['doc_type'],
                    "doc_no" => $request['doc_no'],
                    "doc_validity" => $request['doc_validity'],
                    "attachment" => $attachment,
                    "states" => $states
                ]);
            }
        } else {
            return redirect('/login');
        }
    }


    public function user()
    {
        $bearerToken = Session::get('token');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $bearerToken
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
}
