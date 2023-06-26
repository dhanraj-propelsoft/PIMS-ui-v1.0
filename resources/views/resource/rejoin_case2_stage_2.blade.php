@extends('layouts.dashboard.app')
@section('content')
<link rel="stylesheet" href="css/vendor/smart_wizard.min.css" />
{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 resource0 rejoin0 for-active"><!-- | -->
 <!-- | -->     <div class="rejoin">                                    <!-- | -->
 <!-- | -->      <span>resource  re-joining</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->
  
   {{-- ------------------------------------------------------------------------------------------------------------------- --}}
<form action="/add-resource-stage-3" class="col-sm-6 card m-auto p-5">
   
        <label class="form-group  p-0   InputLabel w-100 ">
            <input type="date" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
             <span class="AlterInputLabel">Re-Joined Date</span>
            </label>
    

    <p class="row justify-content-end p-2 m-2">
    
        <button class="propelbtn propelbtncurved propelsubmit propel-hover" type="submit">Continue</button>
    </p>
 </form>
 <style>
     .form-check{
        border: 1px solid rgb(220, 220, 220);
        border-radius: 5px;
    }
 </style>
 @endsection