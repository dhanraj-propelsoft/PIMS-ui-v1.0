@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="organisation0 organisation-list0 for-active"><!-- | -->
 <!-- | -->                                          <!-- | -->
 <!-- | -->   </div>      <!-- | -->
  
   {{-- ------------------------------------------------------------------------------------------------------------------- --}}
<form action="" class="col-sm-6 card m-auto p-5">
    <div class="p-2 m-2">
    
          <h2>No Organization was found on your user account
        </h2>
       <p>
        Only Administrator<span class="text-danger">*</span> can create and edit an Organization,
If you are an administrator  Just follow us, In few steps you can create an organization. by clicking create.

       </p>

    </div>

    <p class="row justify-content-center p-2 m-2">
        <button class="propelbtn propelbtncurved propelsubmit propel-hover" type="submit">Continue</button>
    </p>
 </form>
 {{-- Created By Vallatharasu --}}
 @endsection