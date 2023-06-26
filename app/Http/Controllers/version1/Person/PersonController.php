<?php

namespace App\Http\Controllers\version1\Person;

use App\Http\Controllers\Controller;
use App\Http\Controllers\version1\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }
    public function checkUserMobileNumber(Request $request)
    {
        Log::info('PersonController > checkUserMobileNumber function Inside.' . json_encode($request));
        $validator = Validator::make(
            $request->all(),
            [
                'mobileNumber' => 'required|numeric|digits:10',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $ip = $request->ip();
            $response = Http::post(config('api_base') . 'findMobileNumber', ["mobileNumber" => $request->mobileNumber, 'ip' => $ip]);
            $data = $response->json();

            Log::info('PersonController > checkUserMobileNumber function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $result = $data['data'];
                if ($result['type'] == 0) {
                    return view('entitlement.loginEmailPage', ['mobile' => $result['mobileNumber']]);
                } else if ($result['type'] == 1) {
                    return view('entitlement.login', ['name' => $result['personDatas']['person_details']['first_name'], 'mobile' => $result['mobileNumber']]);
                } else {
                    return redirect()->back()->withErrors(['mobile' => $data['message']]);
                }
            }
        }
    }
    public function checkUserEmail(Request $request)
    {
        return view('entitlement.personResultPage', ['mobile' => $request->mobileNumber, 'email' => $request->email]);

    }
    public function personConfirmationPage(Request $request)
    {
        return view('entitlement.personConfirmationPage', ['mobile' => $request->mobileNumber, 'email' => $request->email]);
    }
    public function userLogin(Request $request)
    {
        return view('entitlement.login', ['name' => $request->personName, 'mobile' => $request->mobile]);
    }
    // public function storeTempPerson(Request $request)
    // {
    //     Log::info('PersonController > storeTempPerson function Inside.' . json_encode($request));
    //     if ($request->dependency == 1) {
    //     if ($request->isMethod('post')) {
    //         $request->validate([
    //             'mobileNumber' => 'required',
    //             'email' => 'required',
    //             'stage' => 'required',
    //         ]);
    //         $response = Http::post(config('api_base') . 'storeTempPerson', ["mobileNumber" => $request->mobileNumber, "email" => $request->email, "stage" => $request->stage]);
    //         $data = $response->json();
    //         Log::info('PersonController > storeTempPerson function Return.' . json_encode($data));
    //         if ($response->status() == 200) {
    //             $allDatas = $data['data'];
    //             $tempDatas = $allDatas['tempModel'];
    //             $salutationModels = $allDatas['salutationModel'];
    //             return view('entitlement.personCreatePhase1', ['tempId' => $tempDatas['id'], 'salutations' => $salutationModels]);
    //         } else {
    //             return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
    //         }
    //     } else {
    //         return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
    //     }
    // }
    // else{
    //     return view('entitlement.personResult');
    // }
    // }
    public function storeTempPersonPhase1(Request $request)
    {
        Log::info('PersonController > storeTempPersonPhase1 function Inside.' . json_encode($request));
        if ($request->isMethod('post')) {
            $request->validate([
                'firstName' => 'required',
                'salutation' => 'required',
            ]);
            $response = Http::post(config('api_base') . 'storeTempPerson', ["tempId" => $request->tempId, "salutation" => $request->salutation, "firstName" => $request->firstName, "middleName" => $request->middleName, "lastName" => $request->lastName, 'nickName' => $request->nickName, "stage" => 2]);
            $data = $response->json();
            Log::info('PersonController > storeTempPersonPhase1 function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $allDatas = $data['data'];
                $tempDatas = $allDatas['tempModel'];
                $gender = $allDatas['gender'];
                $bloodGroup = $allDatas['bloodGroup'];
                return view('entitlement.personCreatePhase2', ['tempId' => $tempDatas['id'], 'gender' => $gender, 'bloodGroup' => $bloodGroup]);
            } else {
                return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }
    public function storeTempPersonPhase2(Request $request)
    {
        Log::info('PersonController > storeTempPersonPhase2 function Inside.' . json_encode($request));
        if ($request->isMethod('post')) {
            $response = Http::post(config('api_base') . 'storeTempPerson', ["tempId" => $request->tempId, "gender" => $request->gender, "bloodGroup" => $request->bloodGroup, "dob" => $request->dob, "stage" => 3]);
            $data = $response->json();
            Log::info('PersonController > storeTempPersonPhase2 function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $tempDatas = $data['data'];
                $maskedPhone = substr($tempDatas['mobile_no'], 0, 4) . "****" . substr($tempDatas['mobile_no'], 7, 4);
                return view('entitlement.personMobileConfimationOtp', ['tempId' => $tempDatas['id'], 'mobileNumber' => $tempDatas['mobile_no'], 'mobile' => $maskedPhone]);
            } else {
                return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }
    public function personConfirmationMobileOTP(Request $request)
    {
        Log::info('PersonController > personConfirmationMobileOTP function Inside.' . json_encode($request));
        $response = Http::post(config('api_base') . 'personOtpValidation', ["tempId" => $request->tempId, "otp" => $request->otp, "stage" => 4]);
        $data = $response->json();
        return $data;

    }
    public function storeUser(Request $request)
    {
        Log::info('PersonController > storeUser function Inside.' . json_encode($request));
        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required',
                'passwordConfirmation' => 'required',
            ]);
            $response = Http::post(config('api_base') . 'storeUser', ["uId" => $request->uId, "password" => $request->password, "passwordConfirmation" => $request->passwordConfirmation]);
            $data = $response->json();
            Log::info('PersonController > storeUser function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $personDatas = $data['data'];
                $userDatas = $this->userController->userLogin($personDatas['primary_mobile'], $request->password);
                if ($userDatas) {
                    return redirect()->route('myAccount');
                }
            } else {
                return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }
    public function checkPersonEmail(Request $request)
    {

        Log::info('PersonController > checkPersonEmail function Inside.' . json_encode($request));
        $response = apiHeaders()->post(config('api_base') . 'checkPersonEmail', ["mobileNumber" => $request->mobileNumber, "email" => $request->email, 'personUid' => $request->personUid]);
        $data = $response->json();
        Log::info('PersonController > checkPersonEmail function Return.' . json_encode($data));
        if ($response->status() == 200) {
            $result = $data['data'];
            $persondatas = $result['personDatas'];
            if ($result['type'] == 1) {
                return view('entitlement.personResultPage2', ['mobileNumber' => $result['mobileNumber'], 'uid' => $persondatas['uid'], 'email' => $persondatas['email']]);
            } elseif ($result['type'] == 2) {
                return view('entitlement.personResultPage3', ['mobileNumber' => $request->mobileNumber, 'uid' => $request->personUid, 'email' => $request->email]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }

    public function personDependency(Request $request)
    {
        return view('entitlement.personConfirmation', ['uid' => $request->uid, 'email' => $request->email, 'mobileNumber' => $request->mobileNumber]);

    }
    public function postLogin(Request $request)
    {

        Log::info('PersonController > postLogin function Inside.' . json_encode($request));
        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required|string',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $response = Http::post(config('api_base') . 'userLogin', ["userName" => $request->mobile, "password" => $request->password]);
            $data = $response->json();
            Log::info('PersonController > postLogin function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $allDatas = $data['data'];
                $result = $data['data']['defaultOrg'];
                $organizationName = (isset($result['org_name']) ? $result['org_name'] : '');
                $organizationId = (isset($result['organization_id']) ? $result['organization_id'] : '');
                Session::put('token', $allDatas['token']);
                Session::put('uid', $allDatas['uid']);
                Session::put('organizationName', $organizationName);
                Session::put('currentOrgId', $organizationId);
                if (Session::get('token')) {
                    return redirect()->route('myAccount');
                }
            } else if ($response->status() == 422) {

                return view('entitlement.tryagain_password', ['name' => $data['username'], 'uid' => $data['uid']]);
            } else {
                $error = "";
                if (isset($data['message'])) {
                    $error = $data['message'];
                } else if (isset($data['errors'])) {
                    $error = $data['errors'];
                }
                return redirect()->back()->withErrors(['err' => $error]);
            }
        }
    }
    public function resendOtpForEmailByUid(Request $request)
    {
        Log::info('PersonController > resendOtpForEmailByUid function Inside.' . json_encode($request));
        $response = Http::post(config('api_base') . 'generateEmailOtp', ['uid' => $request->uid]);
        $data = $response->json();
        Log::info('PersonController > resendOtpForEmailByUid function Return.' . json_encode($data));
        if ($response->status() == 200 && $data['param']) {
            if ($request->type == 1) {
                return true;
            } else {
                $emailId = substr($data['param']['email'], 0, 4) . "****" . substr($data['param']['email'], 7, 9);
                return view('entitlement.email_otp', ['personName' => $data['param']['personName'], 'email' => $emailId, 'personEmail' => $data['param']['email'], 'uid' => $data['param']['uid']]);

            }

        }
    }
    public function personEmailOtp(Request $request)
    {

        Log::info('PersonController > personEmailOtp function Inside.' . json_encode($request));
        $response = Http::post(config('api_base') . 'generateEmailOtp', ['uid' => $request->uid]);
        $data = $response->json();
        if ($response->status() == 200) {
            $result = $data['param'];
            $maskEmail = substr($result['email'], 0, 4) . "****" . substr($result['email'], 7, 9);
            return view("entitlement.personEmailOtp", ['maskEmail' => $maskEmail, 'email' => $result['email'], 'uid' => $result['uid']]);
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }

    }
    public function resendEmailOtp(Request $request)
    {
        Log::info('PersonController > resendEmailOtp function Inside.' . json_encode($request));
        $response = Http::post(config('api_base') . 'generateEmailOtp', ['uid' => $request->uid]);
        $data = $response->json();
        if ($response->status() == 200) {
            if ($data['message'] == "OK") {
                return 1;
            } else {
                return 2;
            }
        }
    }
    public function validateEmailOtp(Request $request)
    {

        Log::info('PersonController > validateEmailOtp function Inside.' . json_encode($request));
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'otp' => 'required',
            ]);
            $response = Http::post(config('api_base') . 'emailOtpValidation', ['uid' => $request->uid, 'otp' => $request->otp, 'email' => $request->email]);
            $data = $response->json();
            Log::info('PersonController > validateEmailOtp function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return $data;
            }
        }
    }

    public function updatePassword(Request $request)
    {
        Log::info('PersonController > updatePassword function Inside.' . json_encode($request));
        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required',
                'passwordConfirmation' => 'required',
            ]);
            $response = Http::post(config('api_base') . 'setNewPassword', ["password" => $request->password, "passwordConfirmation" => $request->passwordConfirmation, "uid" => $request->uid]);
            $data = $response->json();
            $allDatas = $data['data'];
            Log::info('PersonController > updatePassword function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return view("entitlement.login", ["name" => $allDatas['first_name'], "mobile" => $allDatas['mobile_no']])->withErrors(["success" => 'Password updated successfully']);
            } else {
                return view("entitlement.login", ["name" => $allDatas['first_name'], "mobile" => $allDatas['mobile_no']])->withErrors(["failed" => 'Password update Failed']);
            }
        }
    }

    public function personMobileOtpValidated(Request $request)
    {
        Log::info('PersonController > personMobileOtpValidated function Inside.' . json_encode($request));
        $response = apiHeaders()->post(config('api_base') . 'otpValidationForMobile', ["otp" => $request->otp, 'uid' => $request->uid, 'mobile_no' => $request->mobile_no]);
        $data = $response->json();
        Log::info('PersonController > personMobileOtpValidated function Return.' . json_encode($data));
        if ($response->status() == 200) {
            return $data;
        }
    }
    public function tempOTP(Request $request)
    {
        $response = apiHeaders()->post(config('api_base') . 'storeTempPerson', ['tempId' => $request->tempId, 'mobileNumber' => $request->mobileNumber, 'stage' => 3]);
        $data = $response->json();
        if ($data["message"] == "Success") {
            return 1;
        } else {
            return 2;
        }

    }
    public function resendMobileOtp(Request $request)
    {
        $response = apiHeaders()->post(config('api_base') . 'personMobileOtp', ['uid' => $request->uid, 'mobileNumber' => $request->mobileNumber]);
        $data = $response->json();
        if ($response->status() == 200) {
            if ($data['message'] == "OtpSuccesfully") {
                return 1;
            } else {
                return 2;
            }
        }
    }
    public function findCredential(Request $request)
    {

        if ($request->dependency == 1) {
            Log::info('PersonController > findCredential function Inside.' . json_encode($request));
            $response = apiHeaders()->post(config('api_base') . 'findCredential', ["mobileNumber" => $request->mobileNumber, "email" => $request->email]);
            $data = $response->json();

            $result = $data['data'];

            if ($response->status() == 200) {
                if ($result['type'] == 1) {
                    $response = apiHeaders()->post(config('api_base') . 'personMobileOtp', ['uid' => $result['uid'], 'mobileNumber' => $result['personData']['mobileNumber']]);
                    $datas = $response->json();
                    $result = $datas['data'];
                    $maskedPhone = substr($result['mobileNumber'], 0, 4) . "****" . substr($result['mobileNumber'], 7, 4);
                    return view('entitlement.personMobileOtp', ['mobileNumber' => $result['mobileNumber'], 'uid' => $result['uid'], 'email' => $request->email, 'mobile' => $maskedPhone]);
                } else if ($result['type'] == 2) {
                    $personDatas = $result['personData'];
                    return view("entitlement.personAllDetails", ['personDatas' => $personDatas, "mobileNumber" => $request->mobileNumber, "email" => $request->email]);
                } else if ($result['type'] == 3) {

                    if ($request->isMethod('post')) {
                        $request->validate([
                            'mobileNumber' => 'required',
                            'email' => 'required',
                        ]);
                        $response = Http::post(config('api_base') . 'storeTempPerson', ["mobileNumber" => $request->mobileNumber, "email" => $request->email, "stage" => 1]);
                        $data = $response->json();

                        if ($response->status() == 200) {
                            $allDatas = $data['data'];
                            $tempDatas = $allDatas['tempModel'];
                            $salutationModels = $allDatas['salutationModel'];
                            return view('entitlement.personCreatePhase1', ['tempId' => $tempDatas['id'], 'salutations' => $salutationModels]);
                        } else {
                            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
                        }
                    }
                }
            }
        }
        if ($request->dependency == 2) {

            return view('entitlement.personResult');
        }
    }
    // public function personMobileOtp(Request $request)
    // {
    //     if ($request->dependency == 1) {
    //     Log::info('PersonController > personMobileOtp function Inside.' . json_encode($request));
    //     $response = apiHeaders()->post(config('api_base') . 'personMobileOtp', ["mobileNumber" => $request->mobileNumber, "email" => $request->email, 'uid' => $request->uid]);
    //     $data = $response->json();
    //     Log::info('PersonController > personMobileOtp function Return.' . json_encode($data));
    //     if ($response->status() == 200) {
    //         $result = $data['data'];
    //         $maskedPhone = substr($result['mobileNumber'], 0, 4) . "****" . substr($result['mobileNumber'], 7, 4);
    //         return view('entitlement.personMobileOtp', ['mobileNumber' => $result['mobileNumber'], 'uid' => $result['uid'], 'email' => $result['email'],'mobile'=>$maskedPhone]);
    //     } else {
    //         return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
    //     }
    // }
    // else {
    //     if ($request->dependency == 2) {
    //         return view('entitlement.personResult');
    //     }
    // }
    // }

    public function PersonDetails(Request $request)
    {
        Log::info('PersonController > PersonDetails function Inside.' . json_encode($request));
        $response = apiHeaders()->post(config('api_base') . 'personDatas', ['uid' => $request->uid]);
        $data = $response->json();
        Log::info('PersonController > PersonDetails function Return.' . json_encode($data));
        if ($response->status() == 200) {
            $result = $data['data'];
            $personData = $result['personData'];
            $salutation = $result['salutation'];
            return view('entitlement.personCreatePart1', ['salutations' => $salutation, 'uid' => $personData['uid'], 'salu' => $personData['salutation_id'], 'firstName' => $personData['first_name'], 'middleName' => $personData['middle_name'], 'lastName' => $personData['last_name'], 'nickName' => $personData['nick_name']]);
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }

    }
    public function personToUser(Request $request)
    {
        dd($request->all());
        Log::info('PersonController > personToUser function Inside.' . json_encode($request));
        $response = apiHeaders()->post(config('api_base') . 'personToUser', ['uid' => $request->personUid, 'bloodGroup' => $request->bloodGroup, 'gender' => $request->gender, 'dob' => $request->dob]);
        $data = $response->json();
        Log::info('PersonController > personToUser function Return.' . json_encode($data));
        if ($response->status() == 200) {
            return view("entitlement.reset_password", ['uid' => $data['data']['uid'], 'personName' => $data['data']['first_name']]);
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }
    public function userCreation(Request $request)
    {

        Log::info('PersonController > userCreation function Inside.' . json_encode($request));
        $response = apiHeaders()->post(config('api_base') . 'userCreation', ['uid' => $request->uid, 'password' => $request->password]);
        $data = $response->json();
        Log::info('PersonController > userCreation function Return.' . json_encode($data));
        if ($response->status() == 200) {
            $datas = $data['data'];
            return view('entitlement.successAlert', ['name' => $datas['personName'], 'mobile' => $datas['mobileNumber']]);
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }

    public function personUpdate(Request $request)
    {
        dd($request->all());
        Log::info('PersonController > personUpdate function Inside.' . json_encode($request));
        $response = apiHeaders()->post(config('api_base') . 'personUpdate', ['uid' => $request->uid, 'salutation' => $request->salutation, 'firstName' => $request->firstName, 'middleName' => $request->middleName, 'lastName' => $request->lastName, 'nickName' => $request->nickName]);
        $data = $response->json();
        Log::info('PersonController > personUpdate function Return.' . json_encode($data));
        if ($response->status() == 200) {
            $result = $data['data'];
            $gender = $result['gender'];
            $bloodGroup = $result['bloodGroup'];
            $personData = $result['personData'];
            $dob = $personData['dob'];

            return view('entitlement.personCreatePart2', ['gender' => $gender, 'genderId' => $personData['gender_id'], 'bloodGroup' => $bloodGroup, 'bloodGroupId' => $personData['blood_group_id'], 'dob' => $dob, 'uid' => $personData['uid']]);
        } else {
            return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
        }
    }

    public function passwordPage(Request $request)
    {

        return view("entitlement.reset_password", ['uid' => $request->personUid, 'personName' => $request->personName]);
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
    public function personProfiles(Request $request)
    {
        Log::info('PersonController > personProfiles function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'personProfiles', ['uid' => $uid]);
            $data = $response->json();
            Log::info('PersonController > personProfiles function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $result = $data['data'];

                return view("Profiles.new_profile", ['salutation' => $result['saluationLists'], 'gender' => $result['genderLists'], 'bloodGroup' => $result['bloodGroupLists'], 'maritalStatus' => $result['maritalStatusLists'], 'addressOf' => $result['addressOfLists'], 'languages' => $result['languageLists'], 'idDocumentTypes' => $result['idDocumentTypes'], 'bankActType' => $result['bankAccountTypes'], 'PersonDatas' => $result['PersonDatas'], 'PersonAddress' => $result['PersonAddress'], 'personMobileNo' => $result['secondMobileAndEmail']['mobile'], 'personEmail' => $result['secondMobileAndEmail']['email']]);
            } else {
                return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
            }

        } else {
            return redirect('/login');
        }

    }
    public function profileUpdate(Request $request)
    {
         //dd($request->all());
        Log::info('PersonController > profileUpdate function Inside.' . json_encode($request));
        $datas = $request->all();

        if (isset($request->profilePhoto)) {
            $imageName = time() . '.' . $request->profilePhoto->getClientOriginalExtension();
            $request->profilePhoto->move(public_path('/profiles'), $imageName);
            $datas['image'] = $imageName;
        }
        $response = apiHeaders()->post(config('api_base') . 'profileUpdate', $datas);
        $data = $response->json();
        return redirect()->back();
    }
    public function signout(Request $request)
    {
        Log::info('PersonController > signout function Inside.' . json_encode($request));
        $bearerToken = Session::get('token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->post(config('api_base') . 'logout/');
        // $response->headers->set('Authorization', 'Bearer '.$bearerToken);
        $data = $response->json();
        Log::info('PersonController > signout function Return.' . json_encode($data));
        if ($response->status() == 200) {
            Session::forget('token');
            Session::flush();
            Session::put('token', "");
            return redirect()->route('loginMobilePage');
            //return view('wizard.mobile_page');
        }
    }
    // public function personAllDetails(Request $request)
    // {
    //     Log::info('PersonController > personAllDetails function Inside.' . json_encode($request));

    //     $response = apiHeaders()->post(config('api_base') . 'getDetailedAllPerson', ["mobileNumber" => $request->mobileNumber, "email" => $request->email, 'uid' => $request->uid]);
    //     $data = $response->json();
    //     if ($response->status() == 200) {
    //         $result = $data['data'];
    //         return view("entitlement.personAllDetails", ['personDatas' => $result]);
    //     } else {
    //         return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
    //     }

    // }
    public function personValidate(Request $request)
    {
        $result = explode(',', $request->personDetails);
        $datas['uid'] = $result[0];
        $mobileNo = $result[1];
        $email = $result[2];
        $response = apiHeaders()->post(config('api_base') . 'checkUserOrPerson', ['uid' => $datas['uid'], 'mobileNumber' => $mobileNo]);
        $data = $response->json();
        if ($response->status() == 200) {
            $result = $data['data'];
            if ($data['message'] == 'ExactUser') {
                return view('entitlement.login', ['name' => $result['first_name'], 'mobile' => $mobileNo]);

            } elseif ($data['message'] == 'OtpSuccesfully') {
                $maskedPhone = substr($result['mobileNumber'], 0, 4) . "****" . substr($result['mobileNumber'], 7, 4);
                return view('entitlement.personMobileOtp', ['mobileNumber' => $result['mobileNumber'], 'uid' => $result['uid'], 'email' => $request->email, 'mobile' => $maskedPhone]);
            }

        }

    }
    public function userView(Request $request)
    {
        Log::info('PersonController > userView function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'userProfileDatas', ['uid' => $uid]);
            $data = $response->json();

            Log::info('PersonController > userView function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $result = $data['data'];
                return view("Profiles.userViewPage", ['userDatas' => $result['userDeatils'], 'primaryMobiles' => $result['primaryMobile'], 'primaryEmail' => $result['primaryEmail'], 'userProfile' => $result['profilePic'], 'userGender' => $result['userGender'], 'userBloodGroup' => $result['userBloodGroup'], 'UserAddress' => $result['primaryAddress'], 'UserEducations' => $result['UserEducation'], 'userProfession' => $result['userProfession']]);
            } else {
                return redirect()->back()->withErrors(['error' => ['Inappropriate Submisssion']]);
            }

        } else {
            return redirect('/login');
        }
    }
    public function addOtherMobile(Request $request)
    {

        Log::info('PersonController > addOtherMobile function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'addOtherMobile', ['mobileNo' => $request->number, 'personUid' => $uid]);
            $data = $response->json();
            Log::info('PersonController > addOtherMobile function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return $data;
            }
        }
    }
    public function resendOtpForMobile(Request $request)
    {

        Log::info('PersonController > resendOtpForMobile function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'resendOtpForMobile', ['uid' => $uid, 'mobile_no' => $request->number]);
            $data = $response->json();
            Log::info('PersonController > resendOtpForMobile function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $result = $data['data'];
                return $result;
            }

        }

    }
    public function OtpVerifiedForMobile(Request $request)
    {

        Log::info('PersonController > OtpVerifiedForMobile function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'otpValidationForMobile', ['uid' => $uid, 'otp' => $request->otp, 'mobile_no' => $request->number]);
            $data = $response->json();
            Log::info('PersonController > resendOtpForMobile function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return $data;
            }
        }
    }
    public function addOtherEmail(Request $request)
    {

        Log::info('PersonController > addOtherEmail function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'addOtherEmail', ['email' => $request->email, 'personUid' => $uid]);
            $data = $response->json();
            Log::info('PersonController > addOtherMobile function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return $data;
            }

        }
    }
    public function resendOtpForEmail(Request $request)
    {

        Log::info('PersonController > resendOtpForEmail function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'resendOtpForEmail', ['uid' => $uid, 'email' => $request->email]);
            $data = $response->json();
            Log::info('PersonController > resendOtpForEmail function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $result = $data['data'];
                return $result;
            }
        }
    }
    public function secondNumberChangeToPrimary(Request $request)
    {

        Log::info('PersonController > secondNumberChangeToPrimary function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'mobileNumberChangeAsPrimary', ['uid' => $uid, 'otp' => $request->otp, 'mobile_no' => $request->number]);
            $data = $response->json();

            Log::info('PersonController > secondNumberChangeToPrimary function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $result = $data['data'];
                return $result;
            }
        }
    }
    public function deleteForMobileNumber(Request $request)
    {
        Log::info('PersonController > deleteForMobileNumber function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'deleteForMobileNumberByUid', ['uid' => $uid, 'mobile_no' => $request->number]);
            $data = $response->json();

            Log::info('PersonController > deleteForMobileNumber function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $result = $data['data'];
                return $result;
            }
        }
    }
    public function otpValidationByEmail(Request $request)
    {

        Log::info('PersonController > otpValidationByEmail function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'emailOtpValidation', ['uid' => $uid, 'email' => $request->email, 'otp' => $request->otp]);
            $data = $response->json();
            Log::info('PersonController > otpValidationByEmail function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return $data;
            }
        }
    }
    public function seconEmailChangeToPrimary(Request $request)
    {
        Log::info('PersonController > seconEmailChangeToPrimary function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'emailChangeAsPrimary', ['uid' => $uid, 'email' => $request->email, 'otp' => $request->otp]);
            $data = $response->json();

            Log::info('PersonController > seconEmailChangeToPrimary function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $result = $data['data'];
                return $result;
            }
        }
    }
    public function deleteForEmail(Request $request)
    {
        Log::info('PersonController > deleteForEmail function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($uid) {
            $response = apiHeaders()->post(config('api_base') . 'deleteForEmailByUid', ['uid' => $uid, 'email' => $request->email]);
            $data = $response->json();
            dd($data);
            Log::info('PersonController > deleteForEmail function Return.' . json_encode($data));
            if ($response->status() == 200) {
                $result = $data['data'];
                return $result;
            }
        }
    }
    public function resendOtpForTempMobileNo(Request $request)
    {
        Log::info('PersonController > resendOtpForTempMobileNo function Inside.' . json_encode($request));
        if ($request->tempId) {
            $response = apiHeaders()->post(config('api_base') . 'resendOtpForTempMobileNo', ['mobileTempId' => $request->tempId, 'number' => $request->number]);
            $data = $response->json();
            Log::info('PersonController > resendOtpForTempMobileNo function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return $data;
            }
        }
    }
    public function OtpValidationForTempMobile(Request $request)
    {
        Log::info('PersonController > OtpValidationForTempMobile function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($request->tempId && $uid) {
            $response = apiHeaders()->post(config('api_base') . 'OtpValidationForTempMobile', ['mobileTempId' => $request->tempId, 'number' => $request->number, 'otp' => $request->mobileOtp, 'personUid' => $uid]);
            $data = $response->json();
            Log::info('PersonController > OtpValidationForTempMobile function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return $data;
            }
        }

    }
    public function resendOtpForTempEmail(Request $request)
    {
        Log::info('PersonController > resendOtpForTempEmail function Inside.' . json_encode($request));
        if ($request->tempId) {
            $response = apiHeaders()->post(config('api_base') . 'resendOtpForTempEmail', ['emailTempId' => $request->tempId, 'email' => $request->email]);
            $data = $response->json();
            Log::info('PersonController > resendOtpForTempEmail function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return $data;
            }
        }
    }
    public function OtpValidationForTempEmail(Request $request)
    {
        Log::info('PersonController > OtpValidationForTempEmail function Inside.' . json_encode($request));
        $uid = $this->user();
        if ($request->tempId && $uid) {
            $response = apiHeaders()->post(config('api_base') . 'OtpValidationForTempEmail', ['emailTempId' => $request->tempId, 'email' => $request->email, 'otp' => $request->emailOtp, 'personUid' => $uid]);
            $data = $response->json();

            Log::info('PersonController > OtpValidationForTempEmail function Return.' . json_encode($data));
            if ($response->status() == 200) {
                return $data;
            }
        }
    }
}
