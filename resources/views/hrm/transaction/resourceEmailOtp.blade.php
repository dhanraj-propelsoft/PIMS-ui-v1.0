@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 resource0 rejoin0 for-active"><!-- | -->
 <!-- | -->     <div class="rejoin">                                    <!-- | -->
 <!-- | -->      <span></span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->
  
   {{-- ------------------------------------------------------------------------------------------------------------------- --}}
<form action="{{route('resourceEmailOtpValidate')}}" class="col-sm-6 card m-auto p-5" method="POST">
{{csrf_field()}} 
    <div class="form-check p-2 m-2">
        <label class="form-check-label w-100" for="gridCheck1" class="col-10">
       <b>{{$userName}}</b> is an existing user of propelsoft hence kindly validate the process by entering the <b> OTP received on his email</b>

        </label>


    </div>
    <label class="form-group  p-0   InputLabel w-100 ">
            <input type="text" class="form-control AlterInput w-100" name="otp" placeholder="Enter OTP Received On Your Mobile Number {{$email}}">
             <span class="AlterInputLabel"></span>
            </label>
            <input type="hidden" name="uid" value="{{$uid}}">
    <p class="row justify-content-between p-2 m-2">
        <button class="propelbtn propelbtncurved propelcancel propel-hover">Resend OTP</button>
        <button class="propelbtn propelbtncurved propelsubmit propel-hover" type="submit">validate</button>
    </p>
 </form>
 @endsection