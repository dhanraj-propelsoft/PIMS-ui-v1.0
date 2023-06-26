@extends('layouts.dashboard.app')
@section('content')
{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 resource0 reliveresource0 for-active"><!-- | -->
 <!-- | -->     <div class="reliveresource">                                    <!-- | -->
 <!-- | -->      <span>Relive Resource</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->
  
   {{-- ------------------------------------------------------------------------------------------------------------------- --}}
 <div class="card">
  <div class="row">
     <div class="col-sm-3  resource-left p-3">
      <div class="add-resource-profile rounded-circle m-auto ">
        <img src="{{asset('assets/images/userlogo.jpg')}}" class="" alt="Person Profile">
        
    </div> 
    <figcaption class="figure-caption text-center">Resource Org Code</figcaption>
    <div class="col-12 p-5">
      <p >
        <label ><i class="simple-icon-user"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Selvaraj</label>
      </p>
      <p >
        <label ><i class="simple-icon-layers"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >manager</label>
      </p>
      <p >
        <label ><i class="simple-icon-basket-loaded"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Sale</label>
      </p>
      <p >
        <label ><i class="simple-icon-folder"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Employer</label>
      </p>
      <p >
        <label ><i class="simple-icon-calendar"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >DOJ : <span>12:23:2002</span></label>
      </p>
      <p >
        <label ><i class="simple-icon-phone"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >90909090990</label>
      </p>
      <p >
        <label ><i class="simple-icon-folder-alt"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Selvaraj@gmail.com</label>
      </p>
      <p >
        <label ><i class="simple-icon-calendar"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >12 janaury 2002</label>
      </p>
      <p >
        <label ><i class="simple-icon-diamond"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >A <sup>+ve</sup></label>
      </p>
      <p >
        <label ><i class="simple-icon-user-female"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Male</label>
      </p>
      <p >
        <label ><i class=""></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Tamil,English</label>
      </p>
      <p >
        <label ><i class=""></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Married</label>
      </p>
      <p >
        <label ><i class=""></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Nominee : <span>Tamil</span></label>
      </p>
      <p >
        <label ><i class="simple-icon-location-pin"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >address</label>
      </p>
    </div>
     </div>

     <form class="col-sm-9 p-5">
      <div class="form-check m-2">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
          Admit Break
        </label>
      </div>
      <div class="form-check m-2">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
        <label class="form-check-label" for="flexRadioDefault2">
          Relieve Resource
        </label>
      </div>
      <label class="form-group  p-0   InputLabel  col-md-8 mt-4">
        <input type="date" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
         <span class="AlterInputLabel">Date Breaking <sup>*</sup></span>
        </label>
        
        <label class="form-group  p-0 mb-4 InputLabel col-md-8">
          <textarea name="description" id="" cols="30" rows="4" class="w-100 form-control AlterInput " placeholder="Write Your Description" spellcheck="true"></textarea>
          <span class="AlterInputLabel">Description</span>
      </label><br>
      <p class="col-md-8 row justify-content-center">
      <button class="propelbtn propelbtncurved propelsubmit " type="submit">Save</button>
    </p>
    </form>

  </div>
 </div>
 <style>
  .resource-left{
    border-left: 1px solid red;
    overflow: auto;
    height:calc(100vh - 137px);
  
  }
 </style>
@endsection