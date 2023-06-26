@extends('layouts.dashboard.app')
@section('content')

<style>
	/* Text colors */

	.text-color-white {
		color: #FFFFFF;
	}

	.text-color-black {
		color: #000000;
	}

	.text-color-theme {
		color: #6f5499;
	}

	/* Background colors */
	.theme-bg {
		background: #6f5499;
	}

	.bg-black {
		background: #000000;
	}

	.secondary-bg {
		background: #f0ecf6;
	}


	/* Margin */

	.margin-bottom-0 {
		margin-bottom: 0 !important;
	}

	.margin-bottom-10 {
		margin-bottom: 10px !important;
	}

	.margin-bottom-15 {
		margin-bottom: 15px !important;
	}

	.margin-bottom-20 {
		margin-bottom: 20px !important;
	}

	.margin-bottom-30 {
		margin-bottom: 30px !important;
	}

	.margin-bottom-40 {
		margin-bottom: 40px !important;
	}

	.margin-bottom-50 {
		margin-bottom: 50px !important;
	}

	.margin-bottom-60 {
		margin-bottom: 60px !important;
	}

	.margin-bottom-70 {
		margin-bottom: 70px !important;
	}

	.margin-bottom-80 {
		margin-bottom: 80px !important;
	}

	.margin-bottom-90 {
		margin-bottom: 90px !important;
	}

	.margin-bottom-100 {
		margin-bottom: 100px !important;
	}

	.margin-bottom-120 {
		margin-bottom: 120px !important;
	}

	.margin-right-0 {
		margin-right: 0 !important;
	}

	.margin-right-5 {
		margin-right: 5px !important;
	}

	.margin-right-10 {
		margin-right: 10px !important;
	}

	/* Padding surround */

	.padding-0 {
		padding: 0px !important;
	}

	.padding-30 {
		padding: 30px !important;
	}

	.padding-50 {
		padding: 40px !important;
	}


	/* Buttons */



	.btn-outlined {
		border-radius: 0;
		-webkit-transition: all 0.3s;
		-moz-transition: all 0.3s;
		transition: all 0.3s;
	}

	.btn-outlined.btn-theme {
		background: none;
		color: #6f5499;
		border-color: #6f5499;
	}

	.btn-outlined.btn-theme:hover,
	.btn-outlined.btn-theme:active {
		color: #FFF;
		background: #6f5499;
		border-color: #6f5499;
	}

	.btn-lg {
		font-size: 18px;
		line-height: 22px;
		border: 4px solid;
		padding: 13px 40px;
	}

	.center {
		text-align: center;
	}

	.container {
		text-align: center;
	}
	.text-left{
		float:left;
	}
</style>

<div class="row">
	<div class="col-12">
		<h4>Create Organisation</h4>
		<nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">

		</nav>
		<div class="separator mb-5"></div>
	</div>
</div>

<h5 class="center">FORM</h5>

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

<!--Table-->
<div class="container">
	<div class="row">
		<h2 style="margin:0 auto;">Postal Address</h2>

		<div class="container">
			<div id="loginbox" class="mainbox col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">


					</div>

					<div style="padding-top:30px" class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

								<form action="{{route('organisation_submit')}}" method="post" id="organisation_form" class="form-horizontal" role="form" enctype="multipart/form-data">
									@csrf
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="organisation_name" type="text" class="form-control" name="organisation_name" value="{{$organisation_name}}" placeholder="Organisation Name">
									</div>

									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="organisation_email" type="email" class="form-control" name="organisation_email" value="{{$organisation_email}}" placeholder="Organisation Email">
									</div>
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="organisation_pan" type="text" class="form-control" name="organisation_pan" value="{{$pan}}" placeholder="Organisation PAN">
									</div>

									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="organisation_gst" type="text" class="form-control" name="organisation_gstin" value="{{$gst}}" placeholder="Organisation GSTIN">
									</div>
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="organisation_website" type="text" class="form-control" name="organisation_website" value="{{$organisation_website}}" placeholder="Organisation Website">
									</div>

									<div>
										<label class="text-left">Doc Type</label><br>
										<input id="doc_type" type="text" class="form-control" name="doc_type" value="{{$doc_type}}" placeholder="Enter Doc Type">
									</div>
									<div>
										<label class="text-left">Doc No</label><br>
										<input id="doc_no" type="text" class="form-control" name="doc_no" value="{{$doc_no}}" placeholder="Enter Doc No">
									</div>
									<div>
										<label class="text-left">Doc Validity</label><br>
										<input id="doc_validity" type="date" class="form-control" name="doc_validity" value="{{$doc_validity}}" placeholder="Enter Doc Validity">
									</div>
									<div>
										<label class="text-left">Attachment</label><br>
										<input id="doc_file" type="file" class="form-control" name="doc_file" placeholder="Enter Attachment">
										
											@if($attachment)
												<img src="{{$attachment}}" width="50" height="50">
											@endif

									</div>

							</div>

							<div class="col-md-6">
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="name" type="text" class="form-control" name="door_no" value="{{$door_no}}" placeholder="Door No">
								</div>

								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="email" type="text" class="form-control" name="building_name" value="{{$building_name}}" placeholder="Building Name">
								</div>
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="name" type="text" class="form-control" name="street" value="{{$street}}" placeholder="Street">
								</div>

								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="text" type="text" class="form-control" name="landmark" value="{{$landmark}}" placeholder="Landmark">
								</div>
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="name" type="text" class="form-control" name="pincode" value="{{$pincode}}" placeholder="Pincode *" required>
								</div>

								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<!-- <input id="state" type="text" class="form-control" name="state" value="{{$state}}" placeholder="State"> -->
									<select name="state" class="form-control" id="state" onchange="get_cities(this.value);">
                                    <option value="">Select State</option>
                                    @foreach($states as $s)
                                    <option value="{{ $s['id'] }}" {{ ( $s['id'] == $state) ? 'selected' : '' }}>{{ $s['name'] }}</option>
                                    @endforeach
                                </select>
								</div>
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<!-- <input id="city" type="text" class="form-control" name="city" value="{{$city}}" placeholder="City"> -->
								 <select name="city" class="form-control" id="city">
                                    <option value="">Select City</option>
                                </select>
								</div>

								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="district" type="text" class="form-control" name="district" value="{{$district}}" placeholder="District">
								</div>


								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="area" type="text" class="form-control" name="area" value="{{$area}}" placeholder="Area">
								</div>
								<input type="hidden" name="organisation_admin" value="{{$organisation_admin}}">
								<input type="hidden" name="organisation_client" value="{{$organisation_client}}">
								<input type="hidden" name="temp_id" value="{{$temp_id}}">
							</div>

							<div class="col-md-6">

							</div>
						</div>
						<div style="margin-top:10px" class="form-group">
							<!-- Button -->
							<div class="row">
							<div class="col-sm-6 controls">
							<a href="{{ url('organisation') }}"><button type="button" style="margin:auto;display:block;" id="btn-login" class="btn btn-warning">Organisation </button></a>
							</div>
							<div class="col-sm-6 controls">
							<button type="submit" style="margin:auto;display:block;" id="btn-login" class="btn btn-success">Continue </button>
							</div>
							</div>
						</div>
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
        var state = "{{$state}}";
        get_cities(state);
    });

    function get_cities(state_id) {
        var city_selected = "{{$city}}";
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