@extends('layouts.dashboard.app')
@section('content')
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
<style>
    .profilepic {
  position: relative;
  width: 260px;
  height: 260px;
  border-radius:50%;
  overflow: hidden;
  background-color: #111;
}

.profilepic:hover .profilepic__content {
  opacity: 1;
}

.profilepic:hover .profilepic__image {
  opacity: .5;
}

.profilepic__image {
  object-fit: cover;
  opacity: 1;
  transition: opacity .2s ease-in-out;
}

.profilepic__content {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: white;
  opacity: 0;
  transition: opacity .2s ease-in-out;
}

.profilepic__icon {
  color: white;
  padding-bottom: 8px;
}

.fas {
  font-size: 20px;
}

.profilepic__text {
  text-transform: uppercase;
  font-size: 12px;
  width: 50%;
  text-align: center;
}
</style>
</head>
<!-- | -->
<div class="organisation0 organisation-list0  for-active">
    <!-- | -->
    <!-- | -->
    <!-- | -->
</div>
<form action="{{url('organizationStore')}}" method="post" class="card" id="WizardForm">
    {{csrf_field()}}
    <div id="smartWizardCustomButtons">
        <ul class="card-header line" style="display:flex;justify-content:space-between;">

            <li><a href="#customButtons2"  id="row">Organization</a></li>
            <li><a href="#customButtons3">Communication
                    <!--<br /><small>Third step description</small>-->
                </a></li>
            <li ><a href="#customButtons4">ID & Documents
                    <!--<br /><small>Third step description</small>-->
                </a></li>
            <li><a href="#customButtons5">Administrators
                    <!--<br /><small>Third step description</small>-->
                </a></li>
        </ul>
        <div class="card-body col-12">
            <div id="customButtons2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="">
                            <div class="row">
                                <div class="profile-header-container">
                                    <div class="">
                                        <div class="rank-label-container">
                                            <div class="profilepic">
                                            <label for="imgInp" >
                                            <input accept="image/*"  type='file' id="imgInp" name="organizationlogo"
                                                    style="display:none" />
                                                <img  id="blah"  class="profilepic__image  w-100 h-100"
                                                src="img/images (1).png" alt="your image" />
                                                <div class="profilepic__content">
                                                    <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
                                                    <span class="profilepic__text">Edit Profile</span>
                                                </div>
                                                </label>
                                            </div>
                                            <!-- <label for="imgInp" >
                                                <input accept="image/*"  type='file' id="imgInp" name="organizationlogo"
                                                    style="display:none" />
                                                <img id="blah" src="img/images (1).png" alt="your image"
                                                    class="w-70 h-70" />
                                            </label> -->
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="text" name="organizationName" class="form-control AlterInput w-100  "
                                        placeholder="Ex : Something">
                                    <span class="AlterInputLabel">Organization Name <sup>*</sup></span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <input type="date" name="startedDate" class="form-control AlterInput w-100"
                                        placeholder="Ex : Something">
                                    <span class="AlterInputLabel"> Since/StartedDate <sup>*</sup></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label class="form-group  p-0   InputLabel w-100 m-0">Organization
                                    <select class="form-select w-100 " name="organizationCategory">
                                        <option selected value="" disabled>Organization Category</option>  
                                        @foreach($organizationCategory as $category)                       
                                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                            <label class="form-group  p-0   InputLabel w-100 m-0">
                                    <select class="form-select w-100 " name="ownership">
                                        <option selected value="" disabled>Owner Ship</option>  
                                        @foreach($organizationOwnerShip as $ownership)                       
                                        <option value="{{$ownership['id']}}">{{$ownership['name']}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 m-1">
                                    <select class="form-select w-100" name="sector">
                                        <option selected value="" disabled>Sector</option>
                                        @foreach($organizationSector as $sector)
                                        <option value="{{$sector['id']}}">{{$sector['name']}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label class="form-group  p-0   InputLabel w-100 m-0">
                                    <select class="form-select w-100 " name="activities[]">
                                        <option selected value="" disabled>Activities</option> 
                                        @foreach($organizationActivities as $activities)                        
                                        <option value="{{$activities['id']}}">{{$activities['name']}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            {{-- APPEND Lines --}}
                            <div class="form-group col-11 col-md-5">
                                <label class="form-group  p-0   InputLabel w-100 m-0">
                                    <select class="form-select w-100 " name="subset[]">
                                        <option selected value="" disabled>Sub Set</option>
                                        @foreach($organizationSubset as $subset)
                                        <option value="{{$subset['id']}}">{{$subset['name']}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <span class="add-append-icon ToDo" style="background: rgb(128,0,255);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg></span>
                    </div>
                </div>
            </div>


            <div id="customButtons3">
                <div class="form-row">
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="primaryMobile" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Primary Mobile<sup>*</sup></span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="text" name="otherMobile[]" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Other Mobile </span>
                        </label>

                    </div>
                    <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></span>

                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="email" name="primaryEmail" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Primary Email<sup>*</sup></span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 ml-0">
                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="email" name="otherEmail[]" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Other Email </span>
                        </label>

                    </div>
                    <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></span>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-2 ">
                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="url" name="webLinks[]" class="form-control AlterInput w-100"
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Web Links</span>
                        </label>
                    </div>
                    <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></span>
                </div>
                <hr>
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <select class="form-select w-100 " name="address_of[]">
                                    <option selected value="" disabled>Address Of</option>
                                    @foreach($addressOfLists as $address)
                                    <option value="{{$address['id']}}">{{$address['address_of']}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="doorNo[]" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">Door No </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="buildingName[]" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">Building Name
                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="street[]" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">Street
                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="landMark[]" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">Land Mark
                                </span>
                            </label>
                        </div>

                    </div>

                    <div class="form-row  ">
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="pinCode[]" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">Pin code

                                </span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="state[]" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">State</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="city[]" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">City</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="district[]" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">District</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="area[]" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">Area</span>
                            </label>

                        </div>
                    </div>

                </div>
                <span class="add-append-icon ToDo mt-1 ml-4" style="background: rgb(128,0,255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></span>
                <hr>
            </div>
            <div id="customButtons4">
                <div class="form-row mt-4">
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <select class="form-select w-100 " name="idDocumentType[]">
                                <option selected value="" disabled>Type ID/Doc</option>
                                @foreach($idDocumentTypes as $idDocumentType)
                                <option value="{{$idDocumentType['id']}}">{{$idDocumentType['name']}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="documentNumber[]" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">DOC No</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="validTill[]" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Valid Till</span>
                        </label>
                    </div>

                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="File" name="attachments[]" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Attachments</span>
                        </label>
                    </div>

                </div>
                <span class="add-append-icon ToDo mt-1 ml-2" style="background: rgb(128,0,255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></span>
            </div>
            <div id="customButtons5">
                <div class="form-row mt-4">
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="name" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Name</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="mobile" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Mobile</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="email" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Email</span>
                        </label>
                    </div>
                    <div class="form-group col-md-3 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <select class="form-select w-100 " name="administratorsType">
                                <option selected value="" disabled>Administrators Type</option>
                                <option value="1">example</option>
                            </select>
                        </label>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="btn-toolbar custom-toolbar text-center card-body pt-0">
            <button class="propelbtn propelcurved  prev-btn propelback Previous" type="button" name="previous">Previous</button>
            <button class="propelbtn propelcurved next-btn propelsubmit wizard-move" type="button" name="continue">contiune</button>
            <button class="propelbtn propelcurved reset-btn propelreset freset" type="reset" name="reset">Reset</button>
        </div>

    </div>

</form>
<!-- THIS PARTICULAR SCRIPT WAS MOVED BY LOKESHWARI FOR THE PROCESS CONTENT IN THOSE PAGES -->
<script>
$(document).ready(function() {
 $('.Previous').prop('disabled',true);  
$('#row').removeAttr('class');
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
// COMMENTED BY DIVAKAR FOR NOT PROPER CODE IN SMARTWIZARD USE THESE INSIDE SMARTWIZARD EX:LINE NO.4189 IN DORESCRIPTS.JS
    // $('.cont').click(function() {
    //     $('.previous').prop('disabled',false);
    //     if ($('.nav-item.active').next().text().replace(/\s+/g, "") == "Administrators") {
    //         $('.cont').html("Submit");
    //     } else {
    //         $('.cont').html("Continue");
    //     }
    //     if ($('.nav-item.active').text().replace(/\s+/g, "") == "Administrators") {

    //         // $("#WizardForm").submit();
    //     }
    // });
    $(".Previous").click(function(){
   var tab = $('.nav-item.active').prev().text();
 if(tab == "Organization"){
    $('.previous').attr('disabled','disabled');
 }
else{
    $('.previous').removeAttr('disabled','disabled');
}
}); 
});   
</script>
@endsection
<!-- THIS PARTICULAR LINE WAS COMMENDED BY LOKESHWARI FOR THE PROCESS OF REMOVING CDN. -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
 $('.Previous').prop('disabled',true);  
$('#row').removeAttr('class');
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
    $('.cont').click(function() {
        $('.previous').prop('disabled',false);
        if ($('.nav-item.active').next().text().replace(/\s+/g, "") == "Administrators") {
            $('.cont').html("Submit");
        } else {
            $('.cont').html("Continue");
        }
        if ($('.nav-item.active').text().replace(/\s+/g, "") == "Administrators") {

            $("#WizardForm").submit();
        }
    });
    $(".Previous").click(function(){
   var tab = $('.nav-item.active').prev().text();
 if(tab == "Organization"){
    $('.previous').attr('disabled','disabled');
 }
else{
    $('.previous').removeAttr('disabled','disabled');
}
}); 
});   
</script> -->