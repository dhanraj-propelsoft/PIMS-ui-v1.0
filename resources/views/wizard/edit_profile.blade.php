@extends('layouts.auth.app')

@section('form')

<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        {{-- <p class=" text-white h2">Create Account</p>

                        <p class="white mb-0">
                            Don’t have a Login yet, just enter your mobile number and follow us. we ensure your Signup for a New Account in few steps
                        </p> --}}
                    </div>
                    <div class="form-side">
                        {{-- <a href="Dashboard.Default.html">
                            <span class="logo-single"></span>
                        </a> --}}<br><br><br>
                        <h6 class="mb-4">Profile</h6>
                        <form action="{{route('complete_profile')}}" class="frm-single" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="row form-group header_profile_pic">
                                <div class="small-12 medium-2 large-2 columns">
                                    <div class="circle">
                                        <!-- User Profile Image -->
                                        <img class="profile-pic" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbQhMGTrXKKq2SWR_oAMKqkPge-aKuxqLAIg&usqp=CAU">

                                        <!-- Default Image -->
                                        <!-- <i class="fa fa-user fa-5x"></i> -->
                                    </div>
                                    <div class="p-image">
                                        <i class="glyph-icon simple-icon-camera upload-button"></i>
                                        <input class="file-upload" type="file" name="profilePhoto" accept="image/*" />
                                    </div>
                                </div>
                            </div>

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="Name" name="name" value="{{$result[0]['first_name']}}" />
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Name</span>
                            </label>

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="Mobile" name="mobile" value="{{$result[0]['mobile'][0]['mobile']}}" readonly/>
                                <span class="text-danger">@error('mobile'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Mobile</span>
                            </label>
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="Email" name="email" value="{{$result[0]['email'][0]['email']}}" readonly/>
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Email</span>
                            </label>

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="date" placeholder="DOB" name="dob" value="{{$result[0]['dob']}}" />
                                <span class="text-danger">@error('dob'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">DOB</span>
                            </label>
                            @forelse ( $result[0]['person_address'] as $address)

                            @if ($address['address_type']==1)

                            <label class="form-group col-md-12 p-0 d-flex justify-content-between InputLabel mb-4">
                                <input class="form-control AlterInput w-80 homeInput" type="text" placeholder="home address" name="home_address" value="{{$address['address']}}" readonly />
                                <span class="text-danger">@error('home_address'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Home Address</span>
                                <p class="propelbtn propelbtncurved propelview homeAddressbtn">Add</p>
                            </label>
                            @endif
                            @if ($address['address_type']==2)
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="office address" name="office_address" value="{{$address['address']}}" />
                                <span class="text-danger">@error('office_address'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Office Address</span>
                            </label>
                            @endif
                            @empty

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput w-80 homeInput" type="text" placeholder="home address" name="home_address" value="{{old('home_address')}}" readonly />
                                <span class="text-danger">@error('home_address'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Home Address</span>
                                <p class="propelbtn propelbtncurved propelview">Add</p>
                            </label>

                            {{-- popup Home Address --}}
                            <div class="propel-home-address-popup-container">
                                <div class="propel-home-address-popup">
                                    <h1 class="text-center w-100">
                                        Home Address
                                    </h1>
                                    <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                        <input class="form-control AlterInput  address homea" name="pdoor_no" type="text" placeholder="Door No" />
                                        <span class="AlterInputLabel">Door No </span>
                                    </label>
                                    <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                        <input class="form-control AlterInput address homea" name="pbuildingno" type="text" placeholder="Building Name" />
                                        <span class="AlterInputLabel">Building Name </span>
                                    </label>
                                    <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                        <input class="form-control AlterInput homea" name="plandmark" type="text" placeholder="Land Mark" />
                                        <span class="AlterInputLabel">Land Mark</span>
                                    </label>
                                    <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                        <input class="form-control AlterInput homea" name="parea" type="text" placeholder="Area" />
                                        <span class="AlterInputLabel">Area</span>
                                    </label>
                                    <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                        <input class="form-control AlterInput homea" name="pdistrict" type="text" placeholder="District" />
                                        <span class="AlterInputLabel">District</span>
                                    </label>
                                    <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                        <!-- <input class="form-control AlterInput homea" name="pstate" type="text" placeholder="State" /> -->
                                        <select name="pstate" class="form-control AlterInput homea" onchange="get_cities(this);" required>
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                            <option value="{{$state['id']}}">{{$state['name']}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <span class="AlterInputLabel">State</span>
                                    </label>
                                    <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                        <!-- <input class="form-control AlterInput homea" name="pcity" type="text" placeholder="City" /> -->
                                        <select name="pcity" class="form-control AlterInput homea" id="city">
                                            <option value="">Select City</option>
                                        </select>
                                        <span class="AlterInputLabel">City</span>
                                    </label>
                                    <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                        <input class="form-control AlterInput homea" name="ppincode" type="text" placeholder="Pincode" />
                                        <span class="AlterInputLabel">Pincode</span>
                                    </label>
                                    <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                        <input class="form-control AlterInput homea" name="pcontact" type="text" placeholder="Contact Phone Number" />
                                        <span class="AlterInputLabel">Contact Number</span>
                                    </label>
                                    <div class="row justify-content-around">
                                        <button class="propelbtn propelbtncurved propelback popupback" type="button">Back</button>
                                        <button class="propelbtn propelbtncurved propelsave popupdone" onclick="set_home_address();" type="button">Done</button>
                                    </div>
                                </div>
                            </div>
                            {{-- popup Home address End --}}


                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="office address" name="office_address" value="{{old('office_address')}}" />
                                <span class="text-danger">@error('office_address'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Office Address</span>
                            </label>
                            <div class="propel-popup-container">
                                <div class="propel-popup">

                                </div>
                            </div>
                            @endforelse



                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="Family Name" name="family_name" value="{{$result[0]['family_name'].' '.'family'}}" />
                                <span class="text-danger">@error('family_name'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Family Name</span>
                            </label>

                            <input type="hidden" name="uid" value="{{$uid}}">


                            <div class="d-flex justify-content-end">

                                <button class="propelbtn propelbtncurved propelsave" type="submit">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
<script type="text/javascript" src="{{ asset('js/sweetalert.js')}}"></script>
<script>
    function get_cities(state) {
        var state_id = state.value;
        $.ajax({
            url: "{{route('get_cities')}}",
            type: 'ajax',
            method: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                state_id: state_id,
            },
            success: function(data) {
    
                var cities = JSON.parse(data);
                console.log(cities);
                $('#city')
                    .find('option')
                    .remove()
                    .end();
                $("#city").prepend("<option value=''>Select City</option>").val('');
                $.each(cities, function(key, value) {
                    var option = '<option value="' + value.id + '">' + value.name +
                        '</option>';
                    $('#city').append(option);
                });

            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function validate_address() {
        var address = $(".homeInput").val();
        var name = $(".name").val();

        if (name == '') {
            Swal.fire(
                'Name Required!',
                'Name Field Cannot be Empty',
                'error'
            ).then(function() {

            });
        } else if (address == '') {
            Swal.fire(
                'Home Address Required!',
                'Home Addrerss Field Cannot be Empty',
                'error'
            ).then(function() {

            });
        } else {
            $("#form").submit();
        }

    }

    function set_home_address() {
        var textInput = $('.homea').map(function() {
            if (this.value != '') {
                return this.value;
            }
        }).get().join(',');
        $(".homeInput").val(textInput);
        $(".propel-home-address-popup-container").hide();
    }
</script>