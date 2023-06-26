@extends('layouts.dashboard.app')
@section('content')
<link rel="stylesheet" href="css/vendor/smart_wizard.min.css" />

{{-- This is For Navigation and Breadcrumbs --}}

<!-- | -->
<div class="user0  MyProfile for-active">

    <!-- | -->
    <!-- | -->
    <div class="MyProfile">  
        <!-- | -->
        <!-- | --> <span>MyProfile</span> <!-- | -->
        <!-- | -->
    </div> <!-- | -->
    <!-- | -->
</div> <!-- | -->

{{-- ------------------------------------------------------------------------------------------------------------------- --}}


<form action="{{ route('save_profile') }}" method="post" class="card m-2 shadow-none" id="WizardForm"
    style="background-image: url('{{ asset('img/bgimage/addresource.webp')}}');">

    {{csrf_field()}}
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
                    <div class="col-lg-3" >
                        <label for="imgInp" class="profile-img-container m-auto">
                                            <input accept="image/*" type='file' id="imgInp" name="profilePhoto" class="d-none" />
                            <img src="{{asset('img/images (1).png')}}" id="blah" alt="Person Profile">
                          
                                <!-- <img class="img-circle" id="myImg"  name="image" src="{{$result['profile_pic']}}"> -->
                      
                            <div class="profile-black">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z" />
                                </svg><br>
                                <span>Add Profile</span>
                            </div>
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-row">
        <div class="form-group col-md-2 m-0">
        <label class="form-group  p-0  
                                . InputLabel w-100 ">
                                    <select class="form-select w-100 AlterInput text-muted" name="Saluation">
                                        <option selected value="" disabled>Saluation</option> 
                                        @foreach ($saluations as $key => $value)
                                        <option <?php if ($result['saluation'] == $value['id']) {
                                                    echo "selected";
                                                } ?> value="{{ $value['id'] }}">
                                            {{ $value['saluation'] }}
                                        </option>
                                        @endforeach                             
                                    </select>
                                    <span class="AlterInputLabel box">Saluation</span>
                                </label>
        </div>
        <div class="form-group col-md-4">
            <label class="form-group  p-0   InputLabel w-100">
                <input type="text" value="{{$result['first_name']}}" name="firstName" class="form-control AlterInput w-100  "
                    placeholder="Ex : Something">
                <span class="AlterInputLabel">First Name</span>
            </label>
        </div>
     
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="middleName" value="{{$result['middle_name']}}" class="form-control AlterInput w-100 "
                                        placeholder="Middle Name...">
                                    <span class="AlterInputLabel">Middle Name</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="lastName" value="{{$result['last_name']}}" class="form-control AlterInput w-100 "
                                        placeholder="Last Name or Initial...">
                                    <span class="AlterInputLabel">Last Name or Initial</span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="nickName" value="{{$result['nick_name']}}" class="form-control AlterInput w-100 "
                                        placeholder="Account Ledger Name...">
                                    <span class="AlterInputLabel">Nick Name or Alias</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" placeholder="date" value="{{$result['dob']}}" name="dob" validationAttr="date"
                                        class="form-control AlterInput w-100 datepicker"
                                        placeholder="DOB...">
                                    <span class="AlterInputLabel">DOB <sup>*</sup></span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="birthCity" class="form-control AlterInput w-100  "
                                        placeholder="Birth City...">
                                    <span class="AlterInputLabel">Birth City</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label class="form-group  p-0  
                                . InputLabel w-100 ">
                                    <select class="form-select w-100 AlterInput text-muted" name="gender">
                                        <option selected value="" disabled>Gender</option> 
                                        @foreach ($gender as $key => $value)
                                        <option <?php if ($result['gender'] == $value['id']) {
                                                    echo "selected";
                                                } ?> value="{{ $value['id'] }}">
                                            {{ $value['gender'] }}
                                        </option>
                                        @endforeach                                    </select>
                                    <span class="AlterInputLabel box">Gender</span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                            <label class="form-group  p-0  
                                . InputLabel w-100 ">
                                    <select class="form-select w-100 AlterInput text-muted" name="bloodGroup">
                                        <option selected value="" disabled>Blood Group</option>   
                                        @foreach ($blood as $key => $value)
                                        <option <?php if ($result['blood_group'] == $value['id']) {
                                                    echo "selected";
                                                } ?> value="{{ $value['id'] }}">
                                            {{ $value['blood_group'] }}
                                        </option>
                                        @endforeach                                     </select>
                                    <span class="AlterInputLabel box">Blood Group</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="maritalStatus" value="{{$result['martial_status']}}" class="form-control AlterInput w-100  "
                                        placeholder="Martial Status...">
                                    <span class="AlterInputLabel">marital Status</span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                            <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="anniversaryDate"  value="{{$result['aniversary_date']}}" class="form-control AlterInput w-100  "
                                        placeholder="Anniversary Date...">
                                    <span class="AlterInputLabel">Anniversary Date</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="motherTongue" value="{{$result['mother_tongue']}}" class="form-control AlterInput w-100  "
                                        placeholder="Mother Tongue...">
                                    <span class="AlterInputLabel">Mother Tongue</span>
                                </label>
                            </div>
                                                    <div class="form-group col-md-6 ">
                                                    <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="otherLanguage"  value="{{$result['other_language']}}" class="form-control AlterInput w-100  "
                                        placeholder="Other Know Language...">
                                    <span class="AlterInputLabel">Other Know Language</span>
                                </label>
                            </div>
                            <span class="add-append-icon ToDo" id="plus-1" style="background: rgb(128,0,255);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg></span>
                        </div>
                    </div>
                </div>
            </div>


            <div id="customButtons3">
                <div class="form-row">
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="primaryMobile" value="{{$result['mobile'][0]['mobile']}}" class="form-control AlterInput w-100 "
                                placeholder="primary Mobile..." readonly>
                            <span class="AlterInputLabel">Primary Mobile<sup>*</sup></span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="text" name="otherMobile[]" class="form-control AlterInput w-100"
                                validateAttr="mobile-num" placeholder="Other Mobile...">
                            <span class="AlterInputLabel">Other Mobile </span>
                        </label>
                    </div>
                    <span class="add-append-icon ToDo" id="plus-1" style="background: rgb(128,0,255);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg></span>

                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 m-1">

                            <input type="email" name="primaryEmail" value="{{$result['email'][0]['email']}}" class="form-control AlterInput w-100  "
                                placeholder="Primary Email..." readonly>
                            <span class="AlterInputLabel">Primary Email<sup>*</sup></span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 ml-0">
                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="email" name="otherEmail[]" class="form-control AlterInput w-100  "
                                placeholder="Other Email...">
                            <span class="AlterInputLabel">Other Email </span>
                        </label>

                    </div>
                    <span class="add-append-icon ToDo" id="plus-1" style="background: rgb(128,0,255);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white"
                                class="bi bi-plus" viewBox="0 0 16 16">
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
                <div class="col-12 p-0">
                    <div class="form-row  ">
                        <div class="form-group col-md-2">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <select class="form-select w-100 todoRequired AlterInput" name="addressOf[]">
                                    <option selected value="" disabled>Address of</option>
                                    @foreach($address_of as $af)
                                                    <option value="{{$af['id']}}" <?php  if ($result['person_address_profile'][0]['address_type']== $af['id']){ echo "selected";}?>>{{$af['address_of']}}
                                                    </option>
                                                    @endforeach
                                </select>
                                <span class="AlterInputLabel">Address of</span>

                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="doorNo[]" value="{{$result['person_address_profile'][0]['door_no']}}" class="form-control AlterInput w-100  todoRequired"
                                    placeholder="Door No...">
                                <span class="AlterInputLabel">Door No </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="buildingName[]" value="{{$result['person_address_profile'][0]['bilding_name']}}" class="form-control AlterInput w-100  "
                                    placeholder="Building Name...">
                                <span class="AlterInputLabel">Building Name
                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="street[]" value="{{$result['person_address_profile'][0]['street']}}" class="form-control AlterInput w-100  "
                                    placeholder="Street...">
                                <span class="AlterInputLabel">Street
                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="landMark[]" value="{{$result['person_address_profile'][0]['land_mark']}}"  class="form-control AlterInput w-100  "
                                    placeholder="Land Mark...">
                                <span class="AlterInputLabel">Land Mark
                                </span>
                            </label>
                        </div>

                    </div>

                    <div class="form-row  ">
                        <div class="form-group col-md-2 ">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="pinCode[]" value="{{$result['person_address_profile'][0]['pincode']}}"  class="form-control AlterInput w-100  todoRequired"
                                    placeholder="Pin code...">
                                <span class="AlterInputLabel">Pin code

                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="state[]" value="{{$result['person_address_profile'][0]['state']}}" class="form-control AlterInput w-100  "
                                    placeholder="State...">
                                <span class="AlterInputLabel">State</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="city[]"  value="{{$result['person_address_profile'][0]['city']}}" class="form-control AlterInput w-100  "
                                    placeholder="City...">
                                <span class="AlterInputLabel">City</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="district[]" value="{{$result['person_address_profile'][0]['district']}}" class="form-control AlterInput w-100  "
                                    placeholder="District...">
                                <span class="AlterInputLabel">District</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="area[]"  value="{{$result['person_address_profile'][0]['area']}}" class="form-control AlterInput w-100  "
                                    placeholder="Area...">
                                <span class="AlterInputLabel">Area</span>
                            </label>

                        </div>
                    </div>
                    <input type="hidden" name="uid" value="{{$uid}}">
                </div>
                <span class="add-append-icon ToDo" id="plus-1" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" 
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg></span>
                <hr>
            </div>
        </div>
        <div class="btn-toolbar custom-toolbar text-center card-body pt-0">
           <!-- <button class="propelbtn propelcurved next-btn  wizard-move cont" id="ctn-btn" type="button"
                onclick="return false;" name="continue">continue</button> -->
            <!-- <button class="propelbtn propelcurved next-btn propelsubmit" id="sub-btn" type="submit">submit</button> -->
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    $('.box').css("visibility", "visible");
    $('#smartWizardCustomButtons .nav-item').addClass('active');
    $('input[type="text"], input[type="number"], input[type="file"], input[type="url"], input[type="email"]  ,select').prop("disabled", true);
    // $('.plus').prop("disabled", true);
  
     $('.Previous').hide();
$('.continue').click(function() {
    if ($('.nav-item.active').next().text().replace(/\s+/g, "") == "Communication") {
        $('.continue').hide();
        $('.Previous').show();  
    }
    });
    $('.Previous').click(function() {
    if ($('.nav-item.active').prev().text().replace(/\s+/g, "") == "Profile") {
        $('.Previous').hide();  
        $('.continue').show();  
    }
    });


imgInp.onchange = evt => {
    $('.profile-black').addClass("d-none");
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
});

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