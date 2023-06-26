@extends('layouts.dashboard.app')
@section('content')


    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="user0  profile for-active">
    </div> <!-- | -->
    {{-- ------------------------------------------------------------------------------------------------------------------- --}}
    <form action="{{ route('profileUpdate') }}" method="post" class="card m-2 shadow-none" id="WizardForm" data-edit-form="true"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="smartWizardCustomButtons">
            <ul class="card-header top-list-wizard" style="display:flex;justify-content:none;">

                <li><a href="#customButtons2">Profile
                    </a></li>
                <li><a href="#customButtons3">Communication
                    </a></li>
            </ul>
            <div class="card-body col-12">
                <div id="customButtons2">
                    <div class="col-lg-12 d-flex justify-content-between flex-wrap">
                        <div class="col-lg-3">
                            <label for="imgInp" class="profile-img-container m-auto">
                                <input accept="image/*" type='file' id="imgInp" name="profilePhoto" class="d-none" />
                                @if (isset($PersonDatas['profile_pic']['profile_pic']))
                                    <img src="{{ asset('profiles/' . $PersonDatas['profile_pic']['profile_pic']) }}"
                                        id="blah" alt="Person Profile">
                                @else
                                    <img src="{{ asset('img/images (1).png') }}" id="blah" alt="Person Profile">
                                @endif

                                <div class="profile-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z" />
                                    </svg><br>
                                    <span>Add Profile</span>
                                </div>
                            </label>
                            <br> <!-- <img class="img-circle" id="myImg"  name="image" src=""> -->
                            <center class="text-muted">{{ $PersonDatas['person_details']['first_name'] }}
                                {{ $PersonDatas['person_details']['nick_name'] }}</center>
                        </div>

                        <div class="col-lg-9">
                            <div class="form-row">
                                <div class="form-group col-md-2 m-0">
                                    <label class="form-group  p-0
                                . InputLabel w-100 ">
                                        <select class="form-select w-100 AlterInput search-need" name="salutationId"
                                            data-minimum-results-for-search="Infinity" data-placeholder="Saluation">
                                            <option selected value="" disabled>Saluation</option>
                                            @foreach ($salutation as $key => $value)
                                                <option value="{{ $value['id'] }}"
                                                    {{ $PersonDatas['person_details']['salutation_id'] == $value['id'] ? 'selected' : '' }}>
                                                    {{ $value['salutation'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="AlterInputLabel box">Saluation</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group  p-0   InputLabel w-100">
                                        <input type="text" value="{{ $PersonDatas['person_details']['first_name'] }}"
                                            name="firstName"
                                            class="form-control AlterInput w-100  propel-key-press-input-mendatory"
                                            placeholder="Ex : Something">
                                        <span class="AlterInputLabel">First Name <sup>*</sup></span>
                                    </label>
                                    <input type="hidden" class="personUid" name="personUid"
                                        value="{{ $PersonDatas['uid'] }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-group  p-0   InputLabel w-100 ">
                                        <input type="text" name="middleName"
                                            value="{{ $PersonDatas['person_details']['middle_name'] }}"
                                            class="form-control AlterInput w-100 " placeholder="Middle Name...">
                                        <span class="AlterInputLabel">Middle Name</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-group  p-0   InputLabel w-100 ">
                                        <input type="text" name="lastName"
                                            value="{{ $PersonDatas['person_details']['last_name'] }}"
                                            class="form-control AlterInput w-100 " placeholder="Last Name or Initial...">
                                        <span class="AlterInputLabel">Last Name or Initial</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-group  p-0   InputLabel w-100 ">
                                        <input type="text" name="nickName"
                                            value="{{ $PersonDatas['person_details']['nick_name'] }}"
                                            class="form-control AlterInput w-100 " placeholder="Account Ledger Name...">
                                        <span class="AlterInputLabel">Nick Name or Alias</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label class="form-group  p-0   InputLabel w-100 ">
                                        <input type="text" autocomplete="off"
                                            {{-- value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $PersonDatas['person_details']['dob'])->format('d-m-Y') }}" --}}
                                            name="dob" validationAttr="date"
                                            class="form-control AlterInput w-100 datepicker propel-key-press-input-mendatory"
                                            placeholder="DOB...">
                                        <span class="AlterInputLabel">DOB <sup>*</sup></span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-group  p-0   InputLabel w-100 ">
                                        <input type="text" name="birthCity"
                                            value="{{ $PersonDatas['person_details']['birth_place'] }}"
                                            class="form-control AlterInput w-100  " placeholder="Birth City...">
                                        <span class="AlterInputLabel">Birth City</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-group  p-0
                                . InputLabel w-100 ">
                                        <select class="form-select w-100 AlterInput search-need" name="genderId"
                                            data-minimum-results-for-search="Infinity" data-placeholder="Gender">
                                            <option selected value="" disabled>Gender</option>
                                            @foreach ($gender as $key => $value)
                                                <option value="{{ $value['id'] }}"
                                                    {{ $PersonDatas['person_details']['gender_id'] == $value['id'] ? 'selected' : '' }}>
                                                    {{ $value['gender'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="AlterInputLabel box">Gender</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-group  p-0
                                . InputLabel w-100 ">
                                        <select class="form-select w-100 AlterInput search-need" name="bloodGroup"
                                            data-minimum-results-for-search="Infinity" data-placeholder="Blood Group">
                                            <option selected value="" disabled>Blood Group</option>
                                            @foreach ($bloodGroup as $key => $value)
                                                <option value="{{ $value['id'] }}"
                                                    {{ $PersonDatas['person_details']['blood_group_id'] == $value['id'] ? 'selected' : '' }}>
                                                    {{ $value['blood_group'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="AlterInputLabel box">Blood Group</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-group  p-0
                                . InputLabel w-100 ">
                                        <select class="form-select w-100 AlterInput search-need" name="maritalStatus"
                                            data-minimum-results-for-search="Infinity" data-placeholder="Marital Status">
                                            <option selected value="" disabled>Marital Status</option>
                                            @foreach ($maritalStatus as $key => $value)
                                                <option value="{{ $value['id'] }}"
                                                    {{ $PersonDatas['person_details']['marital_id'] == $value['id'] ? 'selected' : '' }}>
                                                    {{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="AlterInputLabel box">Marital Status</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-group  p-0   InputLabel w-100 ">
                                        <input type="text" placeholder="date" autocomplete="off"
                                        value="{{ isset($PersonDatas['person_anniversary_date']['anniversary_date']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $PersonDatas['person_anniversary_date']['anniversary_date'])->format('d-m-Y') : '' }}"
                                            name="anniversaryDate" validationAttr="date"
                                            class="form-control AlterInput w-100 datepicker ">
                                        <span class="AlterInputLabel">Anniversary Date</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-group  p-0   InputLabel w-100 ">
                                        {{-- <input type="text"  value="" class="form-control AlterInput w-100  "
                                        placeholder="Mother Tongue..."> --}}
                                        <select name="motherLanguage"
                                            class="form-control AlterInput search-need motherLanguage" id="motherLanguage"
                                            data-placeholder="Mother Language">
                                            <option selected value="" disabled> Mother Language</option>
                                            @foreach ($languages as $key => $value)
                                                <option value="{{ $value['id'] }}"
                                                    {{ isset($PersonDatas['person_language'][0]['mother_tongue']) && $PersonDatas['person_language'][0]['mother_tongue'] == $value['id'] ? 'selected' : '' }}>
                                                    {{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="AlterInputLabel">Mother Tongue</span>
                                    </label>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label class="form-group  p-0
                                . InputLabel w-100 ">
                                        <select class="form-select w-100 AlterInput otherLanguage search-need" disabled
                                            name="otherLanguage[]" multiple data-placeholder="Other Know Language">

                                            @foreach ($languages as $key => $value)
                                                <option value="{{ $value['id'] }}"
                                                    {{ in_array($value['id'], array_column($PersonDatas['person_language'], 'language_id')) ? 'selected' : '' }}>
                                                    {{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="AlterInputLabel box">Other Know Language</span>
                                    </label>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @php
                $selectedMobile = '';
                foreach ($PersonDatas['mobile'] as $mobile) {
                    if ($mobile['mobile_cachet'] == 1) {
                        $selectedMobile = $mobile['mobile_no'];
                        break;
                    }
                }
            @endphp

                <div id="customButtons3">
                    <div class="form-row">
                        <div class="form-group col-md-2 ">
                            <label class="input-group   p-0   InputLabel w-100 m-1">
                                <input type="text" name="mobileNumber"
                                    value="{{$selectedMobile}}"
                                    class="form-control AlterInput w-60 " placeholder="primary Mobile..." readonly>
                                <span class="input-group-text input-group-append input-group-addon ">
                                    <img src="{{ asset('assets/images/tick.svg') }}" class="h-100">
                                </span>
                                <span class="AlterInputLabel">Primary Mobile<sup>*</sup></span>
                            </label>
                        </div>
                        @foreach ($personMobileNo as $mobileNo)
                            @if ($mobileNo['mobile_validation'] == 1)
                                <div class="form-group col-md-2 Todo-content">
                                    <label class="input-group  p-0   InputLabel w-100 mt-1 ml-0 ">
                                        <input type="text" name="secondNumber[]" class="form-control AlterInput w-80"
                                            validateAttr="mobile-num" placeholder="Other Mobile..."
                                            value="{{ $mobileNo['mobile_no'] }}" maxlength="10">
                                        <span
                                            class="input-group-text input-group-append input-group-addon user-modification-popover"
                                            data-for="mobile">
                                            <img src="{{ asset('assets/images/tick.svg') }}">
                                        </span>
                                        <span class="AlterInputLabel">Other Mobile</span>

                                    </label>
                                </div>
                            @else
                                <div class="form-group col-md-2 Todo-content">
                                    <label class="input-group  p-0   InputLabel w-100 mt-1 ml-0 ">
                                        <input type="text" name="secondNumber[]" class="form-control AlterInput w-80"
                                            validateAttr="mobile-num" placeholder="Other Mobile..."
                                            value="{{ $mobileNo['mobile_no'] }}" maxlength="10">
                                        <span
                                            class="input-group-text input-group-append input-group-addon user-modification-popover"
                                            data-for="mobile">
                                            <img src="{{ asset('assets/images/warning.svg') }}">
                                        </span>
                                        <span class="AlterInputLabel">Other Mobile</span>

                                    </label>
                                </div>
                            @endif
                        @endforeach
                        <span class="add-append-icon mobile-add" data-toggle="modal" data-target="#MobileNumberModal"
                            data-backdrop="static" id="plus-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-plus"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg></span>

                    </div>
                    <hr>
                    @php
                    $selectedEmail = '';
                    foreach ($PersonDatas['email'] as $email) {
                        if ($email['email_cachet'] == 1) {
                            $selectedEmail = $email['email'];
                            break;
                        }
                    }
                @endphp
                    <div class="form-row">
                        <div class="form-group col-md-2 ">
                            <label class="input-group  p-0   InputLabel w-100 m-1">
                                <input type="email" name="email" value="{{ $selectedEmail }}"
                                    class="form-control AlterInput w-80  " placeholder="Primary Email..." readonly>
                                <span class="input-group-text input-group-append input-group-addon ">
                                    <img src="{{ asset('assets/images/tick.svg') }}" class="h-100">
                                </span>
                                <span class="AlterInputLabel">Primary Email<sup>*</sup></span>
                            </label>
                        </div>
                        @foreach ($personEmail as $email)
                            @if ($email['email_validation_status'] == 1)
                                <div class="form-group col-md-2 ml-0">
                                    <label class="input-group  p-0   InputLabel w-100 mt-1 ml-0">
                                        <input type="email" name="secondEmail[]" value="{{ $email['email'] }}"
                                            class="form-control AlterInput w-80  " placeholder="Other Email...">
                                        <span
                                            class="input-group-text input-group-append input-group-addon user-modification-popover"
                                            data-for="email">
                                            <img src="{{ asset('assets/images/tick.svg') }}">
                                        </span>
                                        <span class="AlterInputLabel">Other Email </span>
                                    </label>
                                </div>
                            @else
                                <div class="form-group col-md-2 ml-0">
                                    <label class="input-group  p-0   InputLabel w-100 mt-1 ml-0">
                                        <input type="email" name="secondEmail[]" value="{{ $email['email'] }}"
                                            class="form-control AlterInput w-80  " placeholder="Other Email...">
                                        <span
                                            class="input-group-text input-group-append input-group-addon user-modification-popover"
                                            data-for="email">
                                            <img src="{{ asset('assets/images/warning.svg') }}">
                                        </span>
                                        <span class="AlterInputLabel">Other Email </span>
                                    </label>
                                </div>
                            @endif
                        @endforeach
                        <span class="add-append-icon email-add" id="plus-1" data-toggle="modal"
                            data-target="#EmailModal" data-backdrop="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-plus"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg></span>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-2 ">
                            <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                                <input type="url" name="webLinks" class="form-control AlterInput w-100"
                                    placeholder="Web Links...">
                                <span class="AlterInputLabel">Web Links</span>
                            </label>
                        </div>
                    </div>
                    <hr>
                    @if ($PersonAddress)
                        @foreach ($PersonAddress as $Address)
                            <div class="col-12 p-0">
                                <div class="form-row  ">

                                    <input type="hidden" name="propertyAddressId[]"
                                        value="{{ $Address['property_address_id'] }}">
                                    <div class="form-group col-md-2">
                                        <label class="form-group  p-0   InputLabel w-100 m-1">
                                            <select class="form-select w-100  AlterInput search-need" name="addressOf[]"
                                                data-minimum-results-for-search="Infinity" data-placeholder="Address Of">
                                                <option selected value="" disabled>Address of</option>
                                                @foreach ($addressOf as $value)
                                                    <option value="{{ $value['id'] }}"
                                                        {{ $value['id'] == $Address['address_type'] ? 'selected' : '' }}>
                                                        {{ $value['address_of'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="AlterInputLabel">AddressType</span>

                                        </label>
                                    </div>
                                    <div class="form-group col-md-2 m-1">
                                        <label class="form-group  p-0   InputLabel w-100 m-1">
                                            <input type="text" name="doorNo[]" value="{{ $Address['door_no'] }}"
                                                class="form-control AlterInput w-100  todoRequired"
                                                placeholder="Door No...">
                                            <span class="AlterInputLabel">Door No </span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-2 m-1">
                                        <label class="form-group  p-0   InputLabel w-100 m-1">
                                            <input type="text" name="buildingName[]"
                                                value="{{ $Address['building_name'] }}"
                                                class="form-control AlterInput w-100  " placeholder="Building Name...">
                                            <span class="AlterInputLabel">Building Name
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-2 m-1">
                                        <label class="form-group  p-0   InputLabel w-100 m-1">
                                            <input type="text" name="street[]" value="{{ $Address['street'] }}"
                                                class="form-control AlterInput w-100  " placeholder="Street...">
                                            <span class="AlterInputLabel">Street
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-2 m-1">
                                        <label class="form-group  p-0   InputLabel w-100 m-1">
                                            <input type="text" name="landMark[]" value="{{ $Address['land_mark'] }}"
                                                class="form-control AlterInput w-100  " placeholder="Land Mark...">
                                            <span class="AlterInputLabel">Land Mark
                                            </span>
                                        </label>
                                    </div>

                                </div>

                                <div class="form-row  ">
                                    <div class="form-group col-md-2 ">
                                        <label class="form-group  p-0   InputLabel w-100 m-1">
                                            <input type="text" name="pinCode[]" value="{{ $Address['pin'] }}"
                                                class="form-control AlterInput w-100  todoRequired"
                                                placeholder="Pin code...">
                                            <span class="AlterInputLabel">Pin code

                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-2 m-1">
                                        <label class="form-group  p-0   InputLabel w-100 m-1">
                                            <input type="text" name="state[]" value="{{ $Address['state_id'] }}"
                                                class="form-control AlterInput w-100  " placeholder="State...">
                                            <span class="AlterInputLabel">State</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-2 m-1">
                                        <label class="form-group  p-0   InputLabel w-100 m-1">
                                            <input type="text" name="city[]" value="{{ $Address['city_id'] }}"
                                                class="form-control AlterInput w-100  " placeholder="City...">
                                            <span class="AlterInputLabel">City</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-2 m-1">
                                        <label class="form-group  p-0   InputLabel w-100 m-1">
                                            <input type="text" name="district[]" value="{{ $Address['district'] }}"
                                                class="form-control AlterInput w-100" placeholder="District...">
                                            <span class="AlterInputLabel">District</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-2 m-1">
                                        <label class="form-group  p-0   InputLabel w-100 m-1">
                                            <input type="text" name="area[]" value="{{ $Address['area'] }}"
                                                class="form-control AlterInput w-100" placeholder="Area...">
                                            <span class="AlterInputLabel">Area</span>
                                        </label>

                                    </div>

                                </div>

                            </div>
                        @endforeach
                    @else
                        <div class="col-12 p-0">
                            <div class="form-row  ">

                                <input type="hidden" name="propertyAddressId[]" value="">
                                <div class="form-group col-md-2">
                                    <label class="form-group  p-0   InputLabel w-100 m-1">
                                        <select class="form-select w-100  AlterInput search-need" name="addressOf[]"
                                            data-minimum-results-for-search="Infinity" data-placeholder="Address Of">
                                            <option selected value="" disabled>Address of</option>
                                            @foreach ($addressOf as $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['address_of'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="AlterInputLabel">AddressType</span>

                                    </label>
                                </div>
                                <div class="form-group col-md-2 m-1">
                                    <label class="form-group  p-0   InputLabel w-100 m-1">
                                        <input type="text" name="doorNo[]" "
                                    class="form-control AlterInput w-100  todoRequired" placeholder="Door No...">
                                <span class="AlterInputLabel">Door No </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="buildingName[]"
                                    value=""
                                    class="form-control AlterInput w-100  " placeholder="Building Name...">
                                <span class="AlterInputLabel">Building Name
                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="street[]" value=""
                                    class="form-control AlterInput w-100  " placeholder="Street...">
                                <span class="AlterInputLabel">Street
                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="landMark[]" value=""
                                    class="form-control AlterInput w-100  " placeholder="Land Mark...">
                                <span class="AlterInputLabel">Land Mark
                                </span>
                            </label>
                        </div>

                    </div>

                    <div class="form-row  ">
                        <div class="form-group col-md-2 ">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="pinCode[]" value=""
                                    class="form-control AlterInput w-100  todoRequired" placeholder="Pin code...">
                                <span class="AlterInputLabel">Pin code

                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="state[]" value=""
                                    class="form-control AlterInput w-100  " placeholder="State...">
                                <span class="AlterInputLabel">State</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="city[]" value=""
                                    class="form-control AlterInput w-100  " placeholder="City...">
                                <span class="AlterInputLabel">City</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="district[]" value=""
                                    class="form-control AlterInput w-100" placeholder="District...">
                                <span class="AlterInputLabel">District</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="area[]" value=""
                                    class="form-control AlterInput w-100" placeholder="Area...">
                                <span class="AlterInputLabel">Area</span>
                            </label>

                        </div>

        </div>

    </div>
     @endif
                                        <span class="add-append-icon ToDo" id="plus-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                class="bi bi-plus" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                            </svg></span>
                                        <hr>
                                </div>
                            </div>
                            <div class="btn-toolbar custom-toolbar text-center card-body pt-0">
                                <button class="propelbtn propelcurved  prev-btn propelback" type="button"
                                    name="previous">Previous</button>
                                <button class="propelbtn propelcurved next-btn  wizard-move cont" id="ctn-btn"
                                    type="button" onclick="return false;" name="continue">continue </button>
                                <button class="propelbtn propelcurved  propelsubmit" type="submit">update</button>
                                <button class="propelbtn propelcurved reset-btn propelreset freset" type="reset"
                                    name="reset">Reset</button>
                            </div>
                        </div>
    </form>


    <div class="input-popup card d-none">
        <ul class="list-unstyled p-2 m-0">
            <li class="p-1 pl-4 border-bottom primary-modal" data-toggle="modal" data-target="#PrimaryModal"
                data-backdrop="static">Make as Primary</li>
            <li class="p-1 pl-4 border-bottom validate-modal resendOtpForValidation" data-toggle="modal"
                data-target="#validateModal" data-backdrop="static">Validate</li>
            <li class="p-1 pl-4 border-bottom delete-modal getDeletedValue" data-toggle="modal"
                data-target="#deleteModal" data-backdrop="static">Delete</li>
        </ul>
    </div>

    {{-- Primary Modal --}}

    <div class="modal fade overflow-hidden" id="PrimaryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog mt-0 overflow-hidden" role="document">
            <div class="modal-content overflow-hidden">
                <div class="modal-header p-2 border-0">
                    <h3 class="modal-title w-100 text-center" id="primary-heading">

                    </h3>
                    <button type="button" class="propel-glass-btn close-btn primary-modal-close" data-dismiss="modal"
                        aria-label="Close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2"
                                rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor"></rect>
                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                transform="rotate(45 8.46447 7.05029)" fill="currentColor"></rect>
                        </svg>
                    </button>
                </div>
                <div class="smartWizardDot">
                    <ul class="card-header">
                        <li><a href="#dotStep1">Step 1<br /><small>Confirmation for OTP</small></a></li>
                        <li><a href="#dotStep2">Step 2<br /><small>OTP Confirmation</small></a></li>
                        <li><a href="#dotStep3">Step 3<br /><small>Success</small></a></li>

                    </ul>

                    <div class="card-body">
                        <div id="dotStep1">

                            <div class="modal-body border-bottom-0  confirmation-text text-center">

                            </div>
                            <div class="modal-footer border-0">
                                <div class="d-flex justify-content-around col-12">
                                    <button class="propelbtn propelcurved  propelsubmit propel-hover prev-step "
                                        data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button
                                        class="propelbtn propelcurved  propelsubmit propel-hover next-step-primary resendOtpAsPrimary"
                                        type="submit">Continue</button>
                                </div>
                            </div>


                        </div>
                        <div id="dotStep2">

                            <form action="" onsubmit="return false">
                                <div class="modal-body border-bottom-0">
                                    <div class="form-group col-md-12">
                                        <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                            <input
                                                class="form-control AlterInput propel-key-press-input-mendatory otpPrimary"
                                                id="otp" type="text"
                                                placeholder="Enter OTP Received on your Email" name="otp"
                                                class="propel-key-press-input-mendatory" />
                                            <span class="text-danger"></span>
                                            <span class="AlterInputLabel">OTP <sup>*</sup> </span>
                                        </label>
                                        <span class="otp mb-4 text-bold resendOtpAsPrimary" id="rsotp">Resent OTP
                                        </span>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">


                                    <button
                                        class="propelbtn propelcurved  propelsubmit next-step-otp otpValidateForPrimary"
                                        type="submit">Verify </button>

                                </div>
                            </form>
                        </div>
                        <div id="dotStep3">
                            <div class="d-flex justify-content-center m-2">
                                <div class="success-icon">
                                    <div class="success-icon__tip"></div>
                                    <div class="success-icon__long"></div>
                                </div>
                            </div>
                            <p class="d-flex justify-content-center m-2">Your &nbsp;<span
                                    class="primary-email-add-success"> </span>&nbsp; was changed successfully</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Validate Modal --}}

    <div class="modal fade overflow-hidden" id="validateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog mt-0 overflow-hidden" role="document">
            <div class="modal-content overflow-hidden">
                <div class="modal-header p-2 border-0">
                    <h3 class="modal-title w-100 text-center" id="validate-heading">

                    </h3>
                    <button type="button" class="propel-glass-btn close-btn validate-modal-close" data-dismiss="modal"
                        aria-label="Close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2"
                                rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor"></rect>
                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                transform="rotate(45 8.46447 7.05029)" fill="currentColor"></rect>
                        </svg>
                    </button>
                </div>
                <div class="smartWizardDot">
                    <ul class="card-header">
                        <li><a href="#dotStep2">Step 1<br /><small>OTP Confirmation</small></a></li>
                        <li><a href="#dotStep3">Step 2<br /><small>Success</small></a></li>
                    </ul>
                    <div class="card-body">
                        <div id="dotStep2">

                            <form action="" onsubmit="return false">
                                <div class="modal-body border-bottom-0">
                                    <div class="form-group col-md-12">
                                        <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                            <input
                                                class="form-control AlterInput propel-key-press-input-mendatory validationMobileOtp"
                                                id="otp" type="text"
                                                placeholder="Enter OTP Received on your Email" name="otp"
                                                class="propel-key-press-input-mendatory" />
                                            <span class="text-danger"></span>
                                            <span class="AlterInputLabel">OTP<sup>*</sup> </span>
                                        </label>
                                        <span class="otp mb-4 text-bold resendOtpForValidation" id="rsotp">Resent
                                            OTP</span>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">


                                    <button class="propelbtn propelcurved  propelsubmit next-step-otp validationMobile"
                                        type="submit">Verify </button>

                                </div>
                            </form>
                        </div>
                        <div id="dotStep3">
                            <div class="d-flex justify-content-center m-2">
                                <div class="success-icon">
                                    <div class="success-icon__tip"></div>
                                    <div class="success-icon__long"></div>
                                </div>
                            </div>
                            <p class="d-flex justify-content-center m-2">Your &nbsp;<span
                                    class="validate-email-add-success"> </span>&nbsp; was validated successfully</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Modal --}}
    <div class="modal fade overflow-hidden" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog mt-0 overflow-hidden" role="document">
            <div class="modal-content overflow-hidden">
                <div class="modal-header p-2 border-0">
                    <h3 class="modal-title w-100 text-center" id="delete-heading">

                    </h3>
                    <button type="button" class="propel-glass-btn close-btn delete-modal-close" data-dismiss="modal"
                        aria-label="Close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2"
                                rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor"></rect>
                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                transform="rotate(45 8.46447 7.05029)" fill="currentColor"></rect>
                        </svg>
                    </button>
                </div>
                <div class="smartWizardDot deleteModule">
                    <ul class="card-header">
                        <li><a href="#dotStep1">Step 1<br /><small>Confirmation for Delete</small></a></li>
                        <li><a href="#dotStep3">Step 2<br /><small>Success</small></a></li>

                    </ul>

                    <div class="card-body">
                        <div id="dotStep1">

                            <div class="modal-body border-bottom-0  confirmation-text text-center">

                            </div>
                            <div class="modal-footer border-0">
                                <div class="d-flex justify-content-around col-12">
                                    <button class="propelbtn propelcurved  propeldelete propel-hover prev-step"
                                        data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button
                                        class="propelbtn propelcurved  propeldelete propel-hover next-step-delete deleteMobileNumber ">Continue
                                    </button>
                                </div>
                            </div>


                        </div>

                        <div id="dotStep3">
                            <div class="d-flex justify-content-center m-2">
                                <div class="success-icon">
                                    <div class="success-icon__tip"></div>
                                    <div class="success-icon__long"></div>
                                </div>
                            </div>
                            <p class="d-flex justify-content-center m-2">Your &nbsp;<span
                                    class="delete-email-add-success"> </span>&nbsp; was deleted successfully</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mobile Modal --}}

    <div class="modal fade overflow-hidden " id="MobileNumberModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog mt-0 overflow-hidden" role="document">
            <div class="modal-content overflow-hidden">
                <div class="modal-header p-2 border-0">
                    <h3 class="modal-title w-100 text-center" id="exampleModalLabel">Add Mobile Number</h3>
                    <button type="button" class="propel-glass-btn close-btn mobile-number-modal" data-dismiss="modal"
                        aria-label="Close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2"
                                rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor"></rect>
                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                transform="rotate(45 8.46447 7.05029)" fill="currentColor"></rect>
                        </svg>
                    </button>
                </div>
                <div class="smartWizardDot">
                    <ul class="card-header">
                        <li><a href="#dotStep1">Step 1<br /><small>Enter Your Mobile Number</small></a></li>
                        <li><a href="#dotStep2">Step 2<br /><small>OTP Confirmation</small></a></li>
                        <li><a href="#dotStep3">Step 3<br /><small>Success</small></a></li>

                    </ul>

                    <div class="card-body">
                        <div id="dotStep1">

                            <form action="" onsubmit="return false">

                                <div class="modal-body border-bottom-0">
                                    <div class="form-group col-md-12">
                                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0 ">
                                            <input type="text" name="secondNumber[]"
                                                class="form-control AlterInput w-100 propel-key-press-input-mendatory otp-number secondNumber"
                                                validateAttr="mobile-num" placeholder=" Enter Your Mobile Number"
                                                maxlength="10">
                                            <span class="AlterInputLabel"> Mobile Number<sup>*</sup> </span>

                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button  class="propelbtn propelcurved  propelsubmit next-step-mobile"
                                        type="submit">Submit </button>
                                </div>
                            </form>

                        </div>
                        <div id="dotStep2">

                            <form action="" onsubmit="return false">
                                <div class="modal-body border-bottom-0">
                                    <div class="form-group col-md-12">
                                        <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                            <input
                                                class="form-control AlterInput propel-key-press-input-mendatory mobileOtp"
                                                id="otp" type="text" id="verification"
                                                placeholder="Enter OTP Received on your Mobile" name="otp"
                                                class="propel-key-press-input-mendatory" />
                                            <span class="text-danger"></span>

                                            <span class="AlterInputLabel">OTP <sup>*</sup></span>
                                        </label>
                                        <span class="otp mb-4 text-bold resendOtpForMobile" id="rsotp">Resent
                                            OTP </span>
                                        <input type="hidden" name="mobiletempId" value="" class="mobiletempId">
                                    </div>
                                </div>
                                <div class="modal-footer border-0">

                                    <button
                                        class="propelbtn propelcurved  propelsubmit next-step-otp otpVerifiedForTempMobile"
                                        type="submit">Verify</button>

                                </div>
                            </form>
                        </div>
                        <div id="dotStep3">
                            <div class="d-flex justify-content-center m-2">
                                <div class="success-icon">
                                    <div class="success-icon__tip"></div>
                                    <div class="success-icon__long"></div>
                                </div>
                            </div>
                            <p class="d-flex justify-content-center m-2">Your Mobile &nbsp;<span
                                    class="mobile-add-number"></span>&nbsp; was added successfully</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Email Modal --}}

    <div class="modal fade overflow-hidden " id="EmailModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog mt-0 overflow-hidden" role="document">
            <div class="modal-content overflow-hidden">
                <div class="modal-header p-2 border-0">
                    <h3 class="modal-title w-100 text-center" id="exampleModalLabel">Add Email </h3>
                    <button type="button" class="propel-glass-btn close-btn email-modal" data-dismiss="modal"
                        aria-label="Close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2"
                                rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor"></rect>
                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                transform="rotate(45 8.46447 7.05029)" fill="currentColor"></rect>
                        </svg>
                    </button>
                </div>
                <div class="smartWizardDot">
                    <ul class="card-header">
                        <li><a href="#dotStep1">Step 1<br /><small>Enter Your Email</small></a></li>
                        <li><a href="#dotStep2">Step 2<br /><small>OTP Confirmation</small></a></li>
                        <li><a href="#dotStep3">Step 3<br /><small>Success</small></a></li>

                    </ul>

                    <div class="card-body">
                        <div id="dotStep1">

                            <form action="" onsubmit="return false">

                                <div class="modal-body border-bottom-0">
                                    <div class="form-group col-md-12">
                                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0 ">
                                            <input type="email" name="email"
                                                class="form-control AlterInput w-100 otp-email propel-key-press-input-mendatory secondEmail"
                                                placeholder="Enter Your Email">

                                            <span class="AlterInputLabel">Email<sup>*</sup></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button class="propelbtn propelcurved  propelsubmit next-step-email secondaryEmail"
                                        type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                        <div id="dotStep2">

                            <form action="" onsubmit="return false">
                                <div class="modal-body border-bottom-0">
                                    <div class="form-group col-md-12">
                                        <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                            <input
                                                class="form-control AlterInput propel-key-press-input-mendatory emailOtp"
                                                id="otp" type="text" id="verification"
                                                placeholder="Enter OTP Received on your Email" name="otp"
                                                class="propel-key-press-input-mendatory" />
                                            <input type="hidden" name="emailTempId" class="emailTempId" value="">

                                            <span class="text-danger"></span>
                                            <span class="AlterInputLabel">OTP</span>
                                        </label>
                                        <span class="otp mb-4 text-bold resendOtpForEmail" id="rsotp">Resent
                                            OTP</span>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">


                                    <button class="propelbtn propelcurved  propelsubmit next-step-otp otpVerifiedInEmail"
                                        type="submit">Verify</button>

                                </div>
                            </form>
                        </div>
                        <div id="dotStep3">
                            <div class="d-flex justify-content-center m-2">
                                <div class="success-icon">
                                    <div class="success-icon__tip"></div>
                                    <div class="success-icon__long"></div>
                                </div>
                            </div>
                            <p class="d-flex justify-content-center m-2">Your Email &nbsp;<span
                                    class="email-add-success"></span>&nbsp; was added successfully</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            //second Mobile
            $('.resendOtpForMobile').click(function() {
                var number = $(".otp-number").val();
                var mobiletempId = $(".mobiletempId").val();
                if (number && mobiletempId) {
                    resendOtpForTempMobile(number, mobiletempId);
                }

            });
            $('.resendOtpAsPrimary').click(function() {
                var part = $(this).attr('otp-part');
                var type = $(this).attr('otp-type');
                if (part && type) {
                    if (type == "mobile") {
                        resendOtpMobile(part)
                    } else {
                        resendOtpEmail(part)
                    }
                }
            });
            $('.resendOtpForValidation').click(function() {
                var part = $('.resendOtpForValidation').attr('target-value');
                var type = $('.resendOtpForValidation').attr('input-type');
                if (type == 'mobile') {
                    resendOtpMobile(part)
                } else {
                    resendOtpEmail(part)
                }
            });
            $('.validationMobile').click(function() {
                var part = $('.resendOtpForValidation').attr('target-value');
                var otp = $('.validationMobileOtp').val();
                var type = $('.resendOtpForValidation').attr('input-type');
                if (part && otp && type) {
                    if (type == 'mobile') {
                        OtpValidationForMobile(otp, part)
                    } else {
                        otpValidationByEmail(otp, part)
                    }
                }
            });
            $('.deleteMobileNumber').click(function() {
                var type = $('.getDeletedValue').attr('input-type');
                var part = $('.getDeletedValue').attr('target-value');
                if (type && part) {
                    if (type == 'mobile') {
                        deleteForMobileNumber(part)
                    } else {
                        deleteForEmail(part)
                    }

                }
            });
            $('.otpVerifiedForTempMobile').click(function() {
                var otp = $('.mobileOtp').val();
                var number = $(".otp-number").val();
                var mobiletempId = $(".mobiletempId").val();
                if (otp && number && mobiletempId) {
                    OtpValidationForTempMobile(otp, number, mobiletempId)
                }
            });
            $('.otpValidateForPrimary').click(function() {
                var otp = $('.otpPrimary').val();
                var part = $(this).attr('otp-part');
                var type = $(this).attr('otp-type');
                if (otp && part && type) {
                    if (type == 'mobile') {
                        mobileChangeToPrimary(otp, part)
                    } else {
                        emailChangeToPrimary(otp, part)
                    }
                }
            });
            //seondaryEmail
            $('.resendOtpForEmail').click(function() {
                var email = $(".otp-email").val();
                var emailTempId = $('.emailTempId').val();
                if (email && emailTempId) {
                    resendOtpForTempEmail(email, emailTempId)
                }
            });
            $('.otpVerifiedInEmail').click(function() {
                var email = $(".otp-email").val();
                var otp = $('.emailOtp').val();
                var emailTempId = $('.emailTempId').val();
                if (email && otp && emailTempId) {
                    OtpValidationForTempEmail(otp, email, emailTempId)
                }
            });


            //second Mobile function
            function addSecondNumber(number) {
                if (number) {
                    $.ajax({
                        url: "{{ route('addOtherMobile') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            number: number
                        },
                        success: function(data) {
                            if (data.type == 1) {
                                var MobiletempId = data.data.id;
                                $('.mobiletempId').val(MobiletempId);
                                propelStatus('success', 'OTP Send Your MobileNumber');
                                $('#MobileNumberModal .smartWizardDot').smartWizard("next");
                            } else if (data.type == 2) {
                                propelStatus('danger', 'This Number Is Already Exists in Yours');
                            } else {
                                propelStatus('danger', 'This Number Is Already Exists in User');
                            }
                        },
                        error: function() {}
                    });
                } else {

                }

            }

            function resendOtpMobile(number) {
                if (number) {
                    $.ajax({
                        url: "{{ route('resendOtpForMobile') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            number: number
                        },
                        success: function(data) {
                            var type = data.type;
                            if (type == 1) {
                                propelStatus('success', 'OTP Send Your MobileNumber');

                            }

                        },
                        error: function() {

                        }

                    });
                }
            }

            function OtpValidationForMobile(otp, number) {
                if (otp && number) {
                    $.ajax({
                        url: "{{ route('OtpVerifiedForMobile') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            otp: otp,
                            number: number
                        },
                        success: function(data) {
                            var type = data.type;
                            if (type == 1) {
                                propelStatus('success', 'OTP Validation Successfully');
                                $('#validateModal .smartWizardDot').smartWizard("next");

                            } else {
                                propelStatus('danger', 'OTP Validation Failed');
                            }
                        },
                        error: function() {}
                    });

                }
            }

            function mobileChangeToPrimary(otp, number) {
                if (otp && number) {

                    $.ajax({
                        url: "{{ route('secondNumberChangeToPrimary') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            otp: otp,
                            number: number
                        },
                        success: function(data) {
                            var type = data.type;
                            if (type == 1) {
                                propelStatus('success', 'Primary changed successfully');
                                $('#PrimaryModal .smartWizardDot').smartWizard("next");
                            } else {
                                propelStatus('danger', 'OTP Validation Failed');
                            }


                        },
                        error: function() {}
                    });


                }
            }

            function deleteForMobileNumber(number) {
                if (number) {
                    $.ajax({
                        url: "{{ route('deleteForMobileNumber') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            number: number
                        },
                        success: function(data) {
                            propelStatus('success', data.Message);

                        },
                        error: function() {}
                    });

                }

            }
            // secondary Email

            function addSecondEmail(email) {
                if (email) {
                    $.ajax({
                        url: "{{ route('addOtherEmail') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            email: email
                        },
                        success: function(data) {
                            if (data.type == 1) {
                                var emailTempId = data.data.id;
                                $('.emailTempId').val(emailTempId);
                                propelStatus('success', 'OTP Send Your Email');
                                $('#EmailModal .smartWizardDot').smartWizard("next");
                            } else if (data.type == 2) {
                                propelStatus('danger', 'This Email Is Already Exists in Yours');
                            } else {
                                propelStatus('danger', 'This Email Is Already Exists in User');
                            }
                        },
                        error: function() {

                        }

                    });

                } else {
                    propelStatus('danger', 'Enter Your Crt Eamil');
                }


            }

            function resendOtpEmail(email) {
                if (email) {
                    $.ajax({
                        url: "{{ route('resendOtpForEmail') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            email: email
                        },
                        success: function(data) {
                            var type = data.type;
                            if (type == 1) {
                                propelStatus('success', 'OTP Send Your Email');
                            }
                        },
                        error: function() {

                        }

                    });
                }
            }

            function otpValidationByEmail(otp, email) {
                if (otp && email) {
                    $.ajax({
                        url: "{{ route('otpValidationByEmail') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            otp: otp,
                            email: email
                        },
                        success: function(data) {
                            var type = data.type;
                            if (type == 1) {
                                propelStatus('success', 'validation Successfully');
                                $('#validateModal .smartWizardDot').smartWizard("next");
                            } else {
                                propelStatus('danger', 'validation Failed');
                            }
                        },
                        error: function() {

                        }

                    });

                }
            }

            function emailChangeToPrimary(otp, email) {
                if (otp && email) {

                    $.ajax({
                        url: "{{ route('seconEmailChangeToPrimary') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            otp: otp,
                            email: email
                        },
                        success: function(data) {
                            var type = data.type;
                            if (type == 1) {
                                propelStatus('success', 'Email Change as Primary');
                                $('#PrimaryModal .smartWizardDot').smartWizard("next");
                            } else {
                                propelStatus('danger', 'OTP Validation Failed');
                            }
                        },
                        error: function() {}
                    });
                }
            }

            function resendOtpForTempMobile(number, id) {
                if (number && id) {
                    $.ajax({
                        url: "{{ route('resendOtpForTempMobileNo') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            tempId: id,
                            number: number
                        },
                        success: function(data) {
                            if (data.data == 1) {
                                propelStatus('success', 'resend OTP Successfully');
                            } else {
                                propelStatus('danger', 'resend OTP Failed');
                            }
                        },
                        error: function() {}
                    });
                }
            }

            function OtpValidationForTempMobile(otp, number, tempId) {
                if (otp && number && tempId) {
                    $.ajax({
                        url: "{{ route('OtpValidationForTempMobile') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            mobileOtp: otp,
                            number: number,
                            tempId: tempId

                        },
                        success: function(data) {
                            var message = data.message;
                            if (message == 'Success') {
                                propelStatus('success', 'OTP Validation Successfully');
                                $('#MobileNumberModal .smartWizardDot').smartWizard("next");
                            } else {
                                propelStatus('danger', 'OTP Validation Failed');
                            }

                        },
                        error: function() {}
                    });
                }
            }

            function deleteForEmail(email) {
                if (email) {
                    $.ajax({
                        url: "{{ route('deleteForEmail') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            email: email
                        },
                        success: function(data) {
                            propelStatus('success', data.message);
                        },
                        error: function() {}
                    });
                }
            }

            function resendOtpForTempEmail(email, id) {
                if (email && id) {
                    $.ajax({
                        url: "{{ route('resendOtpForTempEmail') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            tempId: id,
                            email: email
                        },
                        success: function(data) {
                            if (data.data == 1) {
                                propelStatus('success', 'OTP Send Your Email');
                            } else {
                                propelStatus('danger', 'OTP Send Failed');
                            }
                        },
                        error: function() {}
                    });
                }
            }

            function OtpValidationForTempEmail(otp, email, tempId) {
                if (otp && email && tempId) {
                    $.ajax({
                        url: "{{ route('OtpValidationForTempEmail') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            emailOtp: otp,
                            email: email,
                            tempId: tempId
                        },
                        success: function(data) {
                            var message = data.message;
                            if (message == 'Success') {
                                propelStatus('success', 'OTP Validation Successfully');
                                $('#EmailModal .smartWizardDot').smartWizard("next");
                            } else {
                                propelStatus('danger', 'OTP Validation Failed');
                            }

                        },
                        error: function() {}
                    });
                }
            }
            // primary MOdal
            $(".primary-modal").click(function() {
                if ($(this).attr("input-type") == "email") {
                    $("#primary-heading").html("Change Email as Primary");
                    $(".confirmation-text").html(
                        "This action will replace your Primary Email<br> and your login will also be changed,<br>Do you want to make the change?"
                    );
                    $("#PrimaryModal #otp").attr("placeholder", "Enter OTP Received on your Email " + $(
                        this).attr("target-value") + "");
                    $("#PrimaryModal .primary-email-add-success").html("Email " + $(this).attr(
                        "target-value"));
                    $("#PrimaryModal .resendOtpAsPrimary").attr("otp-part", $(this).attr("target-value"));
                    $("#PrimaryModal .resendOtpAsPrimary").attr("otp-type", "email");
                    $("#PrimaryModal .otpValidateForPrimary").attr("otp-part", $(this).attr(
                        "target-value"));
                    $("#PrimaryModal .otpValidateForPrimary").attr("otp-type", "email");


                } else {
                    $("#primary-heading").html("Change Mobile as Primary");
                    $(".confirmation-text").html(
                        "This action will replace your Primary Mobile<br> and your login will also be changed,<br>Do you want to make the change?"
                    );
                    $("#PrimaryModal #otp").attr("placeholder",
                        "Enter OTP Received on your Mobile Number " + $(this).attr("target-value"));
                    $("#PrimaryModal .primary-email-add-success").html("Mobile Number " + $(this).attr(
                        "target-value"));
                    $("#PrimaryModal .resendOtpAsPrimary").attr("otp-part", $(this).attr("target-value"));
                    $("#PrimaryModal .resendOtpAsPrimary").attr("otp-type", "mobile");
                    $("#PrimaryModal .otpValidateForPrimary").attr("otp-part", $(this).attr(
                        "target-value"));
                    $("#PrimaryModal .otpValidateForPrimary").attr("otp-type", "mobile");
                }
            });
            $("#PrimaryModal  .next-step-primary").click(function(e) {

                if (!$(this).hasClass("disable")) {
                    $('#PrimaryModal .smartWizardDot').smartWizard("next");
                    // $("#PrimaryModal #otp").attr("placeholder", "Enter OTP Received on your Mobile ");
                }
            });
            $("#PrimaryModal   .next-step-otp").click(function(e) {

                if (!$(this).hasClass("disable")) {

                    $("#PrimaryModal  .mobile-add-number").html($(".otp-number").val());
                }

            });
            $("#PrimaryModal  .prev-step").click(function(e) {

                $('#PrimaryModal  .smartWizardDot').smartWizard("prev");
                // $("#verification").attr("placeholder", "Enter OTP Received on your Mobile"+$(".otp-number").val());

            });

            $(".primary-modal-close").click(function() {
                $("#PrimaryModal .smartWizardDot").smartWizard('reset');
                $("#PrimaryModal .smartWizardDot form").each(function() {
                    this.reset();
                });
            });
            // Validate Modal

            $(".validate-modal").click(function() {
                if ($(this).attr("input-type") == "email") {
                    $("#validate-heading").html("Email Validation");
                    $("#validateModal #otp").attr("placeholder", "Enter OTP Received on your Email " + $(
                        this).attr("target-value") + "");
                    $("#validateModal .validate-email-add-success").html("Email " + $(this).attr(
                        "target-value"));



                } else {
                    $("#validate-heading").html("Mobile Validation");
                    $("#validateModal #otp").attr("placeholder",
                        "Enter OTP Received on your Mobile Number " + $(this).attr("target-value"));
                    $("#validateModal .validate-email-add-success").html("Mobile Number " + $(this).attr(
                        "target-value"));
                    $("#validateModal .resendOtpForValidation").attr("otp-mobile", $(this).attr(
                        "target-value"));
                }
            });
            $("#validateModal  .next-step-validate").click(function(e) {
                if (!$(this).hasClass("disable")) {
                    $('#validateModal .smartWizardDot').smartWizard("next");
                }

            });
            $("#validateModal   .next-step-otp").click(function(e) {
                if (!$(this).hasClass("disable")) {

                    $("#validateModal  .mobile-add-number").html($(".otp-number").val());
                }

            });
            $("#validateModal  .prev-step").click(function(e) {

                $('#validateModal  .smartWizardDot').smartWizard("prev");

            });

            $(".validate-modal-close").click(function() {
                $("#validateModal .smartWizardDot").smartWizard('reset');
                $("#validateModal .smartWizardDot form").each(function() {
                    this.reset();
                });
            });

            // delete MOdal
            $(".delete-modal").click(function() {
                if ($(this).attr("input-type") == "email") {
                    $("#delete-heading").html("Email Delete");
                    $("#deleteModal .confirmation-text").html("Confirm to Remove email" + $(this).attr(
                        "target-value"));

                    $("#deleteModal .delete-email-add-success").html("Email " + $(this).attr(
                        "target-value"));

                } else {
                    $("#delete-heading").html("Mobile Delete");
                    $(".confirmation-text").html("Confirm to Remove Mobile" + $(this).attr("target-value"));
                    $("#deleteModal .delete-email-add-success").html("Mobile Number " + $(this).attr(
                        "target-value"));
                    $("#deleteModal .deleteMobileNumber ").attr("otp-mobile", $(this).attr(
                        "target-value"));

                }
            });
            $("#deleteModal  .next-step-delete").click(function(e) {
                if (!$(this).hasClass("disable")) {
                    $('#deleteModal .smartWizardDot').smartWizard("next");
                    // $("#deleteModal #otp").attr("placeholder", "Enter OTP Received on your Mobile ");
                }

            });

            $("#deleteModal   .next-step-otp").click(function(e) {
                if (!$(this).hasClass("disable")) {
                    $('#deleteModal .smartWizardDot').smartWizard("next");
                    $("#deleteModal  .mobile-add-number").html($(".otp-number").val());
                }

            });
            $("#deleteModal  .prev-step").click(function(e) {

                $('#deleteModal  .smartWizardDot').smartWizard("prev");
                // $("#verification").attr("placeholder", "Enter OTP Received on your Mobile"+$(".otp-number").val());

            });

            $(".delete-modal-close").click(function() {
                $("#deleteModal .smartWizardDot").smartWizard('reset');
                $("#deleteModal .smartWizardDot form").each(function() {
                    this.reset();
                });
            });

            // Mobile Modal

            $("#MobileNumberModal  .next-step-mobile").click(function(e) {


                if (!$(this).hasClass("disable")) {
                    $("#MobileNumberModal #otp").attr("placeholder", "Enter OTP Received on your Mobile " +
                        $(".otp-number").val());
                    var number = $(".otp-number").val();
                    addSecondNumber(number)
                }
            });
            $("#MobileNumberModal  .next-step-otp").click(function(e) {
                if (!$(this).hasClass("disable")) {
                    $("#MobileNumberModal  .mobile-add-number").html($(".otp-number").val());
                }

            });
            $("#MobileNumberModal  .prev-step").click(function(e) {

                $('#MobileNumberModal  .smartWizardDot').smartWizard("prev");
                // $("#verification").attr("placeholder", "Enter OTP Received on your Mobile"+$(".otp-number").val());

            });

            $(".mobile-number-modal").click(function() {
                $("#MobileNumberModal .smartWizardDot").smartWizard('reset');
                $("#MobileNumberModal .smartWizardDot form").each(function() {
                    this.reset();
                });
            });

            // Email Modal
            $("#EmailModal  .next-step-email").click(function(e) {

                if (!$(this).hasClass("disable")) {
                    $("#EmailModal #otp").attr("placeholder", "Enter OTP Received on your Email " + $(
                        ".otp-email").val());
                    var email = $(".otp-email").val();
                    addSecondEmail(email);
                }

            });
            $("#EmailModal  .next-step-otp").click(function(e) {
                if (!$(this).hasClass("disable")) {
                    $("#EmailModal  .email-add-success").html($(".otp-email").val());
                }

            });
            $("#EmailModal  .prev-step").click(function(e) {

                $('#EmailModal  .smartWizardDot').smartWizard("prev");
                // $("#verification").attr("placeholder", "Enter OTP Received on your Mobile"+$(".otp-number").val());

            });

            $(".email-modal").click(function() {
                $("#EmailModal .smartWizardDot").smartWizard('reset');
                $("#EmailModal .smartWizardDot form").each(function() {
                    this.reset();
                });
            });



                
            

            imgInp.onchange = evt => {
                $('.profile-black').addClass("d-none");
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }
        });

        $(".motherLanguage").change(function(e) {
            let val = $(this).val();
            if (val) {
                $(".otherLanguage").prop("disabled", false);
                $(".otherLanguage").find('option[value="' + val + '"]').remove();
            }
        });

        $(document).on("click", ".otherLanguage ~ .select2-container--disabled", function() {
            DefaultPropelAlert("Kindly Choose Mother Tongue First");
        });




        $(document).click(function(e) {
            if (!$(e.target).parent().closest('.InputLabel').length) {
                $(".input-popup").addClass("d-none");
            }
        });
        $('.user-modification-popover').click(function(e) {
            let inputType = $(this).attr("data-for");
            let targetValue = $(this).parent(".InputLabel").find("input").val();

            $(".input-popup li").attr("input-type", inputType);
            $(".input-popup li").attr("target-value", targetValue);

            const buttonRect = this.getBoundingClientRect();
            const popover = $('.input-popup');
            const popoverWidth = popover.width();
            $(".input-popup").removeClass("d-none");
            if (buttonRect.left + popoverWidth > $(window).width()) {
                popover.css({
                    'top': buttonRect.top + 20,
                    'left': buttonRect.right - popoverWidth + 20,
                    'right': 'auto'
                });
            } else if (buttonRect.left < 0) {
                popover.css({
                    'left': '50%',
                    'right': 'auto',
                    'transform': 'translateX(-50%)'
                });
            } else {
                popover.css({
                    'top': buttonRect.top + 20,
                    'left': buttonRect.left + 20,
                    'right': 'auto',
                    'transform': 'none'
                });
            }

        });
    </script>
    <style>
        .close-btn {
            background-color: rgb(239, 5, 5);
            box-shadow: 0 4px 9px -4px rgb(239, 5, 5);
            font-weight: 800;
            width: 25px;
            height: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .close-btn:hover {
            box-shadow: 0 4px 9px -4px rgb(239, 5, 5);
        }

        .close-btn svg {
            transform: scale(2);
            fill: white
        }

        .profile-img-container {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-img-container img {
            object-position: center;
            width: 210px;
            height: 210px;
        }

        .profile-img-container:hover .profile-black {
            display: flex !important;

        }

        .profile-black {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: pointer;
            border-radius: 50%;
        }

        .profile-black svg {
            color: white;
            transition: 0.1s;
            line-height: 0;
            font-style: normal;
            width: 15px;
            fill: white;
        }

        .profile-black span {
            color: white;
        }

        .profile-black:hover svg {
            scale: 1.3;

        }

        #customButtons3 .form-group {
            margin-bottom: 0 !important;
        }

        ul:has(li:first-child.active)~div>.prev-btn {
            display: none;
        }

        .modal-content {

            border-radius: 10px !important;
        }

        .modal-dialog {
            height: 100vh;
            display: flex;
            align-items: center;

        }

        .success-icon {
            display: inline-block;
            width: 8em;
            height: 8em;
            font-size: 20px;
            border-radius: 50%;
            border: 4px solid #96df8f;
            background-color: #fff;
            position: relative;
            overflow: hidden;
            transform-origin: center;
            -webkit-animation: showSuccess 180ms ease-in-out;
            animation: showSuccess 180ms ease-in-out;
            transform: scale(1);
        }

        .success-icon__tip,
        .success-icon__long {
            display: block;
            position: absolute;
            height: 4px;
            background-color: #96df8f;
            border-radius: 10px;
        }

        .success-icon__tip {
            width: 2.4em;
            top: 4.3em;
            left: 1.4em;
            transform: rotate(45deg);
            -webkit-animation: tipInPlace 300ms ease-in-out;
            animation: tipInPlace 300ms ease-in-out;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-delay: 180ms;
            animation-delay: 180ms;
            visibility: hidden;
        }

        .success-icon__long {
            width: 4em;
            transform: rotate(-45deg);
            top: 3.7em;
            left: 2.75em;
            -webkit-animation: longInPlace 140ms ease-in-out;
            animation: longInPlace 140ms ease-in-out;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            visibility: hidden;
            -webkit-animation-delay: 440ms;
            animation-delay: 440ms;
        }

        @-webkit-keyframes showSuccess {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        @keyframes showSuccess {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        @-webkit-keyframes tipInPlace {
            from {
                width: 0em;
                top: 0em;
                left: -1.6em;
            }

            to {
                width: 2.4em;
                top: 4.3em;
                left: 1.4em;
                visibility: visible;
            }
        }

        @keyframes tipInPlace {
            from {
                width: 0em;
                top: 0em;
                left: -1.6em;
            }

            to {
                width: 2.4em;
                top: 4.3em;
                left: 1.4em;
                visibility: visible;
            }
        }

        @-webkit-keyframes longInPlace {
            from {
                width: 0em;
                top: 5.1em;
                left: 3.2em;
            }

            to {
                width: 4em;
                top: 3.7em;
                left: 2.75em;
                visibility: visible;
            }
        }

        @keyframes longInPlace {
            from {
                width: 0em;
                top: 5.1em;
                left: 3.2em;
            }

            to {
                width: 4em;
                top: 3.7em;
                left: 2.75em;
                visibility: visible;
            }
        }

        /* #WizardForm{ */
        /* background:url("{{ asset('img/bgimage/addresource.webp') }}") ; */
        /* } */
    </style>
@endsection
<script>
    
    function validCheck(event) {
            
            let contForm = $(event).closest("form").find("input.needValidation , select.needValidation");
                $("#WizardForm .propel-key-press-input-mendatory.needValidation[validate=notValidate]")
                    .attr('validate', 'failure');
                $(" #WizardForm .propel-key-press-input-mendatory.needValidation[validate=validateRequired]")
                    .attr('validate', 'failure');
                for (let i = 0; i < contForm.length; i++) {
                    var inputAttr = contForm[i].getAttribute('validate');
                    if (inputAttr != "failure" && inputAttr != "validateRequired") {} else {
                 return false;
                    }
                }
          }
</script>