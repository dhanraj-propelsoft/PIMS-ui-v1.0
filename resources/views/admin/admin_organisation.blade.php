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
.theme-bg{
	background: #6f5499;
}

.bg-black{
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

.btn-lg{
	font-size:18px;
	line-height:22px;
	border: 4px solid;
	padding:13px 40px;
}
.center{
    text-align:center;
}
.container {
    text-align: center;
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

<h5 class="center">Does your Organisation have GSTIN</h5>


<div class="container">
    <br>
	<div class="row">
    <div class="col-md-12">
        <form action="{{route('gst_form')}}" method="post">
            @csrf
            <input type="hidden" name="door_no" value="{{$door_no}}">
        <input type="hidden" name="building_name" value="{{$building_name}}">
        <input type="hidden" name="street" value="{{$street}}">
        <input type="hidden" name="landmark" value="{{$landmark}}">
        <input type="hidden" name="pincode" value="{{$pincode}}">
        <input type="hidden" name="state" value="{{$state}}">
        <input type="hidden" name="city" value="{{$city}}">
        <input type="hidden" name="district" value="{{$district}}">
        <input type="hidden" name="area" value="{{$area}}">
        <input type="hidden" name="organisation_name" value="{{$organisation_name}}">
        <input type="hidden" name="organisation_email" value="{{$organisation_email}}">
        <input type="hidden" name="organisation_admin" value="{{$organisation_admin}}">
        <input type="hidden" name="organisation_client" value="{{$organisation_client}}">
        <input type="hidden" name="temp_id" value="{{$temp_id}}">
        <button type="submit" class="btn btn-outlined btn-theme btn-lg">We Have GSTIN</button>
        </form>
        </div>
	</div>
    <hr>
    <div class="row">
        <div class="col-md-12">
        <form action="{{route('organisation_form')}}" method="post">
            @csrf
            <input type="hidden" name="door_no" value="{{$door_no}}">
        <input type="hidden" name="building_name" value="{{$building_name}}">
        <input type="hidden" name="street" value="{{$street}}">
        <input type="hidden" name="landmark" value="{{$landmark}}">
        <input type="hidden" name="pincode" value="{{$pincode}}">
        <input type="hidden" name="state" value="{{$state}}">
        <input type="hidden" name="city" value="{{$city}}">
        <input type="hidden" name="district" value="{{$district}}">
        <input type="hidden" name="area" value="{{$area}}">
        <input type="hidden" name="organisation_name" value="{{$organisation_name}}">
        <input type="hidden" name="organisation_email" value="{{$organisation_email}}">
        <input type="hidden" name="temp_id" value="{{$temp_id}}">
        <button type="submit" class="btn btn-outlined btn-theme btn-lg">We Don't Have GSTIN</button>
        </form>
    </div>
      
	</div>
    <br>
    <div class="row">
    <div class="col-md-12">
    <p class="center">Note: * Organisation Administartors are the responsible person who actually operate and authority to pay for the organization.</p>
    </div>
    </div>
</div>

@endsection




