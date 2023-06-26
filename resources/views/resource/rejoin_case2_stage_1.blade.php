@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 resource0 rejoin0 for-active"><!-- | -->
 <!-- | -->     <div class="rejoin">                                    <!-- | -->
 <!-- | -->      <span>resource  re-joining</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->
  
   {{-- ------------------------------------------------------------------------------------------------------------------- --}}
<form action="/add-resource-stage-3" class="col-sm-6 card m-auto p-5">
    <div class="form-check p-2 m-2">
        <label class="form-check-label w-100" for="gridCheck1" class="col-10">
            You confirm to cancel the Relive option with admitted break and continue the resource with existing resource code, with his  own Book of Record, with all his existing credentials and user data.


        </label>  
    </div>

    <p class="row justify-content-between p-2 m-2">
        <button class="propelbtn propelbtncurved propelcancel propel-hover">Cancel</button>
        <button class="propelbtn propelbtncurved propelsubmit propel-hover" type="submit">Continue</button>
    </p>
 </form>
 @endsection