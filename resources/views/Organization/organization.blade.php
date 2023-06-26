@extends('layouts.dashboard.app')
@section('content')
<link rel="stylesheet" href="css/vendor/smart_wizard.min.css" />
<head>

      <!-- validation -->
    
    <style>
        /* upload image */
  
    .profile-img-container{
    position: relative;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
   }
   .profile-img-container img{
     object-position: center;
    width: 210px;
    height: 210px;
   }
   .profile-img-container:hover .profile-black{
    display: flex !important;
    
   }
   .profile-black{
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0,0.3);
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    cursor: pointer;
    border-radius: 50%;
   }
   .profile-black svg{
    color: white;
    transition: 0.1s;
    line-height: 0;
    font-style:normal;
    width: 15px;
    fill:white;
   }
   
   .profile-black span{
    color: white; 
   }
   .profile-black:hover svg{
    scale: 1.3;
    
   }


    /* upload end image */
    </style>
</head>
<!-- | -->
<div class="organisation0 organisation-list0  for-active">
    <!-- | -->
    <!-- | -->
    <!-- | -->
</div>
<form action="{{url('organizationStore')}}" autocomplete="off" method="post" class="card m-2 shadow-none" id="WizardForm">
    {{csrf_field()}}
    <div id="smartWizardCustomButtons">
        <ul class="card-header top-list-wizard" style="display:flex;justify-content:space-between;">

            <li><a href="#customButtons2" id="row">Organization</a></li>
            <li><a href="#customButtons3">Communication
                    <!--<br /><small>Third step description</small>-->
                </a></li>
            <li><a href="#customButtons4">ID & Documents
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
                                            <div class="profilepic m-5">
                                                <label for="imgInp" class="profile-img-container m-auto">
                                                    <input accept="image/*" type='file' id="imgInp" name="imgInp" class="d-none"/>
                                                 <img src="{{asset('img/images (1).png')}}" id="blah" alt="Person Profile">
                                                 <div class="profile-black">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"/></svg><br>
                                                    <span>Add Profile</span>
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
                                    <input type="text" name="organizationName" class="form-control AlterInput w-100  propel-key-press-input-mendatory "
                                        placeholder="Ex : Something" autocomplete="off" >
                                    <span class="AlterInputLabel">Organization Name <sup>*</sup></span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 "  for="dataPicker">
                                    <input type="text" name="startedDate"  validationAttr="date" class="form-control AlterInput w-100 datepicker propel-key-press-input-mendatory"
                                        placeholder="Ex : Something" id="dataPicker">
                                    <span class="AlterInputLabel"> Since/StartedDate <sup>*</sup></span>
                                </label>
                              
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <select class="form-select w-100 AlterInput" name="organizationCategory">
                                        <option selected value="none" disabled>Organization Category</option>
                                        @foreach($organizationCategory as $Category)
                                        <option value="{{$Category['id']}}">{{$Category['name']}}</option>
                                        @endforeach
                                    </select>
                                    <span class="AlterInputLabel">Organization Category</span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0  
                                . InputLabel w-100 ">
                                    <select class="form-select w-100 AlterInput " name="OwnerShip">
                                        <option selected value="" disabled>Owner Ship</option>
                                        @foreach($organizationOwnerShip as $ownership)
                                        <option value="{{$ownership['id']}}">{{$ownership['name']}}</option>
                                        @endforeach

                                    </select>
                                    <span class="AlterInputLabel">Owner Ship</span>
                                </label>
                            </div>
                        </div>

                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-inline">
                                    
                                    <select class=" form-select w-40 form-label select-label AlterInput" name="organizationSector">
                                    <option value="0" selected disabled>Sector</option> 
                                    @foreach($organizationSector as $sector)
                                        <option value="{{$sector['id']}}">{{$sector['name']}}</option>
                                        @endforeach
                                    </select>
                                    <span class="AlterInputLabel">Sector </span>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <select class="form-select w-100 AlterInput" name="Activities[]">
                                        <option selected value="" disabled>Activity </option>
                                        @foreach($organizationActivities as $activity)
                                        <option value="{{$activity['id']}}">{{$activity['name']}}</option>
                                        @endforeach
                                    </select>
                                    <span class="AlterInputLabel">Activity</span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-group  p-0   InputLabel w-100 ">
                                    <select class="form-select w-100 AlterInput " name="Subset[]">
                                        <option selected value="" disabled>Subset</option>
                                        @foreach($organizationSubset as $Subset)
                                        <option value="{{$Subset['id']}}">{{$Subset['name']}}</option>
                                        @endforeach

                                    </select>
                                    <span class="AlterInputLabel">Subset </span>
                                </label>
                            </div>
                        </div>
                        <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></span>
                    </div>
                </div>
            </div>
            <div id="customButtons3">
                <div class="form-row">
                    <div class="form-group col-md-3 ">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="email" name="primaryEmail" class="form-control AlterInput w-100  propel-key-press-input-mendatory"
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Primary Email<sup>*</sup></span>
                        </label>

                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="email" name="otherEmail" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Other Email </span>
                        </label>
                        <!-- <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="text" name="otherMobile[]" class="form-control AlterInput w-100  "
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Other Mobile </span>
                        </label> -->

                    </div>
                     <!-- <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></span>  -->

                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="primaryMobile" class="form-control AlterInput w-100  propel-key-press-input-mendatory"
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Primary Mobile<sup>*</sup></span>
                        </label>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="std" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">STD</span>
                            </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                <input type="text" name="Phone" class="form-control AlterInput w-100  "
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">Phone</span>
                            </label>
                        </div>
                </div>



             <!-- <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></span>  -->

                <hr>
                <div class="form-row">
                    <div class="form-group col-md-3 ">
                        <label class="form-group  p-0   InputLabel w-100 mt-1 ml-0">
                            <input type="url" name="webLinks" class="form-control AlterInput w-100" 
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Web Links</span>
                        </label>
                    </div>
                     <!-- <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg></span>  -->
                </div>
                <hr>
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-2 m-1">
                            <label class="form-group  p-0   InputLabel w-100 m-1">
                                {{-- <label class="form-group  p-0   InputLabel w-100 "> --}}
                                    <select class=" form-select w-100 AlterInput" name="addressOf[]">
                                        <option value="0" selected disabled>Address</option>
                                        @foreach($addressOfLists as $Address)
                                        <option value="{{$Address['id']}}">{{$Address['address_of']}}</option>
                                        @endforeach
                                      
                                    </select>
                                    <span class="AlterInputLabel">Address</span>
                                {{-- </label> --}}
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
                                <input type="text" name="area[]" class="form-control AlterInput w-100  area"
                                    placeholder="Ex : Something">
                                <span class="AlterInputLabel">Area</span>
                            </label>

                        </div>
                    </div>

                </div>
                <span class="add-append-icon ToDo mt-1" style="background: rgb(128,0,255);">
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
                            {{-- <label class="form-group  p-0   InputLabel w-100 "> --}}
                                <select class=" form-select w-100 AlterInput" name="idDocumentTypes">
                                    <option value="0" selected disabled>DocumentTypes</option>
                                    @foreach($idDocumentTypes as $idtype)
                                        <option value="{{$idtype['id']}}">{{$idtype['name']}}</option>
                                        @endforeach
                                      
                                  
                                </select>
                                <span class="AlterInputLabel">DocumentTypes</span>
                            {{-- </label> --}}
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="documentNumber" class="form-control AlterInput w-100 showed"
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">DOC No</span>
                        </label>
                    </div>
                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="text" name="validTill" class="form-control AlterInput w-100  showed"
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Valid Till</span>
                        </label>
                    </div>

                    <div class="form-group col-md-2 m-1">
                        <label class="form-group  p-0   InputLabel w-100 m-1">
                            <input type="File" name="attachments" class="form-control AlterInput w-100  showed"
                                placeholder="Ex : Something">
                            <span class="AlterInputLabel">Attachments</span>
                        </label>
                    </div>

                </div>
                <!-- <span class="add-append-icon ToDo mt-1 ml-2" id="plus-3" style="background: rgb(128,0,255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></span> -->
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
                            {{-- <label class="form-group  p-0   InputLabel w-100 "> --}}
                                <select class=" form-select w-100 AlterInput" name="administratorsType">
                                    <option value="0" selected disabled>Administrators</option>
                                    <option value="1">Valla</option>
                                </select>  
                                <span class="AlterInputLabel">Administrators</span>
                            {{-- </label> --}}
                        </label>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <input type="hidden" name="organization_Category" value="0">
        <div class="btn-toolbar custom-toolbar text-center card-body pt-0 ">
            <button class="propelbtn propelcurved  prev-btn propelback" type="button" id="prev-btn" name="previous">Previous</button>
           <button class="propelbtn propelcurved next-btn  wizard-move" id="ctn-btn" type="button"  onclick="return false;" name="continue">continue</button>
           <button class="propelbtn propelcurved next-btn propelsubmit" id="sub-btn" type="submit">submit</button>
            <button class="propelbtn propelcurved reset-btn propelreset freset" type="reset" name="reset">Reset</button>
            
        </div>

    </div>

</form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function(){
        $("#sub-btn").hide();
        
    });
$(document).ready(function() {
   $('#prev-btn').hide();
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
    // COMMENTED BY DIVAKAR FOR NOT PROPER CODE IN SMARTWIZARD USE THESE INSIDE SMARTWIZARD EX:LINE NO.4189 IN DORESCRIPTS.JS
    // $('.cont').click(function() {
    //     // $('.previous').prop('disabled', false);
    //     if ($('.nav-item.active').next().text().replace(/\s+/g, "") == "Administrators") {
    //         $('.cont').text("Submit");
    //     } else {
    //         $('.cont').html("Continue");
    //     }
    //     if ($('.nav-item.active').text().replace(/\s+/g, "") == "Administrators") {

    //        // $("#WizardForm").submit();
    //     }
    // });
    // $(".Previous").click(function() {
    //     var tab = $('.nav-item.active').prev().text();
    //     if (tab == "Organization") {
    //         $('.previous').attr('disabled', 'disabled');
    //     } else {
    //         $('.previous').removeAttr('disabled', 'disabled');
    //     }
    // });
    $(".wizard-move").click(function(){    
       var inputWizard=$(""+$("li.nav-item.active a").attr("href")+" input");
       console.log(inputWizard.html());
       $(""+$("li.nav-item.active a").attr("href")+" .propel-key-press-input-mendatory.needValidation[validate=notValidate]").attr('validate','failure');  
       $(""+$("li.nav-item.active a").attr("href")+" .propel-key-press-input-mendatory.needValidation[validate=validateRequired]").attr('validate','failure'); 
       for (let i = 0; i < inputWizard.length; i++) {
           var inputWizardAttr=inputWizard[i].getAttribute('validate');
         
           if(inputWizardAttr != "failure" && inputWizardAttr != "validateRequired"){
               // return true; 
           }
        else{
           $("next-btn").removeEventListener(); 
               }
       }
   }) 
});
</script>