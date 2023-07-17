@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="common-master0 salutation0 add0 for-active"><!-- | -->
 <!-- | -->     <div class="add">                                    <!-- | -->
 <!-- | -->      <span>add</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->


 <form action="" method="post" class="m-auto col-md-6 card p-2 rounded">
    <label class="form-group p-0 mb-4 InputLabel w-100">
        <input type="text" name="salutation" placeholder="Person Salutation..." class="form-control AlterInput " autocomplete="off"  >
        <span class="AlterInputLabel" >Person Salutation</span>
      </label>
      <div class=" mb-5  InputLabel" >
        <textarea name="description" id=" description" cols="30" rows="5" class="col-12 form-control AlterInput " placeholder="Write Your Description" spellcheck="true" ></textarea>
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
        <button class="propelbtn propelbtncurved propelcancel">Cancel</button>
        <button class="propelbtn propelbtncurved propelcancel">Reset</button>

        <button class="propelbtn propelbtncurved propelsubmit" onclick="window.location.href='/salutationEdit'">Save & Close</button>
        <button class="propelbtn propelbtncurved propelsubmit" onclick="window.location.href='/salutationEdit'">Save & New</button>
      </div>

 </form>


@endsection