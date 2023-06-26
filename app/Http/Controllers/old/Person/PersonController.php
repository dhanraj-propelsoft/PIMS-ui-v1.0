<?php

namespace App\Http\Controllers\Person;

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
use App\Models\PersonMobile;
use App\Models\PersonEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    /*If Enter Mobile NUmber Chaeck This Function At users/tempusers/personMobile*/
    function check(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'mobileNumber' => 'required|numeric|digits:10'
            ]
        );
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors());
        } else {

            $ip = $request->ip();
            $response = Http::post(config('api_base') . 'findMobileNumber', ["mobileNumber" => $request->mobileNumber, 'ip' => $ip]);

            $data = $response->json();

            if ($response->status() == 200) {
                $result = $data['data'];

                if ($result['type'] == 0) {
                    return view('wizard.email', ['mobile' => $result['mobileNumber']]);
                } else if ($data['message'] == "New_person") {
                    $params = $data['param'];
                    return redirect()->route('stage2', ['mobile' => $params['mobile']]);
                } else if ($data['message'] == "check_email") {
                    $params = $data['param'];
                    return view('wizard.email', ['mobile' => $params['mobile']]);
                } else {
                    $params = "";
                }
                return redirect()->route($data['route'], $params);
            } else {
                return redirect()->back()->withErrors(['mobile' => $data['message']]);
            }
        }
    }
    /* Enter Email Page */
    function temp_stage2(Request $request, $mobile)
    {
        return view("wizard.email_page", ['mobile' => $mobile]);
    }
    function temp_stage3(Request $request)
    {
        if ($request->mobile == '') {
            return redirect()->back()->withErrors(['mobile' => 'Mobile Number Required']);
        } else {
            $response = Http::post(config('api_base') . 'check_confirmation', ["mobile" => $request->mobile]);
            $data = $response->json();
            if ($response->status() == 200) {

                if (isset($data['param'])) {
                    $params = $data['param'];
                } else {
                    $params = "";
                }
                return redirect()->route($data['route'], $params);
            } else {
                return redirect()->back()->withErrors(['mobile' => $data['message']]);
            }
        }
    }
    function update_temp(Request $request)
    {

        if ($request->email == '') {
            return redirect()->back()->withErrors(['email' => 'Email Required']);
        } else {
            $email_check = Http::post(config('api_base') . 'check_for_email', ["email" => $request->email]);
            $datumn = $email_check->json();

            if ($email_check->status() == 200) {
                if ($datumn['param']) {
                    $result = $datumn['param'];
                } else {
                    $result = "";
                }
                $error = "This Email Already Exists,Try New One";
                return redirect()->back()->withErrors(['email' => $error]);
            } else {
                $response = Http::post(config('api_base') . 'temp_update', ["mobile" => $request->mobile, "email" => $request->email]);
                $data = $response->json();
                if ($response->status() == 200) {
                    if ($data['param']) {
                        $params = $data['param'];
                    } else {
                        $params = "";
                    }
                    return redirect()->route($data['route'], $params);
                } else {
                    $error = "";
                    if (isset($data['message'])) {
                        $error = $data['message'];
                    } else if (isset($data['errors'])) {
                        $error = $data['errors'];
                    }
                    return redirect()->back()->withErrors(['email' => $error]);
                }
            }
        }
    }
    function confirmation(Request $request)
    {
        $email = $request->email;
        $mobile = $request->mobile;
        return view("wizard.confirmation", ['email' => $email, 'mobile' => $mobile]);
    }

    function registration(Request $request)
    {
        if ($request->email && $request->mobile) {
            $email = $request->email;
            $mobile = $request->mobile;
            return view("wizard.registration", ['email' => $email, 'mobile' => $mobile]);
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }
    public function check_email(Request $request)
    {

        $mobile = $request->mobile;
        return view('wizard.email', ['mobile' => $mobile]);
    }

    public function person_check_email(Request $request)
    {

        $response = apiHeaders()->post(config('api_base') . 'findEmail', ["mobile" => $request->mobile, "email" => $request->email]);
        $data = $response->json();

        if ($response->status() == 200) {
            $result = $data['data'];
            if ($result['type'] == 0) {
                return view('Wizard.person_confirm', ['mobile' => $request->mobile, 'email' => $result['email']]);
            } else {
                $params = "";
            }
            return redirect()->route($data['route'], $params);
        }
    }
    public function Personal_datas(Request $request)
    {
        dd($request->all());
    }

    public function mobile_otp(Request $request)
    {
        $uid = $request->uid;
        $email = $request->email;
        $mobile = $request->mobile;
        $Phone = substr($mobile, 0, 4) . "****" . substr($mobile, 7, 4);

        return view('Wizard.mobile_otp', ['mobile' => $mobile, 'uid' => $uid, 'email' => $email, 'Phone' => $Phone]);
    }
    public function update_person(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'mobile' => 'required',
        ]);
        $response = Http::get(config('api_base') . 'getSalutation');
        $data = $response->json();

        if ($response->status() == 200) {
            $salutations = $data['data'];
            return view("wizard.registration_account", ['mobile' => $request->mobile, 'email' => $request->email, 'salutations' => $salutations]);
        } else {
            $error = "";
            if (isset($data['message'])) {
                $error = $data['message'];
            } else if (isset($data['errors'])) {
                $error = $data['errors'];
            }
            return redirect()->back()->withErrors(['email' => $error]);
        }
    }

    public function basic_details(Request $request)
    {

        $salutation_id = $request->salutation;
        $firstName = $request->first_name;
        $middleName = $request->middle_name;
        $lastName = $request->last_name;
        $nickName = $request->nick_name;
        $mobile = $request->mobile;
        $email = $request->email;
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'salutation' => 'required',
            ]);
            $response = Http::get(config('api_base') . 'getCommonData');
            $data = $response->json();

            if ($response->status() == 200) {
                $gender = $data['gender'];
                $bloodGroup = $data['bloodgroup'];

                return view("wizard.registration_basic", ['gender' => $gender, 'blood' => $bloodGroup, 'salutation_id' => $salutation_id, 'firstName' => $firstName, 'middleName' => $middleName, 'lastName' => $lastName, 'nickName' => $nickName, 'mobile' => $mobile, 'email' => $email]);
            } else {
                $error = "";
                if (isset($data['message'])) {
                    $error = $data['message'];
                } else if (isset($data['errors'])) {
                    $error = $data['errors'];
                }
                return redirect()->back()->withErrors(['saluation' => $error]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }

    public function registration_basic(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $response = Http::get(config('api_base') . 'get_gender_and_blood_group');
            $data = $response->json();
            if ($response->status() == 200) {
                if ($data['param']) {
                    $params = $data['param'];
                }
                return view("wizard.registration_basic", ['gender' => $params['gender'], 'blood' => $params['blood'], 'uid' => $request->uid]);
            } else {
                $error = "";
                if (isset($data['message'])) {
                    $error = $data['message'];
                } else if (isset($data['errors'])) {
                    $error = $data['errors'];
                }
                return redirect()->back()->withErrors(['gender' => $error]);
            }
        }
    }

    public function basic_details1(Request $request)
    {
        dd($request->all());
        if ($request->isMethod('post')) {
            $request->validate([
                'gender' => 'required',
                'blood_group' => 'required',
                'dob' => 'required',
            ]);

            $response = Http::post(config('api_base') . 'person_details_stage2', ["uid" => $request->uid, "gender" => $request->gender, "blood_group" => $request->blood_group, "dob" => $request->dob]);
            $data = $response->json();

            if ($response->status() == 200) {
                if ($data['param']) {
                    $params = $data['param'];
                } else {
                    $params = "";
                }
                $res = Http::get(config('api_base') . 'get_mobile', ['uid' => $request->uid]);
                $datumn = $res->json();
                if ($res->status() == 200) {
                    if ($datumn['param']) {
                        $params = $datumn['param'];
                    }
                    if ($params['mobile'] != '') {
                        $m = $params['mobile'];
                    } else {
                        $m = "";
                    }
                    return view("wizard.registration_otp", ['uid' => $request->uid, 'mobile' => $m]);
                } else {
                    $error = "";
                    if (isset($datumn['message'])) {
                        $error = $datumn['message'];
                    } else if (isset($datumn['errors'])) {
                        $error = $datumn['errors'];
                    }
                    return redirect()->back()->withErrors(['gender' => $error]);
                }
            } else {
                $error = "";
                if (isset($data['message'])) {
                    $error = $data['message'];
                } else if (isset($data['errors'])) {
                    $error = $data['errors'];
                }
                return redirect()->back()->withErrors(['gender' => $error]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }

    public function create_password(Request $request)
    {
        $uid = $request->uid;
        return view("wizard.registration_password", ['uid' => $uid]);
    }
    public function create_person(Request $request)
    {

        return view('wizard.registration', ['mobile' => $request->mobile, 'email' => $request->email]);
    }
    public function form_submit(Request $request)
    {
        if ($request->isMethod('post')) {

            $response = Http::post(config('api_base') . 'create_user', ["uid" => $request->uid, "password_confirmation" => $request->password_confirmation, "password" => $request->password]);
            $data = $response->json();
            if ($response->status() == 200) {
                if ($data['param']) {
                    $params = $data['param'];

                    $token = $this->form_login($params['mobile'], $params['password']);
                    // print_r($token);
                    // die();
                    if ($token) {
                        return view("wizard.profile", ['uid' => $request['uid']]);
                    }
                }
            } else {
                $error = "";
                if (isset($data['message'])) {
                    $error = $data['message'];
                } else if (isset($data['errors'])) {
                    $error = $data['errors'];
                }
                return redirect()->back()->withErrors(['password_confirmation' => $error]);
            }
        } else {
            return view("wizard.registration_password", ['uid' => $request['uid']]);
        }
    }


    function form_login($username, $password)
    {
        $response = Http::post(config('api_base') . 'login', ["username" => $username, "password" => $password]);
        $data = $response->json();
        if ($response->status() == 200) {
            Session::put('token', $data['token']);
            if (Session::get('token')) {
                return Session::get('token');
            }
        } else {
            $error = "";
            if (isset($data['message'])) {
                $error = $data['message'];
            } else if (isset($data['errors'])) {
                $error = $data['errors'];
            }
            return $error;
        }
    }


    public function upload_pic(Request $request)
    {
        if ($request->hasfile('profilePhoto')) {
            $this->validate($request, [
                'profilePhoto' => 'required',
                'profilePhoto.*' => 'mimetypes:image/jpg'
            ]);


            $image = $request->file('profilePhoto');
            $extension = strtolower($image->getClientOriginalExtension());
            $uniqueName = md5($image . time());
            $uploadSuccess = $image->move(base_path() . "/public/assets/profile/", $uniqueName . '.' . $extension);
            if ($uploadSuccess) {
                $file =  url('/') . '/assets/profile/' . $uniqueName . '.' . $extension;
                $response = Http::post(config('api_base') . 'upload_pic', ["file" => $file, "uid" => $request->uid]);
                $data = $response->json();

                if ($response->status() == 200) {

                    $res = Http::post(config('api_base') . 'person_details_by_uid', ['uid' => $request->uid]);
                    $data = $res->json();
                    if ($res->status() == 200) {
                        if ($data['param']) {
                            $params = $data['param'];
                            return view("wizard.edit_profile", ['result' => $params['result'], 'states' => $params['states'], 'uid' => $request->uid]);
                        }
                    } else {
                        $error = "";
                        if (isset($data['message'])) {
                            $error = $data['message'];
                        } else if (isset($data['errors'])) {
                            $error = $data['errors'];
                        }
                        return redirect()->back()->withErrors(['profile' => $error]);
                    }
                } else {
                    $error = "";
                    if (isset($data['message'])) {
                        $error = $data['message'];
                    } else if (isset($data['errors'])) {
                        $error = $data['errors'];
                    }
                    return redirect()->back()->withErrors(['profile' => $error]);
                }
            } else {
                // return redirect()->back()->withErrors(['profilePhoto' => "Required"]);
                return redirect()->route('edit_profile', ['uid' => $request->uid]);
            }
        }
    }

    public function get_cities(Request $request)
    {
        $state_id = $request->state_id;
        $res = Http::post(config('api_base') . 'get_cities_by_state', ['state_id' => $state_id]);
        $data = $res->json();
        echo json_encode($data['param']['states']);
    }


    public function complete_profile(Request $request)
    {

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'mobile' => 'required',
                'email' => 'required',
                'dob' => 'required',
                'home_address' => 'required',
            ]);
            if ($request->hasfile('profilePhoto')) {
                $this->validate($request, [
                    'profilePhoto' => 'required',
                    'profilePhoto.*' => 'mimetypes:image/*'
                ]);
                $image = $request->file('profilePhoto');
                $extension = strtolower($image->getClientOriginalExtension());
                $uniqueName = md5($image . time());
                $uploadSuccess = $image->move(base_path() . "/public/assets/Upload/", $uniqueName . '.' . $extension);
                if ($uploadSuccess) {
                    $file = storage_path("/") . '/' . $uniqueName . '.' . $extension;
                } else {
                    $file = "";
                }
            } else {
                $file = "";
            }
            $response = Http::post(config('api_base') . 'complete_profile', ["file" => $file, "uid" => $request->uid, "first_name" => $request->name, "dob" => $request->dob, "family_name" => $request->family_name, "email" => $request->email, "mobile" => $request->mobile, "home_address" => $request->home_address, "office_address" => $request->office_address]);
            $data = $response->json();
            // echo "<pre>";
            // print_r($response);
            // die();

            if ($response->status() == 200) {
                if ($data['param']) {
                    $params = $data['param'];
                } else {
                    $params = "";
                }
                return redirect()->route('organisation', ['uid' => $request->uid]);
            } else {
                $error = "";
                if (isset($data['message'])) {
                    $error = $data['message'];
                } else if (isset($data['errors'])) {
                    $error = $data['errors'];
                }
                return redirect()->back()->withErrors(['error' => $error]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }


    function account($uid)
    {
        $response = Http::post(config('api_base') . 'get_account_details', ['uid' => $uid]);
        $data = $response->json();
        if ($response->status() == 200) {
            if ($data['param']) {
                $params = $data['param'];
            }
            return view("wizard.choose_account", ['uid' => $uid, 'family_name' => $params['family_name'], 'first_name' => $params['first_name'], 'mobile' => $params['mobile']]);
        } else {
            $error = "";
            if (isset($data['message'])) {
                $error = $data['message'];
            } else if (isset($data['errors'])) {
                $error = $data['errors'];
            }
            return redirect()->back()->withErrors(['gender' => $error]);
        }
    }

    function person_confirmation(Request $request)
    {
        $uid = $request->uid;
        return view("wizard.person_confirmation", ['uid' => $uid]);
    }

    public function person_otp(Request $request)
    {

        $response = Http::post(config('api_base') . 'person_registration_otp', ["uid" => $request->uid]);
        $data = $response->json();
        // print_r($data);
        // die();
        if ($response->status() == 200) {
            if ($data['param']) {
                $params = $data['param'];
            } else {
                $params = "";
            }
            //      print_r($data[0]['mobile']);
            // die();
            return view("wizard.person_registration_otp", $params);
        } else {
            $error = "";
            if (isset($data['message'])) {
                $error = $data['message'];
            } else if (isset($data['errors'])) {
                $error = $data['errors'];
            }
            return redirect()->back()->withErrors(['password_confirmation' => $error]);
        }
        // $mobile = PersonMobile::where('uid', $request['uid'])->first();
        // return view("wizard.person_registration_otp", ['uid' => $request['uid'], 'mobile' => $mobile]);
    }

    public function person_details_update(Request $request)
    {
        $uid = $request->uid;
        return view("wizard.person_password", ['uid' => $uid]);
    }
    public function update_password(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);
            $password = $request->password;
            $password_confirmation = $request->password_confirmation;
            $uid = $request->uid;
            $response = Http::post(config('api_base') . 'update_password', ["password" => $password, "password_confirmation" => $password_confirmation, "uid" => $uid]);
            $data = $response->json();
            if ($response->status() == 200) {
                if ($data['param']) {
                    $params = $data['param'];
                } else {
                    $params = "";
                }
                return view("wizard.edit_profile", ['uid' => $request->uid, 'result' => $params['result'], 'states' => $params['states']]);
            } else {
                $error = "";
                if (isset($data['message'])) {
                    $error = $data['message'];
                } else if (isset($data['errors'])) {
                    $error = $data['errors'];
                }
                return redirect()->back()->withErrors(['password_confirmation' => $error]);
            }
        } else {
            return view("wizard.person_password", ['uid' => $request['uid']]);
        }
    }
    public function edit_profile(Request $request)
    {
        if ($request->isMethod('GET')) {

            $response = Http::post(config('api_base') . 'person_details_by_uid', ['uid' => $request->uid]);
            $data = $response->json();

            if ($response->status() == 200) {
                if ($data['param']) {
                    $params = $data['param'];
                    return view("wizard.profile_update", ['uid' => $request->uid, 'result' => $params['result'], 'states' => $params['states']]);
                }
            } else {
                $error = "";
                if (isset($data['message'])) {
                    $error = $data['message'];
                } else if (isset($data['errors'])) {
                    $error = $data['errors'];
                }
                return redirect()->back()->withErrors(['error' => $error]);
            }
        }
    }
    function forgot_password(Request $request)
    {
        $uid = PersonMobile::where('mobile', $request->mobile)->first('uid');
        $uuid = $uid->toArray();
        $person_email = PersonEmail::where('uid', $uuid['uid'])->first('email');
        $email = $person_email->toArray();
        $otp = substr(str_shuffle("0123456789"), 0, 5);
        $mail_email = $email['email'];
        $affectedRows = User::where("uid", $uuid['uid'])->update(["email_otp" => $otp, "email_otp_verified" => 0]);
        $template_data = ['email' => $email, 'otp' => $otp];
        //             print_r($template_data);
        // die();
        //send verification code
        Mail::send(
            ['html' => 'email.email_otp'],
            $template_data,
            function ($message) use ($mail_email) {
                $message->to($mail_email)
                    ->from('propelsoft@gmail.com', 'Email OTP')
                    ->subject('Password Reset');
            }
        );
        return view("wizard.email_otp", ['uid' => $uuid['uid'], 'email' => $email['email'], 'error' => '', 'success' => '']);
    }

    public function validate_otp(Request $request)
    {

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'otp' => 'required',
            ]);
            $db_user = User::where('uid', $request->uid)->first();
            $otp = $db_user->toArray();
            $db_otp = $otp['email_otp'];
            if ($db_otp == $request->otp) {
                return redirect()->route('reset_password', ['uid' => $request->uid]);
            } else {

                return view("wizard.email_otp", ['uid' => $request->uid, 'email' => $request->email, 'error' => 'OTP MISMATCHED...', 'success' => '']);
            }
            //return view("wizard.profile", ['uid' => $request['uid']]);
        }
    }
    function set_pasword(Request $request)
    {

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);
            $password = Hash::make($request['password']);
            $affectedRows = User::where("uid", $request['uid'])->update(["password" => $password]);
            $get_name = PersonDetails::where("uid", $request['uid'])->pluck('first_name')->first();
            $get_no = PersonMobile::where("uid", $request['uid'])->pluck('mobile')->first();
            if ($affectedRows > 0) {
                return view('wizard.login', ['name' => $get_name, 'mobile' => $get_no])->withErrors(["success" => 'Password updated successfully']);
            }
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }
    public function resend_email_otp(Request $request)
    {
        $uid = $request->uid;
        $email = $request->email;
        $res = Http::get(config('api_base') . 'get_email', ['uid' => $request->uid]);
        $datumn = $res->json();
        if ($res->status() == 200) {
            if ($datumn['param']) {
                $params = $datumn['param'];
            }
            if ($params['email'] != '') {
                $m = $params['email'];
            } else {
                $m = "";
            }
            $otp = substr(str_shuffle("0123456789"), 0, 5);
            $mail_email = $params['email']->email;
            $res = Http::post(config('api_base') . 'update_otp', ['uid' => $uid, "email_otp" => $otp, "email_otp_verified" => 0]);
            $datumn = $res->json();
            if ($res->status() == 200) {
                if ($datumn['param']) {
                    $params = $datumn['param'];
                }
                $template_data = ['email' => $email, 'otp' => $otp];
                //send verification code
                Mail::send(
                    ['html' => 'email.email_otp'],
                    $template_data,
                    function ($message) use ($mail_email) {
                        $message->to($mail_email)
                            ->from('propelsoft@gmail.com', 'Email OTP')
                            ->subject('Password Reset');
                    }
                );
                return view("wizard.email_otp", ['uid' => $uid, 'email' => $mail_email, 'error' => '', 'success' => 'OTP SEND SUCCESSFULLY']);
            } else {
                $error = "";
                if (isset($datumn['message'])) {
                    $error = $datumn['message'];
                } else if (isset($datumn['errors'])) {
                    $error = $datumn['errors'];
                }
                return redirect()->back()->withErrors(['email' => $error]);
            }
        } else {
            $error = "";
            if (isset($datumn['message'])) {
                $error = $datumn['message'];
            } else if (isset($datumn['errors'])) {
                $error = $datumn['errors'];
            }
            return redirect()->back()->withErrors(['email' => $error]);
        }
    }
    function reset_password($uid)
    {

        return view("entitlement.reset_password", ['uid' => $uid]);
    }
    function post_login(Request $request)
    {

        $response = Http::post(config('api_base') . 'userLogin', ["userName" => $request->username, "password" => $request->password]);
        $data = $response->json();

        $allDatas = $data['data'];

        if ($response->status() == 200) {
            Session::put('token', $allDatas['token']);
            if (Session::get('token')) {
                return redirect()->route('my_account');
            }
        } else if ($response->status() == 422) {

            return view('wizard.tryagain_password', ['name' => $data['username'], 'uid' => $data['uid']]);
        } else {
            // print_r($data);
            // die();
            $error = "";
            if (isset($data['message'])) {
                $error = $data['message'];
            } else if (isset($data['errors'])) {
                $error = $data['errors'];
            }

            return redirect()->back()->withErrors(['err' => $error]);
        }
    }
    public function tryagain_password($username, $uid, $mobile)
    {
        return view('wizard.tryagain_password', ['name' => $username, 'uid' => $uid, 'mobile' => $mobile]);
    }
    public function forget_password(Request $request, $uid)
    {
        $response = Http::post(config('api_base') . 'forgot_password', ['uid' => $uid]);
        $data = $response->json();
        if ($response->status() == 200) {
            if ($data['param']) {
                $params = $data['param'];
                $email = $params['email'];
                $em   = explode("@", $email);
                $name = implode('@', array_slice($em, 0, count($em) - 1));
                $len  = floor(strlen($name) / 2);
                $result = substr($name, 0, $len) . str_repeat('*', $len) . "@" . end($em);
                return view('Password.email_otp', ['uid' => $params['uid'], 'email' => $result]);
            }
        }
    }
    public function try_Again(Request $request, $name, $uid, $mobile)
    {
        dd('well');
    }

    public function signout(Request $request)
    {
        dd($request->all());
        $bearerToken = Session::get('token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $bearerToken
        ])->post(config('api_base') . 'logout/');
        dd($response);
        // $response->headers->set('Authorization', 'Bearer '.$bearerToken);
        $data = $response->json();
        if ($response->status() == 200) {
            Session::forget('token');
            Session::flush();
            Session::put('token', "");
            return redirect()->route('loginMobilePage');
            //return view('wizard.mobile_page');
        }
    }

    public function dashboard()
    {
        $data = $this->user();
        //dd($data);
        if ($data) {
            return view("admin.dashboard", ['uid' => $data]);
        } else {
            return redirect('/login');
        }
    }

    public function profile(Request $request)
    {
        $data = $this->user();
        if ($data) {
            // dd($data);
            $res = Http::get(config('api_base') . 'get_profile_details', ['uid' => $data]);
            $datumn = $res->json();
            if ($res->status() == 200) {
                if ($datumn['param']) {
                    $params = $datumn['param'];
                } else {
                    $params = "";
                }
                // dd($params['addressData']);
                return view("admin.new_profile", ['uid' => $data, 'result' => $params['result'], 'addressData' => $params['addressData'], 'gender' => $params['gender'], 'blood' => $params['blood'], 'saluations' => $params['saluations'], 'states' => $params['states'], 'address_of' => $params['address_of'], 'address' => $params['address']]);
            } else {
                $error = "";
                if (isset($datumn['message'])) {
                    $error = $datumn['message'];
                } else if (isset($datumn['errors'])) {
                    $error = $datumn['errors'];
                }
                return redirect()->back()->withErrors(['error' => $error]);
            }
        } else {
            return redirect('/login');
        }
    }
    public function save_profile(Request $request)
    {
        $uid = $this->user();
        if ($uid) {
            // print_r($data);
            // die();
            $datas = $request->all();
            $validator = Validator::make($request->all(), [
                'dob' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect('profile')
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasfile('profilePhoto')) {
                $this->validate($request, [
                    'profilePhoto' => 'required',
                    'profilePhoto.*' => 'mimetypes:image/*'
                ]);
                $image = $request->file('profilePhoto');
                $extension = strtolower($image->getClientOriginalExtension());
                $uniqueName = md5($image . time());
                $uploadSuccess = $image->move(base_path() . "/public/assets/profile/", $uniqueName . '.' . $extension);
                if ($uploadSuccess) {
                    $file =  'assets/profile/' . $uniqueName . '.' . $extension;
                } else {
                    $file = PersonDetails::where('uid', $uid)->first('profile_pic')->toArray();
                }
            } else {
                $file = PersonDetails::where('uid', $uid)->first('profile_pic')->toArray();
            }
            // dd($file);
            // $request_array = [
            //     "uid" => $request->uid,
            //     "saluation" => $request->saluation,
            //     "first_name" => $request->first_name,
            //     "middle_name" => $request->middle_name,
            //     "last_name" => $request->initial,
            //     "nick_name" => $request->nick_name,
            //     "dob" => $request->dob,
            //     "gender" => $request->gender,
            //     "blood_group" => $request->blood_group,
            //     "martial_status" => $request->martial_status,
            //     "aniversary_date" => $request->aniversary_date,
            //     "mother_tongue" => $request->mother_tongue,
            //     "birth_city"=>$request->birth_city,
            //     "other_language" => implode(', ', $request->other_language),
            //     "profile_pic" => $file,
            // ];
            $response = apiHeaders()->post(config('api_base') . 'person_details_update', $datas);
            $datumn = $response->json();
            // $details = PersonDetails::with('email', 'mobile', 'person', 'user', 'person_address_profile')->where("uid", $uid)->get();
            // $result = $details->toArray();
            if ($response->status() == 200) { } else {
                $error = "";
                if (isset($datumn['message'])) {
                    $error = $datumn['message'];
                } else if (isset($datumn['errors'])) {
                    $error = $datumn['errors'];
                }
                return redirect()->back()->withErrors(['failure' => $error]);
            }
        } else {
            return redirect('/login');
        }
    }


    public function save_profile_extra(Request $request)
    {

        $datas = $request->all();

        $data = $this->user();
        if ($data) {
            $validator = Validator::make($request->all(), [
                'primary_mobile' => 'required|regex:/[0-9]{9}/',
                'primary_email' => 'required|email',
                'address_of.*' => 'required',
                'door_no' => 'required',
                'bilding_name' => 'required',
                'street' => 'required',
                'land_mark' => 'required',
                'pincode' => 'required',
                'state' => 'required',
                'city' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('profile')
                    ->withErrors($validator)
                    ->withInput();
            }
            // $address_of = $request->address_of;
            // $door_no = $request->door_no;
            // $bilding_name = $request->bilding_name;
            // $street = $request->street;
            // $land_mark = $request->land_mark;
            // $pincode = $request->pincode;
            // $state = $request->state;
            // $city = $request->city;
            // $district = $request->district;
            // $area = $request->area;
            // $count = count($address_of);
            // for ($i = 0; $i < $count; $i++) {
            //     $request_array = [
            //         "uid" => $request->uid ? $request->uid : $data,
            //         "address_of" => $address_of[$i],
            //         "door_no" => $door_no[$i],
            //         "bilding_name" => $bilding_name[$i],
            //         "street" => $street[$i],
            //         "land_mark" => $land_mark[$i],
            //         "pincode" => $pincode[$i],
            //         "city" => $city[$i],
            //         "state" => $state[$i],
            //         "district" => $district[$i],
            //         "area" => $area[$i],
            //         "web_link" => $request->web_link
            //     ];   }
            $response = Http::post(config('api_base') . 'person_details_update_extra', ['datas' => $datas]);
            $datumn = $response->json();

            if ($response->status() == 200) {
                if ($datumn['param']) {
                    $params = $datumn['param'];
                } else {
                    $params = "";
                }
                return redirect('/profile');
                // return view("admin.edit_profile", ['success' => "Profile Updated Successfuly", 'uid' => $data, 'result' => $result, 'gender' => $gender, 'blood' => $blood, 'saluations' => $saluation]);
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
            return redirect('/login');
        }
    }

    public function storeMobile(Request $request)
    {
        $uid = $request->uid;
        $mobile_type = $request->mobile_type;
        $mobile = $request->mobile;
        $data = $this->user();
        if ($data) {

            $request_array = [
                "uid" => $uid,
                "mobile_type" => $mobile_type,
                "mobile" => $mobile,
            ];
            $response = Http::post(config('api_base') . 'store_mobile', $request_array);
            $datumn = $response->json();
            if ($response->status() == 200) {
                if (isset($datumn['param'])) {
                    $params = $datumn['param'];
                } else {
                    $params = "";
                }
                echo json_encode(1);
            } else {
                $error = "";
                if (isset($datumn['message'])) {
                    $error = $datumn['message'];
                } else if (isset($datumn['errors'])) {
                    $error = $datumn['errors'];
                }
                echo json_encode(0);
            }
        } else {
            return redirect('/login');
        }
    }


    public function makeAsPrimary(Request $request)
    {
        $uid = $request->uid;
        $primary = $request->primary;
        $other = $request->other;
        $data = $this->user();
        if ($data) {

            $request_array = [
                "uid" => $uid,
                "primary" => $primary,
                "other" => $other,
            ];
            $response = Http::post(config('api_base') . 'make_primary', $request_array);
            $datumn = $response->json();

            if ($response->status() == 200) {
                if (isset($datumn['param'])) {
                    $params = $datumn['param'];
                } else {
                    $params = "";
                }
                echo json_encode(1);
            } else {
                $error = "";
                if (isset($datumn['message'])) {
                    $error = $datumn['message'];
                } else if (isset($datumn['errors'])) {
                    $error = $datumn['errors'];
                }
                echo json_encode(0);
            }
        } else {
            return redirect('/login');
        }
    }

    public function DeleteOther(Request $request)
    {
        $data = $this->user();
        if ($data) {
            $request_array = [
                "uid" => $request->uid,
                "other" => $request->other,
            ];
            $response = Http::post(config('api_base') . 'delete_other', $request_array);
            $datumn = $response->json();
            if ($response->status() == 200) {
                if (isset($datumn['param'])) {
                    $params = $datumn['param'];
                } else {
                    $params = "";
                }
                echo json_encode(1);
            } else {
                $error = "";
                if (isset($datumn['message'])) {
                    $error = $datumn['message'];
                } else if (isset($datumn['errors'])) {
                    $error = $datumn['errors'];
                }
                echo json_encode(0);
            }
        } else {
            return redirect('/login');
        }
    }

    public function DeleteOtherEmail(Request $request)
    {
        $data = $this->user();
        if ($data) {
            $request_array = [
                "uid" => $request->uid,
                "other" => $request->other_email,
            ];
            $response = Http::post(config('api_base') . 'delete_other_email', $request_array);
            $datumn = $response->json();
            // print_r($request_array);
            // die();
            if ($response->status() == 200) {
                if (isset($datumn['param'])) {
                    $params = $datumn['param'];
                } else {
                    $params = "";
                }
                echo json_encode(1);
            } else {
                $error = "";
                if (isset($datumn['message'])) {
                    $error = $datumn['message'];
                } else if (isset($datumn['errors'])) {
                    $error = $datumn['errors'];
                }
                echo json_encode(0);
            }
        } else {
            return redirect('/login');
        }
    }

    public function SendEmailOtp(Request $request)
    {
        $mail_email = $request->email;
        $uid = $request->uid;
        $otp = "1234";
        //$otp = substr(str_shuffle("0123456789"), 0, 5);
        $affectedRows = User::where("uid", $uid)->update(["email_otp" => $otp, "email_otp_verified" => 0]);
        $template_data = ['email' => $mail_email, 'otp' => $otp];
        //             print_r($template_data);
        // die();
        //send verification code
        // Mail::send(
        //     ['html' => 'email.email_otp'],
        //     $template_data,
        //     function ($message) use ($mail_email) {
        //         $message->to("dhivakarmm@gmail.com")
        //             ->from('propelsoft@gmail.com', 'Email OTP')
        //             ->subject('Add Email');
        //     }
        // );
        echo json_encode($mail_email);
    }

    public function validate_email(Request $request)
    {
        $db_user = User::where('uid', $request['uid'])->first();
        $otp = $db_user->toArray();
        $db_otp = $otp['email_otp'];
        //    print_r($db_otp);
        if ($db_otp == $request['email_otp']) {
            $affectedRows = User::where("uid", $request['uid'])->update(["email_otp" => $request['email_otp'], "email_otp_verified" => "1"]);
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
    }


    public function VerifyEmailOtp(Request $request)
    {
        $db_user = User::where('uid', $request['uid'])->first();
        $otp = $db_user->toArray();
        $db_otp = $otp['email_otp'];
        if ($db_otp == $request['email_otp']) {
            $request_array = [
                "uid" => $request['uid'],
                "email" => $request['email'],
            ];
            $response = Http::post(config('api_base') . 'make_email_primary', $request_array);
            $datumn = $response->json();
            // print_r($datumn);
            // die();
            if ($response->status() == 200) {
                if (isset($datumn['param'])) {
                    $params = $datumn['param'];
                } else {
                    $params = "";
                }
                echo json_encode(1);
            } else {
                $error = "";
                if (isset($datumn['message'])) {
                    $error = $datumn['message'];
                } else if (isset($datumn['errors'])) {
                    $error = $datumn['errors'];
                }
                echo json_encode(0);
            }
        } else {
            echo json_encode(0);
        }
    }


    public function Make_primary_email(Request $request)
    {
        $db_user = User::where('uid', $request['uid'])->first();
        $otp = $db_user->toArray();
        $db_otp = $otp['email_otp'];
        if ($db_otp == $request['email_otp']) {
            $request_array = [
                "uid" => $request['uid'],
                "primary_email" => $request['primary_email'],
                "other_email" => $request['other_email'],
            ];
            $response = Http::post(config('api_base') . 'make_email_primary_secondary', $request_array);
            $datumn = $response->json();
            // print_r($datumn);
            // die();
            if ($response->status() == 200) {
                if (isset($datumn['param'])) {
                    $params = $datumn['param'];
                } else {
                    $params = "";
                }
                echo json_encode(1);
            } else {
                $error = "";
                if (isset($datumn['message'])) {
                    $error = $datumn['message'];
                } else if (isset($datumn['errors'])) {
                    $error = $datumn['errors'];
                }
                echo json_encode(0);
            }
        } else {
            echo json_encode(0);
        }
    }


    public function EmailSecondary(Request $request)
    {
        $request_array = [
            "uid" => $request['uid'],
            "email" => $request['email'],
        ];
        $response = Http::post(config('api_base') . 'make_email_secondary', $request_array);
        $datumn = $response->json();
        if ($response->status() == 200) {
            if (isset($datumn['param'])) {
                $params = $datumn['param'];
            } else {
                $params = "";
            }
            echo json_encode(1);
        } else {
            $error = "";
            if (isset($datumn['message'])) {
                $error = $datumn['message'];
            } else if (isset($datumn['errors'])) {
                $error = $datumn['errors'];
            }
            echo json_encode(0);
        }
    }


    protected function attemptLogin(Request $request)
    {
        //Try with email AND username fields
        if (
            Auth::guard('admin')->attempt([
                'mobile' => $request['username'],
                'password' => $request['password']
            ], $request->has('remember'))
            || Auth::guard('admin')->attempt([
                'email' => $request['username'],
                'password' => $request['password']
            ], $request->has('remember'))
        ) {
            return true;
        }
        return false;
    }

    protected function successfulLogin(Request $request)
    {
        // return redirect()->route('/home');
        return redirect()->route('admin.home');
    }

    protected function failedLogin(Request $request)
    {
        return redirect()->back()->withErrors(['password' => 'Incorrect password']);
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

    public function change_password(Request $request)
    {
        $data = $this->user();
        if ($data) {
            return view("entitlement.changePassword", ['uid' => $data]);
        } else {
            return redirect('/login');
        }
    }

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
}
