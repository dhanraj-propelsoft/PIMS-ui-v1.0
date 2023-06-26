@extends('layouts.dashboard.app')
@section('content')

<!--Table-->
<div class="container">
    <div class="row">
        <h2 style="margin:0 auto;">Postal Address</h2>

        <div class="container">

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

            <div id="loginbox" class="mainbox col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">


                    </div>

                    <div style="padding-top:30px" class="panel-body">

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form action="{{route('organisation_confirmation')}}" method="post" id="organisation_form" class="form-horizontal" role="form">
                            @csrf
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="name" type="text" class="form-control" name="door_no" value="@if(!empty($temp_address)){{$temp_address['door_no']}}@endif" placeholder="Door No">
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="email" type="text" class="form-control" name="building_name" value="@if(!empty($temp_address)){{$temp_address['bld_name']}}@endif" placeholder="Building Name">
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="name" type="text" class="form-control" name="street" value="@if(!empty($temp_address)){{$temp_address['street']}}@endif" placeholder="Street">
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="text" type="text" class="form-control" name="landmark" value="@if(!empty($temp_address)){{$temp_address['landmark']}}@endif" placeholder="Landmark">
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="name" type="text" class="form-control" name="pincode" value="@if(!empty($temp_address)){{$temp_address['pincode']}}@endif" placeholder="Pincode *" required>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <!-- <input id="state" type="text" class="form-control" name="state" value="@if(!empty($temp_address)){{$temp_address['state']}}@endif" placeholder="State"> -->
                                <select name="state" class="form-control" id="state" onchange="get_cities(this.value);">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state['id'] }}" {{(isset($temp_address['state']) && $state['id']==$temp_address['state']) ? "selected":"" }}>{{ $state['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <!-- <input id="city" type="text" class="form-control" name="city" value="@if(!empty($temp_address)){{$temp_address['city']}}@endif" placeholder="City"> -->
                                <select name="city" class="form-control" id="city">
                                    <option value="">Select City</option>
                                </select>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="district" type="text" class="form-control" name="district" value="@if(!empty($temp_address)){{$temp_address['district']}}@endif" placeholder="District">
                            </div>


                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="area" type="text" class="form-control" name="area" value="@if(!empty($temp_address)){{$temp_address['area']}}@endif" placeholder="Area">
                            </div>

                            <input type="hidden" name="organisation_name" value="{{$organisation_name}}">
                            <input type="hidden" name="organisation_email" value="{{$organisation_email}}">
                            <input type="hidden" name="temp_id" value="{{$temp_id}}">
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <button type="submit" style="margin:auto;display:block;" id="btn-login" class="btn btn-success">Continue </buttonx>
                                </div>
                            </div>


                        </form>



                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

<script>
    $(function() {
        $(".select2").select2();
        var state = "{{$temp_state}}";
        if(state!=0){
            get_cities(state);
        }
        
    });

    function get_cities(state_id) {
        var city_selected = "{{$temp_city}}";
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
                $('#city')
                    .find('option')
                    .remove()
                    .end();
                $("#city").prepend("<option value=''>Select City</option>").val('');
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
                    $('#city').append(option);
                });

            },
            error: function(err) {
                console.log(err);
            }

        });
    }
</script>