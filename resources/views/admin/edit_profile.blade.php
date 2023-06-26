@extends('layouts.dashboard.app')
@section('content')

<head>
    <style>
        .icon-rtl {
            padding-right: 25px;
            background: url("/img/right.png") no-repeat right;
            background-size: 30px;
        }

        @media screen and (max-width: 480px) {
            button.btn.btn-primary.btn-xs.other_email_button {
                position: relative;
                float: right;
                bottom: 43px;
            }

            button.btn.btn-primary.btn-xs.other_mobile_button {
                position: relative;
                float: right;
                bottom: 43px;
            }
        }
    </style>
</head>
<div class="row">
    <!-- <div class="col-12">
        <h2>Profile</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">

        </nav>
        <div class="separator mb-5"></div>
    </div> -->
    <div class="col-12 mb-4">

        <!--ALERT-->
        @if (isset($success))
        <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
            <strong>Success!</strong> {{$success}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif (isset($failure))
        <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
            <strong>Error!</strong> {{$failure}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!--ALERT ENDS-->


        <div class="card mb-4">
            <div id="smartWizardClickable">
                <ul class="card-header">
                    <li><a href="#step-0">My Profile<br /><small>Update Basic Details</small></a></li>
                    <li><a href="#step-1">Communication<br /><small>Update Mobile and Email</small></a></li>
                    <li><a href="#step-2">Step 3<br /><small>Third step description</small></a></li>
                </ul>

                <div class="container card">
                    <div id="step-0" class="wizardForm">
                        <form id="form-step-0 " class="page" method="post" action="{{ route('save_profile') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <h5 class="mb-4">Update Profile <span id="edit" class="btn  float-right rounded-0" style="color:white;background-color:blue ">Edit</span></h5>


                            <div class="row">

                                <div class="form-group col-md-12 header_profile_pic">



                                    <div class="row">
                                        <div class="profile-header-container">
                                            <div class="profile-header-img image-upload">
                                                @if ($result['profile_pic']=='')
                                                <img class="img-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbQhMGTrXKKq2SWR_oAMKqkPge-aKuxqLAIg&usqp=CAU">
                                                @endif
                                                @if ($result['profile_pic']!='')
                                                <img class="img-circle" id="myImg" src="{{$result['profile_pic']}}">
                                                @endif
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label">
                                                        <label for="file-input">
                                                            <i class="glyph-icon simple-icon-camera upload-button"></i>
                                                        </label>
                                                    </span>
                                                </div>

                                                <input class="file-upload" id="file-input" type="file" name="profilePhoto" accept="image/*" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div></div>
                                <div class="form-group col-md-6">
                                    <label for="email">Saluation</label>
                                    <select name="saluation" class="form-control" id="exampleFormControlSelect1" required>
                                        <option value="">Select</option>
                                        @foreach ($saluations as $key => $value)
                                        <option <?php if ($result['saluation'] == $value['id']) {
                                                    echo "selected";
                                                } ?> value="{{ $value['id'] }}">
                                            {{ $value['saluation'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter Firstname" value="{{$result['first_name']}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Middle Name</label>
                                    <input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name" value="{{$result['middle_name']}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Last Name or Initial</label>
                                    <input type="text" class="form-control" name="initial" placeholder="Enter Initial" value="{{$result['last_name']}}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Nick Name or Alias</label>
                                    <input type="text" class="form-control" name="nick_name" placeholder="Enter Nick Name" value="{{$result['nick_name']}}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">DOB</label>
                                    <input type="Date" class="form-control" name="dob" placeholder="Enter DOB" value="{{$result['dob']}}" required>
                                    <small class="text-danger">{{ $errors->first('dob') }}</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Gender</label>
                                    <select name="gender" class="form-control" id="gender" required>
                                        <option value="">Select</option>
                                        @foreach ($gender as $key => $value)
                                        <option <?php if ($result['gender'] == $value['id']) {
                                                    echo "selected";
                                                } ?> value="{{ $value['id'] }}">
                                            {{ $value['gender'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Blood Group</label>
                                    <select name="blood_group" class="form-control" id="blood_group" required>
                                        <option value="">Select</option>
                                        @foreach ($blood as $key => $value)
                                        <option <?php if ($result['blood_group'] == $value['id']) {
                                                    echo "selected";
                                                } ?> value="{{ $value['id'] }}">
                                            {{ $value['blood_group'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Martial Status</label>
                                    <input type="text" class="form-control" name="martial_status" placeholder="Enter Martial Status" value="{{$result['martial_status']}}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Aniversary Date</label>
                                    <input type="Date" class="form-control" name="aniversary_date" placeholder="Enter Aniversary Date" value="{{$result['aniversary_date']}}" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="password">Mother Tongue</label>
                                    <input type="text" class="form-control" name="mother_tongue" placeholder="Enter Mother Tongue" value="{{$result['mother_tongue']}}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Birth City</label>
                                    <input type="text" class="form-control" name="birth_city" placeholder="Enter Birth City" value="" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Other Known Language</label>

                                    <div class="multi-field-wrapper">
                                        <div class="multi-fields">
                                            <div class="multi-field">

                                                <input type="text" class="form-control" name="other_language[]" placeholder="Enter Other Language" value="{{$result['other_language']}}" required>
                                                <span id="add-field" class="btn btn-info float-right rounded-0 remove-field"> Remove</span>&nbsp;
                                                <span id="add-field" class="btn btn-info float-right rounded-0 add-field"> Add More</span>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <input type="hidden" name="uid" id="uid" value="{{$uid}}">
                            </div>
                            <button style="float:right;" class="btn btn-primary right" type="submit">Update</button><br></br>
                        </form>
                    </div>
                    <div id="step-1" class="wizardForm">
                        <form action="{{ route('save_profile_extra') }}" method="post" id="form-step-1" class="tooltip-label-right">
                            @csrf
                            <br>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class="btn btn-primary float-right rounded-0 btn-sm">Update</button>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-5">

                                    <label for="name">Primary Mobile</label>
                                    @if(isset($result['mobile'][0]))


                                    <input type="number" class="form-control icon-rtl " name="primary_mobile" id="primary_mobile" placeholder="Your Primary Mobile" value="{{$result['mobile'][0]['status']=='1'?$result['mobile'][0]['mobile']:''}}" required>

                                    @else
                                    <input type="number" class="form-control" name="primary_mobile" id="primary_mobile" placeholder="Your Primary Mobile" required>
                                    @endif
                                    <small class="text-danger">{{ $errors->first('primary_mobile') }}</small>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="lastName">Other Mobile</label>
                                    <div class="input-group">
                                        @if(isset($result['mobile'][1]))
                                        <input type="number" class="form-control" aria-label="Text input with dropdown button" name="other_mobile" id="other_mobile" placeholder="Your Other mobile" value="{{$result['mobile'][1]['status']=='2'?$result['mobile'][1]['mobile']:''}}">
                                        @else
                                        <input type="number" class="form-control" aria-label="Text input with dropdown button" name="other_mobile" id="other_mobile" placeholder="Your Other mobile">
                                        @endif
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="iconsminds-rename"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="make_as_primary();">Make as
                                                    Primary</a>
                                                <a class="dropdown-item" href="#" onclick="ResendOTP()">Validate</a>
                                                <a class="dropdown-item" href="#" onclick="delete_other();">Delete</a>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="add_more_mobile form-group col-md-2">
                                    <label>.</label>
                                    <button type="button" class="btn btn-primary btn-xs other_mobile_button" data-toggle="modal" data-target="#mobileModel">+</button>
                                </div>

                            </div>



                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="name">Primary Email</label>
                                    @if(isset($result['email'][0]))
                                    <input type="email" class="form-control icon-rtl" name="primary_email" id="primary_email" placeholder="Your Primary Email" value="{{$result['email'][0]['status']=='1'?$result['email'][0]['email']:''}}" required>
                                    </required>
                                    @else
                                    <input type="email" class="form-control" name="primary_email" id="primary_email" placeholder="Your Primary Email" required>
                                    @endif
                                    <small class="text-danger">{{ $errors->first('primary_email') }}</small>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="lastName">Other Email</label>
                                    <div class="input-group">
                                        @if(isset($result['email'][1]))
                                        <input type="email" class="form-control" aria-label="Text input with dropdown button" name="other_email" id="other_email" placeholder="Your Other Email" value="{{$result['email'][1]['status']=='2'?$result['email'][1]['email']:''}}">
                                        @else
                                        <input type="email" class="form-control" aria-label="Text input with dropdown button" name="other_email" id="other_email" placeholder="Your Other Email">
                                        @endif
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="iconsminds-rename"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#" onclick="make_as_primary_email();">Make as Primary</a>
                                                <a class="dropdown-item" href="#" onclick="ResendOTP_email()">Validate</a>
                                                <a class="dropdown-item" href="#" onclick="delete_other_email();">Delete</a>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                               
                                <div class="add_more_mobile form-group col-md-2">
                                    <label>.</label>
                                    <button type="button" class="btn btn-primary btn-xs other_email_button" data-toggle="modal" data-target="#emailModel">+</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="name">Web Link</label>
                                    <input type="text" class="form-control" name="web_link" id="nameValidation" placeholder="Your Web link" value="{{$result['web_link']}}" required>
                                </div>
                            </div>


                            @if(empty($address))
                            <div class="multi-field-wrapper1">
                                <div class="multi-fields1">
                                    <div class="multi-field1">

                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label for="name">Address of</label>
                                                <select name="address_of[]" class="form-control" id="address_of" required>
                                                    <option value="">Select Address Type</option>
                                                    @foreach($address_of as $af)
                                                    <option value="{{$af->id}}">{{$af->address_of}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <!-- <small class="text-danger">{{ $errors->first('address_of') }}</small> -->
                                                <small class="text-danger">{{ $errors->first('address_of') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">Door No.</label>
                                                <input type="text" class="form-control" name="door_no[]" id="nameValidation" placeholder="Your Door No" required>
                                                <small class="text-danger">{{ $errors->first('door_no') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">Building Name</label>
                                                <input type="text" class="form-control" name="bilding_name[]" id="nameValidation" placeholder="Your Building Name" required>
                                                <small class="text-danger">{{ $errors->first('bilding_name') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">Street</label>
                                                <input type="text" class="form-control" name="street[]" id="nameValidation" placeholder="Your Street" required>
                                                <small class="text-danger">{{ $errors->first('street') }}</small>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="name">Land Mark</label>
                                                <input type="text" class="form-control" name="land_mark[]" id="nameValidation" placeholder="Your Land Mark" required>
                                                <small class="text-danger">{{ $errors->first('land_mark') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">Pincode</label>
                                                <input type="text" class="form-control" name="pincode[]" id="nameValidation" placeholder="Your pincode" required>
                                                <small class="text-danger">{{ $errors->first('pincode') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">State</label>
                                                <select name="state[]" class="form-control state_attr" data-attr="0" id="{{$key}}" onchange="get_cities(this);" required>
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger">{{ $errors->first('state') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">City</label>
                                                <select name="city[]" class="form-control city_attr city{{$key}}" id="city{{$key}}">
                                                    <option value="">Select City</option>
                                                </select>
                                                <small class="text-danger">{{ $errors->first('city') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">District</label>
                                                <input type="text" class="form-control" name="district[]" id="nameValidation" placeholder="Your District" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">Area</label>
                                                <input type="text" class="form-control" name="area[]" id="nameValidation" placeholder="Your Area" required>
                                            </div>


                                        </div>

                                        <button type="button" class="btn btn-info float-right rounded-0 remove-field1">Remove</button>
                                        <button type="button" class="btn btn-info float-right rounded-0 add-field1">Add More</button>
                                    </div>
                                </div>

                            </div>
                            @endif

                            @if(!empty($address))
                            @foreach($address as $key=>$a)
                            <div class="multi-field-wrapper1">
                                <div class="multi-fields1">
                                    <div class="multi-field1">

                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label for="name">Address of</label>
                                                <select name="address_of[]" class="form-control" id="address_of" required>
                                                    <option value="">Select Address Type</option>
                                                    @foreach($address_of as $af)
                                                    <option value="{{$af['id']}}" <?php echo ($a['address_type'] == $af['id']) ? "selected" : ""; ?>>{{$af['address_of']}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <!-- <small class="text-danger">{{ $errors->first('address_of') }}</small> -->
                                                <small class="text-danger">{{ $errors->first('address_of') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">Door No.</label>
                                                <input type="text" class="form-control" name="door_no[]" id="nameValidation" placeholder="Your Door No" value="{{$a['door_no']}}" required>
                                                <small class="text-danger">{{ $errors->first('door_no') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">Building Name</label>
                                                <input type="text" class="form-control" name="bilding_name[]" id="nameValidation" placeholder="Your Building Name" value="{{$a['bilding_name']}}" required>
                                                <small class="text-danger">{{ $errors->first('bilding_name') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">Street</label>
                                                <input type="text" class="form-control" name="street[]" id="nameValidation" placeholder="Your Street" value="{{$a['street']}}" required>
                                                <small class="text-danger">{{ $errors->first('street') }}</small>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="name">Land Mark</label>
                                                <input type="text" class="form-control" name="land_mark[]" id="nameValidation" placeholder="Your Land Mark" value="{{$a['land_mark']}}" required>
                                                <small class="text-danger">{{ $errors->first('land_mark') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">Pincode</label>
                                                <input type="text" class="form-control" name="pincode[]" id="nameValidation" placeholder="Your pincode" value="{{$a['pincode']}}" required>
                                                <small class="text-danger">{{ $errors->first('pincode') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">State</label>
                                                <select name="state[]" class="form-control state_attr" data-attr="0" id="{{$key}}" onchange="get_cities(this);" required>
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                    <option value="{{$state['id']}}" <?php echo ($a['state'] == $state['id']) ? "selected" : ""; ?>>{{$state['name']}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger">{{ $errors->first('state') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">City</label>
                                                <select name="city[]" class="form-control city_attr city{{$key}}" id="city{{$key}}">
                                                    <option value="">Select City</option>
                                                </select>
                                                <small class="text-danger">{{ $errors->first('city') }}</small>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">District</label>
                                                <input type="text" class="form-control" name="district[]" id="nameValidation" placeholder="Your District" value="{{$a['district']}}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="name">Area</label>
                                                <input type="text" class="form-control" name="area[]" id="nameValidation" placeholder="Your Area" value="{{$a['area']}}" required>
                                            </div>


                                        </div>

                                        <button type="button" class="btn btn-info float-right rounded-0 remove-field1">Remove</button>
                                        <button type="button" class="btn btn-info float-right rounded-0 add-field1">Add More</button>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            @endif

                            <div class="add_more_mobile form-group col-md-2 right">
                                <label>.</label>

                            </div>
                            <input type="hidden" name="uid" id="uid" value="{{$uid}}">
                        </form>
                    </div>
                    <div id="step-2" class="wizardForm">
                        <h4 class="text-center">Thank you for your feedback!</h4>
                        <p class="muted text-center p-4">
                            Podcasting operational change management inside of workflows to establish a
                            framework. Taking seamless key performance indicators offline to maximise the
                            long tail. Keeping your eye on the ball while performing a deep dive on the
                            start-up mentality.
                        </p>
                    </div>
                </div>
                <br><br>

            </div>
        </div>
    </div>

</div>

<!--MOdel-->

<!-- Modal -->
<div class="modal fade" id="mobileModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Mobile Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="alert alert-danger" id="error" style="display: none;"></div>
                        <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="mobile_type" value="1" class="custom-control-input">&nbsp;
                        <label class="custom-control-label" for="customRadio1">This is my Login and primary mobile
                            number</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="mobile_type" value="2" class="custom-control-input">&nbsp;
                        <label class="custom-control-label" for="customRadio2">This is my Additional Mobile Number,Add
                            it to the Existing</label>
                    </div>
                    <br>
                    <div class="form-group col-md-12">
                        <label for="name">Mobile Number</label>
                        <input type="number" class="form-control" name="mobile_model" id="mobile_model" placeholder="Enter Mobile Number" required>

                    </div>
                    <div class="form-group col-md-12">
                        <div class="frm-input" id="recaptcha-container"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="sendOTP();">Submit</button>
                </div>

            </div>

        </div>
    </div>
</div>


<!--VERIFICATION MODEL-->

<!-- Modal -->
<div class="modal fade" id="verificationModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Mobile Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="alert alert-danger" id="otp_error" style="display: none;"></div>
                        <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="mobile_otp" id="mobile_otp" placeholder="Enter OTP Recieved on your Mobile Number" required>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="frm-input" id="recaptcha-container"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="verify();">Submit</button>
                </div>

            </div>

        </div>
    </div>
</div>

<!--Primary Verification Model-->
<div class="modal fade" id="primaryVerificationModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Mobile Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="alert alert-danger" id="otp_error" style="display: none;"></div>
                        <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="make_primary_otp" id="make_primary_otp" placeholder="Enter OTP Recieved on your Mobile Number" required>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="frm-input" id="recaptcha-container"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="verify_primary();">Submit</button>
                </div>

            </div>

        </div>
    </div>
</div>


<!--Succcess Model-->

<div class="modal fade" id="successModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Mobile Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <h4>Your Mobile <span id="mobile_numb"></span>was added successfully!</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>
</div>

<!--Success Primary-->
<div class="modal fade" id="successPrimaryModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Mobile Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <h4>Your Mobile <span id="mobile_numb1"></span>was made Primary!</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>
</div>

<!--Email Model-->
<div class="modal fade" id="emailModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="alert alert-danger" id="emailError" style="display: none;"></div>
                        <div class="alert alert-success" id="successEmailAuth" style="display: none;"></div>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio12" name="email_type" value="1" class="custom-control-input">&nbsp;
                        <label class="custom-control-label" for="customRadio12">This is my Primary Email</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio22" name="email_type" value="2" class="custom-control-input">&nbsp;
                        <label class="custom-control-label" for="customRadio22">This is my Additional email,Add it to
                            the Existing</label>
                    </div>
                    <br>
                    <div class="form-group col-md-12">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" name="email_model" id="email_model" placeholder="Enter Email" required>

                    </div>
                    <div class="form-group col-md-12">
                        <div class="frm-input" id="recaptcha-container"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="sendEmailOTP();">Submit</button>
                </div>

            </div>

        </div>
    </div>
</div>


<!--Email Verification Model-->

<div class="modal fade" id="EmailVerificationModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="alert alert-danger" id="email_otp_error" style="display: none;"></div>
                        <div class="alert alert-success" id="successEmailOtpAuth" style="display: none;"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="make_email_primary_otp" id="make_email_primary_otp" placeholder="Enter OTP Recieved on your Email" required>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="frm-input" id="recaptcha-container"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="verify_email_primary();">Submit</button>
                </div>

            </div>

        </div>
    </div>
</div>

<!--Email Success--->
<div class="modal fade" id="successEmailModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <h4>Your Email <span id="email_numb"></span>was added successfully!</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>
</div>


<!--Email Primary Model-->

<div class="modal fade" id="Make_primary_email" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="alert alert-danger" id="email_primary_error" style="display: none;"></div>
                        <div class="alert alert-success" id="successEmailprimary" style="display: none;"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="email_primary_otp" id="email_primary_otp" placeholder="Enter OTP Recieved on your Email" required>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="frm-input" id="recaptcha-container"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="email_primary();">Submit</button>
                </div>

            </div>

        </div>
    </div>
</div>


<!--Email Validation Model-->

<div class="modal fade" id="Email_OTP_Validation" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="alert alert-danger" id="email_validation_error" style="display: none;"></div>
                        <div class="alert alert-success" id="successEmailvalidation" style="display: none;"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="email_validation_otp" id="email_validation_otp" placeholder="Enter OTP Recieved on your Email" required>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="frm-input" id="recaptcha-container"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="email_validation();">Submit</button>
                </div>

            </div>

        </div>
    </div>
</div>


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

<script>
    $(document).ready(function() {
        // $("#form-step-0 :input").prop("disabled", true);
        $('.wizardForm').find('input, textarea, button, select').attr('disabled', true);
        $('#edit').click(function() {
            var btnPurpose = $('#edit').html();

            if (btnPurpose == "Edit") {
                console.log(" Edit to Update");
                $('.wizardForm').find('input, textarea, button, select').attr('disabled', false);
                $('#edit').html('Update');
                $('#edit').css({
                    'background': 'green'
                });
            } else {
                $('.wizardForm').find('input, textarea, button, select').attr('disabled', true);

                $('#edit').html('Edit');
                $('#edit').css({
                    'background': 'blue',
                    'color': 'white',
                });
                console.log(" Update to Edit");
            }


        });
    });

    $(function() {
        $('.multi-field-wrapper').each(function() {
            var $wrapper = $('.multi-fields', this);
            $(".add-field", $(this)).click(function(e) {
                $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
            });
            $('.multi-field .remove-field', $wrapper).click(function() {
                if ($('.multi-field', $wrapper).length > 1)
                    $(this).parent('.multi-field').remove();
            });
        });

        $('.multi-field-wrapper1').each(function(i) {
            var $wrapper = $('.multi-fields1', this);
            $(".add-field1", $(this)).click(function(e) {
                var length = $(".multi-field1").length;
                $('.multi-field1:first-child', $wrapper).clone(true)
                    .find(".city_attr").attr('id', 'city' + length).end()
                    .find(".state_attr").attr('id', length).end()
                    .appendTo($wrapper).find('input,select').val('').focus();
            });
            $('.multi-field1 .remove-field1', $wrapper).click(function() {
                // if ($('.multi-field1', $wrapper).length > 1)
                $(this).parent('.multi-field1').remove();
            });
        });
    });


    var firebaseConfig = {
        apiKey: "AIzaSyAGGpTyLhdOPkKhox6hh6AsN_Ykk0-RsZI",
        authDomain: "propel-68894.firebaseapp.com",
        databaseURL: "https://propel-68894.firebaseapp.com",
        projectId: "propel-68894",
        storageBucket: "propel-68894.appspot.com",
        messagingSenderId: "777207678412",
        appId: "1:777207678412:web:58e2af28992df8f2cc0969",
        measurementId: "G-PBBJN2TV6W"
    };

    firebase.initializeApp(firebaseConfig);
    console.log(firebase.app().name);
</script>
<script type="text/javascript">
    //Firebase//


    window.onload = function() {
        render();
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
            "recaptcha-container", {
                size: "invisible",
                callback: function(response) {
                    sendOTP();
                }
            }
        );
        // window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        // recaptchaVerifier.render();
    }

    function sendOTP() {
        var mobile_type = $('input[name="mobile_type"]:checked').val();
        var num = $("#mobile_model").val();
        var num1=$('#other_mobile').val();
        if (num != '') {
            if (mobile_type == '1') {
                if(num1){
                    var n=$('#other_mobile').val();
                }else{
                    var n = $("#mobile_model").val();
                }
                var number = "+91" + n;
                //var number="+918220695662";
                firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                    window.confirmationResult = confirmationResult;
                    coderesult = confirmationResult;
                    console.log(coderesult);
                    $("#successAuth").text("Message sent");
                    $("#successAuth").show();
                    $("#verificationModel").modal('toggle');
                    $("#mobileModel").modal('toggle');
                }).catch(function(error) {
                    $("#error").text(error.message);
                    $("#error").show();
                });
            } else {
                var uid = $("#uid").val();
                var mobile_type = $('input[name="mobile_type"]:checked').val();
                var mobile = $("#mobile_model").val();
                $.ajax({
                    url: "{{route('storeMobile')}}",
                    type: 'ajax',
                    method: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        uid: uid,
                        mobile_type: mobile_type,
                        mobile: mobile
                    },
                    success: function(data) {
                        console.log(data);
                        $("#verificationModel").modal('hide');
                        Swal.fire(
                            'Success!',
                            'Mobile has been Changed.',
                            'success'
                        ).then(function() {
                            window.location.reload();
                        });
                    },
                    error: function() {
                        $("#otp_error").text("Update Error");
                    }

                });
            }
        } else {
            Swal.fire(
                'Mobile Number Required!',
                'Mobile Cannot be Empty!',
                'error'
            ).then(function() {
                window.location.reload();
            });
        }


    }


    function verify() {
        var code = $("#mobile_otp").val();
        var uid = $("#uid").val();
        var mobile_type = $('input[name="mobile_type"]:checked').val();
        var mobile = $("#mobile_model").val();
        coderesult.confirm(code).then(function(result) {
            var user = result.user;
            console.log("success");
            $.ajax({
                url: "{{route('storeMobile')}}",
                type: 'ajax',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    uid: uid,
                    mobile_type: mobile_type,
                    mobile: mobile
                },
                success: function(data) {
                    console.log(data);
                    $("#successOtpAuth").text("Mobile Number Verified");
                    $("#successOtpAuth").show();
                    $("#verificationModel").modal('hide');
                    $("#successModel").modal('toggle');
                    $("#mobile_numb").html(mobile);
                    window.location.reload();
                },
                error: function() {
                    $("#otp_error").text("Update Error");
                }

            });

        }).catch(function(error) {
            $("#otp_error").text(error.message);
            $("#otp_error").show();
        });
    }


    function verify_email_primary() {
        var uid = $("#uid").val();
        var email_otp = $("#make_email_primary_otp").val();
        var email = $('#email_model').val();
        $.ajax({
            url: "{{route('VerifyEmailOtp')}}",
            type: 'ajax',
            method: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                uid: uid,
                email_otp: email_otp,
                email: email,
            },
            success: function(data) {
                console.log(data);
                $("#EmailVerificationModel").modal('hide');
                $("#successEmailOtpAuth").text("Email Verified");
                $("#successOtpAuth").show();

                $("#successEmailModel").modal('toggle');
                $("#email_numb").html(email);
                $("#emailModel").modal('hide');

            },
            error: function() {
                $("#email_otp_error").text("Update Error");
            }

        });
    }


    function make_as_primary() {
        var primary = $("#primary_mobile").val();
        var other = $("#other_mobile").val();
        var number = "+91" + other;
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            $("#successOtpAuth").text("Mobile OTP SEND");
            $("#successOtpAuth").show();
            $("#verificationModel").modal('hide');
            $("#mobileModel").modal('hide');
            $("#successModel").modal('hide');
            $("#primaryVerificationModel").modal('show');
            window.location.reload();
        }).catch(function(error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }




    function verify_primary() {
        var code = $("#make_primary_otp").val();
        var uid = $("#uid").val();
        var primary = $("#primary_mobile").val();
        var other = $("#other_mobile").val();
        alert("verify");
        coderesult.confirm(code).then(function(result) {
            var user = result.user;
            console.log("success");
            $.ajax({
                url: "{{route('makeAsPrimary')}}",
                type: 'ajax',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    uid: uid,
                    primary: primary,
                    other: other
                },
                success: function(data) {
                    console.log(data);
                    // $("#successOtpAuth").text("Mobile Number Verified");
                    // $("#successOtpAuth").show();
                    // $("#primaryVerificationModel").modal('hide');
                    // $("#successPrimaryModel").modal('toggle');
                    // $("#mobile_numb1").html(other);
                    // window.location.reload();
                },
                error: function() {
                    $("#otp_error").text("Update Error");
                }

            });

        }).catch(function(error) {
            $("#otp_error").text(error.message);
            $("#otp_error").show();
        });
    }

    function ResendOTP() {
        var n = $("#other_mobile").val();
        var number = "+91" + n;
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#verificationModel").modal('toggle');
        }).catch(function(error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }

    function delete_other() {
        var uid = $("#uid").val();
        var other = $("#other_mobile").val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(isConfirmed => {

            if (isConfirmed.value) {

                $.ajax({
                    url: "{{route('DeleteOther')}}",
                    type: 'ajax',
                    method: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        uid: uid,
                        other: other
                    },
                    success: function(data) {
                        console.log(data);
                        $("#successOtpAuth").text("Mobile Number Verified");
                        $("#successOtpAuth").show();
                        $("#successPrimaryModel").modal('toggle');
                        $("#mobile_numb").html(other);
                        window.location.reload();
                    },
                    error: function() {
                        $("#otp_error").text("Update Error");
                    }

                });

                if (isConfirmed.value) {
                    Swal.fire(
                        'Deleted!',
                        'Mobile has been deleted.',
                        'success'
                    );
                    window.location.reload();
                }
            }
        });


    }
</script>

<script>
    $(function() {
        $(":file").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function imageIsLoaded(e) {
        $('.img-circle').attr('src', e.target.result);
    };



    function sendEmailOTP() {
        var email_type = $('input[name="email_type"]:checked').val();
        var uid = $("#uid").val();
        var email = $("#email_model").val();
        if (email != '') {
            if (isEmail(email)) {
                if (email_type == '1') {
                    $.ajax({
                        url: "{{route('SendEmailOtp')}}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            email: email,
                            uid: uid,
                        },
                        success: function(data) {
                            console.log(data);
                            $('#emailModel').modal('toggle');
                            $("#EmailVerificationModel").modal('show');
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } else {
                    $.ajax({
                        url: "{{route('EmailSecondary')}}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            email: email,
                            uid: uid,
                        },
                        success: function(data) {
                            console.log(data);
                            $('#emailModel').modal('toggle');
                            // $("#successEmailModel").modal('toggle');
                            $("#email_numb").html(email);
                            // Swal.fire(
                            //     'Success!',
                            //     'Email Added Successfully!',
                            //     'success'
                            // ).then(function() {
                            //     window.location.reload();
                            // });
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            } else {
                Swal.fire(
                    'Enter a Valid Email!',
                    'Unrecognised Email.',
                    'error'
                ).then(function() {
                    window.location.reload();
                });
            }

        } else {
            Swal.fire(
                'Email Cannot be Empty!',
                'Email Required!',
                'error'
            ).then(function() {
                window.location.reload();
            });
        }


    }

    function isEmail(email) {
        // var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function make_as_primary_email() {
        var other_email = $('#other_email').val();
        var primary_email = $('#primary_email').val();
        if (isEmail(other_email) && isEmail(primary_email)) {
            var uid = $('#uid').val();
            $.ajax({
                url: "{{route('SendEmailOtp')}}",
                type: 'ajax',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    email: other_email,
                    uid: uid,
                },
                success: function(data) {
                    console.log(data);
                    $("#Make_primary_email").modal('show');
                },
                error: function(err) {
                    console.log(err);
                }
            });
        } else {
            Swal.fire(
                'Enter a Valid Email!',
                'Unrecognised Email.',
                'error'
            ).then(function() {
                window.location.reload();
            });
        }

    }

    function email_primary() {
        var other_email = $('#other_email').val();
        var primary_email = $('#primary_email').val();
        var uid = $('#uid').val();
        var email_otp = $("#email_primary_otp").val();
        if (isEmail(other_email) && isEmail(primary_email)) {
            $.ajax({
                url: "{{route('Make_primary_email')}}",
                type: 'ajax',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    uid: uid,
                    email_otp: email_otp,
                    other_email: other_email,
                    primary_email: primary_email
                },
                success: function(data) {
                    console.log(data);
                    $("#successEmailprimary").text("Email Added Successfully");
                    $("#Make_primary_email").modal('hide');
                    $("#successEmailModel").modal('show');
                    $("#email_numb").html(other_email);
                },
                error: function() {
                    $("#email_primary_error").text("Update Error");
                }

            });
        } else {
            Swal.fire(
                'Enter a Valid Email!',
                'Unrecognised Email.',
                'error'
            ).then(function() {
                window.location.reload();
            });
        }

    }

    function ResendOTP_email() {
        var other_email = $('#other_email').val();
        var uid = $('#uid').val();
        $.ajax({
            url: "{{route('SendEmailOtp')}}",
            type: 'ajax',
            method: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                email: other_email,
                uid: uid,
            },
            success: function(data) {
                console.log(data);
                $("#Email_OTP_Validation").modal('show');
                //email_validation_otp
            },
            error: function(err) {
                console.log(err);
            }
        });
    }


    function email_validation() {
        var otp = $("#email_validation_otp").val();
        var uid = $('#uid').val();
        var other_email = $('#other_email').val();
        $.ajax({
            url: "{{route('validate_email')}}",
            type: 'ajax',
            method: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                uid: uid,
                email_otp: otp,
                other_email: other_email,
            },
            success: function(data) {
                console.log(data);
                $("#successEmailprimary").text("Email Added Successfully");
                $("#Email_OTP_Validation").modal('hide');
                $("#successEmailModel").modal('show');
                $("#email_numb").html(other_email);
            },
            error: function() {
                $("#email_validation_error").text("Update Error");
            }

        });
    }

    function delete_other_email() {
        var uid = $("#uid").val();
        var other_email = $('#other_email').val();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(isConfirmed => {

            if (isConfirmed.value) {

                $.ajax({
                    url: "{{route('DeleteOtherEmail')}}",
                    type: 'ajax',
                    method: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        uid: uid,
                        other_email: other_email
                    },
                    success: function(data) {
                        console.log(data);
                        window.location.reload();
                    },
                    error: function() {
                        $("#otp_error").text("Update Error");
                    }

                });

                if (isConfirmed.value) {
                    Swal.fire(
                        'Deleted!',
                        'Email has been deleted.',
                        'success'
                    );
                    window.location.reload();
                }
            }
        });

    }

    $(function() {
        $(".select2").select2();
        var address = <?php echo json_encode($address) ?>;
        $.each(address, function(i) {
            var state = address[i].state;
            var city = address[i].city;
            get_cities_edit(state, city, i);
        });
    });

    function get_cities_edit(state, city, mkey) {
        var state_id = state;
        $.ajax({
            url: "{{route('get_cities')}}",
            type: 'ajax',
            method: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                state_id: state_id,
            },
            success: function(data) {
                //.log(data);
                var cities = JSON.parse(data);

                $('#city' + mkey)
                    .find('option')
                    .remove()
                    .end();
                $("#city" + mkey).prepend("<option value=''>Select City</option>").val('');
                $.each(cities, function(key, value) {
                    if (city) {
                        if (city == value.id) {
                            var selected = "selected";
                        } else {
                            var selected = "";
                        }
                    } else {
                        var selected = "";
                    }
                    var option = '<option ' + selected + ' value="' + value.id + '">' + value.name +
                        '</option>';
                    $('#city' + mkey).append(option);
                });

            },
            error: function(err) {
                console.log(err);
            }

        });
    }

    function get_cities(state) {
        var state_id = state.value;
        var attr = state.id;
        var city_selected = "$city1";
        $.ajax({
            url: "{{route('get_cities')}}",
            type: 'ajax',
            method: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                state_id: state_id,
            },
            success: function(data) {
                //.log(data);
                var cities = JSON.parse(data);

                $('#city' + attr)
                    .find('option')
                    .remove()
                    .end();
                $("#city" + attr).prepend("<option value=''>Select City</option>").val('');
                $.each(cities, function(key, value) {
                    if (city_selected) {
                        if (city_selected == value.id) {
                            var selected = "selected";
                        } else {
                            var selected = "";
                        }
                    } else {
                        var selected = "";
                    }
                    var option = '<option ' + selected + ' value="' + value.id + '">' + value.name +
                        '</option>';
                    $('#city' + attr).append(option);
                });

            },
            error: function(err) {
                console.log(err);
            }
        });
    }
</script>