@extends('layouts.dashboard.app')
@section('content')
<link rel="stylesheet" href="css/vendor/smart_wizard.min.css" />

{{-- This is For Navigation and Breadcrumbs --}}

<!-- | -->
<div class="hrm0 resource0 addresource0 for-active">
    <!-- | -->
    <!-- | -->
    <div class="addresource">
        <!-- | -->
        <!-- | --> <span>add resource</span> <!-- | -->
        <!-- | -->
    </div> <!-- | -->
    <!-- | -->
</div> <!-- | -->

{{-- ------------------------------------------------------------------------------------------------------------------- --}}


<form action="{{ route('hrmResource.store') }}" method="post" class="card m-2 shadow-none" id="WizardForm" style="background-image: url('{{ asset('img/bgimage/addresource.webp')}}');">
    {{csrf_field()}}
    <div id="smartWizardCustomButtons">
        <ul class="card-header top-list-wizard" style="display:flex;justify-content:space-between;">
            <li><a href="#customButtons1">Official
                    <!--<br /><small>First step description</small>-->
                </a></li>
            <li><a href="#customButtons2">Personal
                    <!--<br /><small>Second step description</small>-->
                </a></li>
            <li><a href="#customButtons3">Communication
                    <!--<br /><small>Third step description</small>-->
                </a></li>
            <li><a href="#customButtons4">ID & Documents
                    <!--<br /><small>Third step description</small>-->
                </a></li>
            <li><a href="#customButtons5">Education
                    <!--<br /><small>Third step description</small>-->
                </a></li>
            <li><a href="#customButtons6">Profession
                    <!--<br /><small>Third step description</small>-->
                </a></li>
            <li><a href="#customButtons7">Bank
                    <!--<br /><small>Third step description</small>-->
                </a></li>
            <!-- <li><a href="#customButtons8">Family
                   <br /><small>Third step description</small>  </a></li> -->

        </ul>

        <div class="card-body col-12">
            <div id="customButtons1">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" name="resourceCode" class="form-control AlterInput w-100 propel-key-press-input-mendatory" placeholder="Ex : Something">
                            <span class="AlterInputLabel">Specific Organization Code for resource <sup>*</sup></span>

                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <select class="search-need form-select w-100 AlterInput" name="resourceTypeId">
                                <option disabled selected>Resource Type</option>

                                @foreach($hrmResources as $resource)
                                <option value="{{$resource['id']}}">{{$resource['name']}}</option>
                                @endforeach
                            </select>
                            <span class="AlterInputLabel">Resource Type<sup>*</sup></span>
                        </label>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <select class="search-need form-select w-100 AlterInput department" name="department">
                                <option selected disabled>Department</option>
                                @foreach($hrmDepartmentLists as $department)
                                <option value="{{$department['id']}}">{{$department['department_name']}}</option>
                                @endforeach
                            </select>
                            <span class="AlterInputLabel">Departments<sup>*</sup></span>
                        </label>
                    </div>


                    <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <select class="sdearch-need form-select w-100 AlterInput designation" name="designationId">
                                <option selected disabled>Designation</option>

                                <option value=""></option>

                            </select>
                            <span class="AlterInputLabel">Designations<sup>*</sup></span>
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" name="resourceJoinDate" placeholder="date" validationAttr="date" class="form-control  AlterInput w-100 datepicker">
                            <span class="AlterInputLabel">Date of Joining<sup>*</sup></span>

                        </label>
                    </div>


                    {{-- <div class="form-group col-md-6 ">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" name="accountName" class="form-control AlterInput w-100  " placeholder="Account Ledger Name...">
                            <span class="AlterInputLabel">Account Ledger Name<small>(its slected from
                                    books)</small></span>
                        </label>
                        
                    </div> --}}
                </div>

            </div>
            <div id="customButtons2">
                <div class="col-lg-12 d-flex justify-content-between flex-wrap">
                    <div class="col-lg-3 ">
                        <label for="imgInp" class="profile-img-container m-auto">
                            <input accept="image/*" type='file' id="imgInp" name="imgInp" class="d-none" />
                            <img src="{{asset('img/images (1).png')}}" id="blah" alt="Person Profile">
                            <div class="profile-black">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z" /></svg><br>
                                <span>Add Profile</span>
                            </div>
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-row">
                            <div class="form-group col-md-6 d-flex align-items-center">
                                <div class="input-group-prepend w-20">
                                    <label class="form-group  p-0   InputLabel w-100 ">
                                        <select class="form-select w-100 " name="salutationId" style="border-top-right-radius:0 !important; border-bottom-right-radius:0 !important;">
                                            <option selected value="" disabled>S</option>
                                            @foreach($saluationLists as $saluation)
                                            <option value="{{$saluation['id']}}" {{$personData['salutation_id'] == $saluation['id'] ? 'selected' : ''}}>{{$saluation['salutation']}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                                <label class="form-group  p-0   InputLabel w-80 ">
                                    <input type="text" name="firstName" class="form-control AlterInput w-100 propel-key-press-input-mendatory" value="{{$personData['first_name']}}" placeholder="First Name..." style="border-top-left-radius:0 !important; border-bottom-left-radius:0 !important;">
                                    <span class="AlterInputLabel">First Name <sup>*</sup></span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="middleName" class="form-control AlterInput w-100 " placeholder="Middle Name..." value="{{$personData['middle_name']}}">
                                    <span class="AlterInputLabel">Middle Name</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="lastName" class="form-control AlterInput w-100 " placeholder="Last Name or Initial..." value="{{$personData['last_name']}}">
                                    <span class="AlterInputLabel">Last Name or Initial</span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="nickName" class="form-control AlterInput w-100 " placeholder="Account Ledger Name..." value="{{$personData['nick_name']}}">
                                    <span class="AlterInputLabel">Nick Name or Alias</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" placeholder="date" name="dob" validationAttr="date" class="form-control AlterInput w-100 datepicker" placeholder="DOB..." value="{{$personData['dob']}}">
                                    <span class="AlterInputLabel">DOB <sup>*</sup></span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="birthCity" class="form-control AlterInput w-100  " placeholder="Birth City..." value="{{$personData['birth_place']}}">
                                    <span class="AlterInputLabel">Birth City</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <select class="form-select w-100 AlterInput" name="bloodGroup">
                                        <option selected value="" disabled>Blood Group</option>
                                        @foreach($bloodGroupLists as $bloodGroup)
                                        <option value="{{$bloodGroup['id']}}" {{$personData['blood_group_id'] == $bloodGroup['id'] ? 'selected' : ''}}>{{$bloodGroup['blood_group']}}</option>
                                        @endforeach

                                    </select>
                                    <span class="AlterInputLabel">Blood Group</span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <select class="form-select w-100 AlterInput " name="genderId">
                                        <option selected value="" disabled>Gender</option>
                                        @foreach($genderLists as $gender)
                                        <option value="{{$gender['id']}}" {{$personData['gender_id'] == $gender['id'] ? 'selected' : ''}}>{{$gender['gender']}}</option>
                                        @endforeach

                                    </select>
                                    <span class="AlterInputLabel">Gender</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <select class="form-select w-100 AlterInput" name="maritalStatus">
                                        <option selected value="" disabled>Marital Status</option>
                                        @foreach($maritalStatus as $status)
                                        <option value="{{$status['id']}}" {{$status['id'] == $personData['marital_id'] ? 'selected' : ''}}>{{$status['name']}}</option>
                                        @endforeach
                                    </select>
                                    <span class="AlterInputLabel">Marital status</span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" placeholder="Anniversary Date..." value="" validationAttr="date" name="anniversaryDate" class="form-control AlterInput w-100  datepicker" placeholder="Anniversary Date...">
                                    <span class="AlterInputLabel">Anniversary Date</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <select class=" form-select w-100 AlterInput" name="motherLanguage">
                                        <option value="0" selected disabled>Mother Tongue</option>
                                        {{-- @foreach($languages as $language)
                                        <option value="{{$language['name']}}" {{$language['name'] == $motherTounge ? 'selected' : ''}}>{{$language['name']}}</option>
                                        @endforeach --}}
                                    </select>
                                    <span class="AlterInputLabel">Mother Tongue<sup>*</sup></span>
                                </label>
                            </div>
                            {{-- APPEND Lines --}}
                            @foreach($otherLanguages as $otherlang)
                            <div class="form-group col-md-5 ">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <select class=" form-select w-100 AlterInput" name="otherLanguage[]">
                                        <option value="0" selected disabled>Other Language</option>
                                        @foreach($languages as $language)
                                        <option value="{{$language['id']}}" {{$language['id'] == $otherlang['language_id'] ? 'selected' : ''}}>{{$language['name']}}</option>
                                        @endforeach
                                    </select>
                                    <span class="AlterInputLabel">Other Language<sup>*</sup></span>
                                </label>
                            </div>
                            @endforeach
                            <span class="add-append-icon ToDo mt-1 ml-1" style="background: rgb(128,0,255);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg></span>
                        </div>
                    </div>
                </div>
            </div>


            <div id="customButtons3">
                <div class="form-row">
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="mobileNumber" class="form-control AlterInput w-100 " placeholder="primary Mobile..." readonly value="{{$personData['mobile_no']}}">
                            <span class="AlterInputLabel">Primary Mobile<sup>*</sup></span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="text" name="secondNumber[]" class="form-control AlterInput w-100" validateAttr="mobile-num" placeholder="Other Mobile...">
                            <span class="AlterInputLabel">Other Mobile </span>
                        </label>
                    </div>
                    <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></span>

                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 m-1">

                            <input type="email" name="email" class="form-control AlterInput w-100  " placeholder="Primary Email..." readonly value="{{$personData['email']}}">
                            <span class="AlterInputLabel">Primary Email<sup>*</sup></span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 ml-0">
                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="email" name="secondEmail[]" class="form-control AlterInput w-100  " placeholder="Other Email...">
                            <span class="AlterInputLabel">Other Email </span>
                        </label>

                    </div>
                    <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></span>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="url" name="webLinks[]" class="form-control AlterInput w-100" placeholder="Web Links...">
                            <span class="AlterInputLabel">Web Links</span>
                        </label>
                    </div>
                    <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></span>
                </div>
                <hr>
                <div class="col-12 p-0">
                    <div class="form-row  ">
                        @foreach($personAddresses as $address)
                        <div class="form-group col-md-2">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <select class="form-select w-100 todoRequired AlterInput" name="addressOf[]">
                                    <option selected value="" disabled>Address of</option>
                                    @foreach($addressOfLists as $add)
                                    <option value="{{$add['id']}}" {{$add['id'] == $address['address_type'] ? 'selected' : ''}}>{{$add['address_of']}}</option>
                                    @endforeach
                                </select>
                                <span class="AlterInputLabel">Address of</span>

                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="doorNo[]" value="{{$address['door_no']}}" class="form-control AlterInput w-100  todoRequired" placeholder="Door No...">
                                <span class="AlterInputLabel">Door No </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="buildingName[]" value="{{$address['building_name']}}" class="form-control AlterInput w-100  " placeholder="Building Name...">
                                <span class="AlterInputLabel">Building Name
                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="street[]" value="{{$address['street']}}" class="form-control AlterInput w-100  " placeholder="Street...">
                                <span class="AlterInputLabel">Street
                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="landMark[]" value="{{$address['land_mark']}}" class="form-control AlterInput w-100  " placeholder="Land Mark...">
                                <span class="AlterInputLabel">Land Mark
                                </span>
                            </label>
                        </div>

                    </div>

                    <div class="form-row  ">
                        <div class="form-group col-md-2 ">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="pinCode[]" value="{{$address['pin']}}" class="form-control AlterInput w-100  todoRequired" placeholder="Pin code...">
                                <span class="AlterInputLabel">Pin code

                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="state[]" value="{{$address['state_id']}}" class="form-control AlterInput w-100  " placeholder="State...">
                                <span class="AlterInputLabel">State</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="city[]" value="{{$address['city_id']}}" class="form-control AlterInput w-100  " placeholder="City...">
                                <span class="AlterInputLabel">City</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="district[]" value="{{$address['district']}}" class="form-control AlterInput w-100  " placeholder="District...">
                                <span class="AlterInputLabel">District</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="area[]" value="{{$address['area']}}" class="form-control AlterInput w-100  " placeholder="Area...">
                                <span class="AlterInputLabel">Area</span>
                            </label>

                        </div>
                        @endforeach
                    </div>

                </div>
                <span class="add-append-icon ToDo mt-1 ml-4" style="background: rgb(128,0,255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></span>
                <hr>
            </div>
            <div id="customButtons4">
                <div class="form-row mt-4">
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <select class="form-select w-100 todoRequired AlterInput docType" name="idDocumentType[]">
                                <option selected value="" disabled>Type ID/Doc</option>
                                @foreach($idDocumentTypes as $idDocumentType)
                                <option value="{{$idDocumentType['id']}}">{{$idDocumentType['person_doc_type']}}</option>
                                @endforeach
                            </select>
                            <span class="AlterInputLabel">Type ID/Doc</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="documentNumber[]" class="form-control AlterInput w-100  todoRequired  docvalid" placeholder="DOC No...">
                            <span class="AlterInputLabel">DOC No</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="validTill[]" class="form-control AlterInput w-100   docvalid" placeholder="Valid Till...">
                            <span class="AlterInputLabel">Valid Till</span>
                        </label>
                    </div>

                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="File" name="attachments[]" class="form-control AlterInput w-100" placeholder="Attachments..." multiple>
                            <span class="AlterInputLabel">Attachments</span>
                        </label>
                    </div>

                </div>
                <span class="add-append-icon ToDo mt-1 ml-2" style="background: rgb(128,0,255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></span>
            </div>
            <div id="customButtons5">
                <div class="form-row mt-4">
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="Qualification[]" class="form-control AlterInput w-100  todoRequired education" placeholder="Qualifications...">
                            <span class="AlterInputLabel">Qualifications</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="university[]" class="form-control AlterInput w-100  studies" placeholder="University...">
                            <span class="AlterInputLabel">University</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="passedYear[]" class="form-control AlterInput w-100  studies" placeholder="Year of Pass...">
                            <span class="AlterInputLabel">Year of Pass</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="mark[]" class="form-control AlterInput w-100  studies" placeholder="Mark/Grade...">
                            <span class="AlterInputLabel">Mark/Grade</span>
                        </label>
                    </div>


                </div>
                <span class="add-append-icon ToDo mt-1 ml-2" style="background: rgb(128,0,255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></span>
            </div>
            <div id="customButtons6">
                <div class="form-row mt-4">
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="ProfessionDepartment[]" class="form-control AlterInput w-100  todoRequired" placeholder="Department...">
                            <span class="AlterInputLabel">Department</span>
                        </label>
                    </div>
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="Designation[]" class="form-control AlterInput w-100  " placeholder="Designation...">
                            <span class="AlterInputLabel">Designation</span>
                        </label>
                    </div>
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="organization[]" class="form-control AlterInput w-100  " placeholder="Organisation...">
                            <span class="AlterInputLabel">Organisation</span>
                        </label>
                    </div>
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" placeholder="DateofJoining" validationAttr="date" name="joinDate[]" class="form-control AlterInput w-100 datepicker todoRequired" placeholder="DOJ...">
                            <span class="AlterInputLabel">DOJ</span>
                        </label>
                    </div>
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="reliveDate[]" placeholder="Date of Relieving..." validationAttr="date" class="form-control AlterInput w-100 datepicker todoRequired">
                            <span class="AlterInputLabel">DOR</span>
                        </label>
                    </div>
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="date" name="experinceYear[]" class="form-control AlterInput w-100  " placeholder="Year of Experince...">
                            <span class="AlterInputLabel">Year of Experince</span>
                        </label>
                    </div>

                </div>
                <span class="add-append-icon ToDo mt-1 ml-2" style="background: rgb(128,0,255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></span>
            </div>
            <div id="customButtons7">
                <div class="form-row mt-4">
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="AccountNumber[]" class="form-control AlterInput w-100  todoRequired" placeholder="Account No...">
                            <span class="AlterInputLabel">Account No </span>
                        </label>
                    </div>
                    <div class="form-group  m-1">
                        {{-- <label class="form-group  p-0   InputLabel w-100 m-1">
                            <select class="form-select w-100  AlterInput" name="accountType[]">
                                <option selected value="" disabled>Account Type</option>
                                <option selected value="1" >Saving</option>
                                @foreach($bankAccountTypes as $bankAccountType)
                                <option value="{{$bankAccountType['id']}}">{{$bankAccountType['name']}}</option>
                        @endforeach
                        </select>
                        <span class="AlterInputLabel">Account Type</span>
                        </label> --}}
                    </div>
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1 ">
                            <input type="text" name="bank[]" class="form-control AlterInput w-100  todoRequired" placeholder="Bank...">
                            <span class="AlterInputLabel">Bank</span>
                        </label>
                    </div>
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="branch[]" class="form-control AlterInput w-100  todoRequired" placeholder="Branch...">
                            <span class="AlterInputLabel">Branch</span>
                        </label>
                    </div>
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="bankState[]" class="form-control AlterInput w-100  todoRequired" placeholder="State...">
                            <span class="AlterInputLabel">State</span>
                        </label>
                    </div>
                    <div class="form-group  m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="ifscCode[]" class="form-control AlterInput w-100  todoRequired" placeholder="IFSC Code...">
                            <span class="AlterInputLabel">IFSC Code</span>
                        </label>
                    </div>

                </div>
                <span class="add-append-icon ToDo mt-1 ml-2" style="background: rgb(128,0,255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></span>
            </div>
            <!-- <div id="customButtons8">
                <div class="form-row">
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="familyName" class="form-control AlterInput w-100  " placeholder="Family Name...">
                            <span class="AlterInputLabel">Family Name</span>
                        </label>
                    </div>
                </div>
                <hr>
                <div class="form-row mt-4">
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="memberName[]" class="form-control AlterInput w-100  todoRequired" placeholder="Member Name...">
                            <span class="AlterInputLabel">Member Name</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <select class="form-select w-100 todoRequired AlterInput" name="relationship[]">
                                <option selected value="" disabled>Relationship</option>
                                <option value="">Worked</option>
                                <option value="">Worked</option>
                                <option value="">Worked</option>
                                <option value="">Worked</option>
                                <option value="">Worked</option>
                            </select>
                            <span class="AlterInputLabel">Relationship</span>
                        </label>
                    </div>

                    <div class="form-group col-md-2 m-1">

                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="occupation[]" class="form-control AlterInput w-100  " placeholder="Occupation...">
                            <span class="AlterInputLabel">Occupation</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="annualIncome[]" class="form-control AlterInput w-100  " placeholder="Annual Income...">
                            <span class="AlterInputLabel">Annual Income </span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <select class="form-select w-100 AlterInput" name="deponent[]">
                                <option selected value="" disabled>Deponent</option>
                                <option value="">Worked</option>
                                <option value="">Worked</option>
                                <option value="">Worked</option>
                                <option value="">Worked</option>
                                <option value="">Worked</option>
                            </select>
                            <span class="AlterInputLabel">Deponent</span>
                        </label>
                    </div>

                </div>
                <span class="add-append-icon ToDo mt-1 ml-2" style="background: rgb(128,0,255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></span>
            </div> -->
            <input type="hidden" name="personUid" value="{{$personData['uid']}}">
        </div>

        <div class="btn-toolbar custom-toolbar text-center card-body pt-0">
            <button class="propelbtn propelcurved  prev-btn propelback" type="button" name="previous">Previous</button>
            <button class="propelbtn propelcurved next-btn  wizard-move cont" id="ctn-btn" type="button" onclick="return false;" name="continue">continue</button>
            <button class="propelbtn propelcurved next-btn propelsubmit" id="sub-btn" type="submit">submit</button>
            <button class="propelbtn propelcurved reset-btn propelreset freset" type="reset" name="reset">Reset</button>
        </div>

    </div>

</form>
<script>
    $(document).ready(function() {
        $('.designation').attr('disabled', 'disabled');
        $(function() {
            $("#sub-btn").hide();
        });
        $('.docvalid').attr('disabled', 'disabled');
        $('.studies').attr('disabled', 'disabled');
    });
    $(".department").change(function() {
        $('.designation').removeAttr('disabled');
    });
    $('.docType').change(function() {
        $('.docvalid').removeAttr('disabled');
        $('.docvalid').addClass("propel-key-press-input-mendatory");

    });
    $('.education').keyup(function() {
        $('.studies').removeAttr('disabled');
        $('.studies').addClass("propel-key-press-input-mendatory");
    });

    // if ($('.nav-item.active').next().text().replace(/\s+/g, "") == "Family") {
    //     $('.cont').html("Submit");
    // }else{
    //     $('.cont').html("Continue");
    // }
    // if ($('.nav-item.active').text().replace(/\s+/g, "") == "Family") {

    //     // $("#WizardForm").submit();
    // }

    $('.freset').click(function() {
        $('.cont').html("Continue");
        if ($(this).text() == "Family") {
            $('.cont').html("Submit");
        } else {
            $('.cont').html("Continue");
        }
    });

    $(document).ready(function() {
        $('.department').on('change', function() {

            var deptId = $(this).val();

            if (deptId) {
                $.ajax({
                    url: 'getDesignationDataByDept',
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "deptId": deptId
                    },
                    dataType: "json",
                    success: function(data) {

                        if (data.length) {

                            $('.designation').empty();
                            $('.designation').append('<option hidden>Select Designation</option>');
                            $.each(data, function(key, value) {
                                $('select[name="designationId"]').append('<option value="' + value.id + '">' + value.designation_name + '</option>');
                            });
                        } else {

                            $('.designation').empty();
                            $('.designation').append('<option hidden>Data Not Found</option>');
                        }
                    }
                });
            } else {
                $('.designation').empty();
            }
        });
    });
</script>
<script>
    imgInp.onchange = evt => {
        $('.profile-black').addClass("d-none");
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
<script>
    $(".cont").click(function() {

        var inputWizard = $("" + $("li.nav-item.active a").attr("href") + " input");
        console.log(inputWizard.html());
        $("" + $("li.nav-item.active a").attr("href") + " .propel-key-press-input-mendatory.needValidation[validate=notValidate]").attr('validate', 'failure');
        $("" + $("li.nav-item.active a").attr("href") + " .propel-key-press-input-mendatory.needValidation[validate=validateRequired]").attr('validate', 'failure');
        for (let i = 0; i < inputWizard.length; i++) {
            var inputWizardAttr = inputWizard[i].getAttribute('validate');

            if (inputWizardAttr != "failure" && inputWizardAttr != "validateRequired") {
                // return true;

            } else {
                $("next-btn").removeEventListener();
            }
        }
    });

    $(".prev-btn").click(function() {
        if ($('.nav-item.active').text().replace(/\s+/g, "") == "Family") {
            $('.cont').html("Continue");
        }
    });
    $(".top-list-wizard li").click(function() {
        // alert("ok");
        if ($(this).text().replace(/\s+/g, "") == "Family") {
            $('.cont').html("Submit");
        } else {
            $('.cont').html("Continue");
        }
    });


    // $('body').keydown(function(e) {
    //     if(e.keyCode == 37) 
    //     {
    //         $("body").removeEventListener(); 
    //     }
    //     if(e.keyCode == 39) 
    //     {
    //         // return false;
    //         // $("body").removeEventListener(); 

    //     var inputWizard=$(""+$("li.nav-item.active a").attr("href")+" input");
    //     console.log(inputWizard.html());
    //     $(""+$("li.nav-item.active a").attr("href")+" .propel-key-press-input-mendatory.needValidation[validate=notValidate]").attr('validate','failure');  
    //     $(""+$("li.nav-item.active a").attr("href")+" .propel-key-press-input-mendatory.needValidation[validate=validateRequired]").attr('validate','failure'); 
    //     for (let i = 0; i < inputWizard.length; i++) {
    //         var inputWizardAttr=inputWizard[i].getAttribute('validate');

    //         if(inputWizardAttr != "failure" && inputWizardAttr != "validateRequired"){
    //             // return true;

    //         }
    //      else{

    //        break;
    //             }
    //     }
    //     }
    // });
</script>
<style>
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

    /* #WizardForm{ */
    /* background:url("{{asset('img/bgimage/addresource.webp')}}") ; */
    /* } */
</style>

@endsection