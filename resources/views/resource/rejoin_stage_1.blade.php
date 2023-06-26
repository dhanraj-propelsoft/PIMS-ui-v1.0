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
            Cancel the Relieve Option and Continue as Regular
        </label>  
        <input class="form-check-input col-2" type="radio" name="userConfirmation" id="gridCheck1"  hidden="true" >
    </div>
    <div class="form-check p-2 m-2">
        <label class="form-check-label w-100" for="gridCheck2" class="col-10">
            Cancel the Relive option with Admitted Break and  Re-Join Resource with same Resource code

        </label>  
        <input class="form-check-input col-2" type="radio" name="userConfirmation" id="gridCheck2" hidden="true">
    </div>
    <div class="form-check p-2 m-2">
        <label class="form-check-label w-100" for="gridCheck3" class="col-10">
            Create as New Resource, Generate a New Resource Code

        </label>  
        <input class="form-check-input col-2" type="radio" name="userConfirmation" id="gridCheck3" hidden="true">
    </div>
    <p class="row justify-content-end p-2 m-2">
        <button class="propelbtn propelbtncurved propelsubmit" type="submit">Contniue</button>
    </p>
 </form>
 <style>
    .form-check{
        border: 1px solid rgb(220, 220, 220);
        border-radius: 5px;
    }
.form-check:hover{
    background-color: rgb(230, 230, 230);
}


 </style>

   @endsection