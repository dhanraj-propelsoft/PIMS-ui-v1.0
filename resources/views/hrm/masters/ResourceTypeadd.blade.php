@extends('layouts.dashboard.app')
@section('content')

<link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css')}}" />
{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 resourcetype0 add0 for-active"><!-- | -->
 <!-- | -->     <div class="add">                                   <!-- | -->
 <!-- | -->      <span>add</span>                                   <!-- | -->
 <!-- | -->    </div>                                               <!-- | -->
 <!-- | -->   </div>                                                <!-- | -->
 
         {{-- ------------------------------------------------------------------------------------------------------------------- --}}
{{-- @if(session()->has('message'))
<div class="propel-alert propel-alert-success"> 
  <p>{{ session()->get('message') }}</p>
 <p class="simple-icon-close close-grandpa-parent"></p>
 <script>
  setTimeout(function(){
      
  $(".close-grandpa-parent").parent().css('display','none');

}, 2500);
 </script>
</div>
@endif --}}
<form class="col-xl-8 m-auto card propel-card shadow-none rounded p-5" action="{{ route('hrmResourceType.store') }}" method="post">
{{csrf_field()}}
    {{-- <div class="mb-5 row">
      <label for="department" class="col-sm-6"  style="color:blue; ">Human Resource Type</label>
      <input type="text" name="name" class="col-sm-6 border-0 border-bottom outline-none propel-key-press-input propel-key-press-input-mendatory" style="border-color:blue !important; outline:none;">
    </div> --}}
    <input type = "hidden" name="id" value="">
    <label class="form-group  p-0 mb-4 InputLabel w-100">
      <input type="text" name="name" placeholder="Human Resource Type..." class="form-control AlterInput propel-key-press-input propel-key-press-input-mendatory"  autocomplete="off">
       <span class="AlterInputLabel">Human Resource Type</span>
      </label>

    <label class="form-group mb-5  InputLabel " >
      <textarea name="description" id="" cols="30" rows="5" class=" form-control AlterInput " placeholder="Write Your Description" spellcheck="true"></textarea>
      <span class="AlterInputLabel">Description</span>
    </label>
    <div class="custom-switch custom-switch-primary mb-5 row ">
      <div class="col-6" >
        <p>Is Active</p>
      </div>
      <div class="col-6">
      <input class="custom-switch-input" name="active_state" id="switch" type="checkbox" checked>
      <label class="custom-switch-btn float-right" for="switch"></label>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="d-inline m-auto">
    <a href="{{ route('hrmResourceType.index') }}"> <button type="button" class="propelbtn propelbtncurved propelcancel  propel-hover">Cancel</button></a>
    <button type="reset" class="propelbtn propelbtncurved propelreset propel-hover ">Reset</button> 
    <button type="submit" class="propelbtn propelbtncurved propelsubmit  " name="saveAndClose" value="saveAndClose">Save and Close</button>
    <button type="submit" class="propelbtn propelbtncurved propelsubmit  " name="saveAndNew" value="saveAndNew">Save and New</button>
</div>
</div>
  </form>

  <script>
   $(document).ready(function(){
   
   $('.sub-department-check').click(function(){
    if ($('.sub-department-check').prop('checked') == true) {
       $('.parent-department').addClass('d-block');
    } else {
      $('.parent-department').removeClass('d-block');
      $('.parent-department').addClass('d-none');
    }
   });
});
  </script>
@endsection