@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="common-master0 genre0 view0 for-active"><!-- | -->
 <!-- | -->     <div class="view">                                    <!-- | -->
 <!-- | -->      <span>view</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->


 <div class="m-auto col-md-6 card p-2 rounded">
    <label class="form-group p-0 mb-4 InputLabel w-100">
      <select class="form-select w-100 AlterInput search-need" name="Genre" data-minimum-results-for-search="Infinity" data-placeholder="Salutation">
        <option selected value="" disabled>Salutation</option>
        <option>Male</option>
        <option>Female</option>
        <option>Non-Binary</option>
        <option>Other</option>
      </select>
      
      </label>
      <div class=" mb-5  InputLabel" >
        <textarea name="description" id=" description" cols="30" rows="5" class="col-12 form-control AlterInput " placeholder="Write Your Description" spellcheck="true" disabled>This Text Place</textarea>
        <span class="AlterInputLabel">Description</span>
      </div>
      <div class="row justify-content-between mx-1">
        <span>
            Is Active
        </span>
        <span>
            YES
        </span>

      </div>
      <div class="row justify-content-between  mx-1  mt-3">
        <button class="propelbtn propelbtncurved propelcancel">Close</button>
        <button class="propelbtn propelbtncurved propelsubmit" onclick="window.location.href='/genreEdit'" >Edit</button>
      </div>

 </div>


@endsection