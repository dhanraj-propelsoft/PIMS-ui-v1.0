  @extends('layouts.dashboard.app')
@section('content')

<link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css')}}" />
{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 designation0 add0 for-active"><!-- | -->
 <!-- | -->     <div class="add">                                    <!-- | -->
 <!-- | -->      <span>add</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->

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
<form class="col-xl-8 m-auto card propel-card shadow-none rounded p-5"  action="{{ route('hrmDesignation.store') }}" method="post">
{{csrf_field()}}
    {{-- <div class="mb-5 row">
      <label for="department" class="col-sm-6"  style="color:blue;">Designation Name</label>
      <input type="text" name="designation" class="col-sm-6 border-0 border-bottom outline-none propel-key-press-input propel-key-press-input-mendatory" style="border-color:blue !important; outline:none;">
    </div> --}}
    <label class="form-group  p-0 mb-4 InputLabel w-100">
      <input type="text" name="designation" placeholder="Enter Your Designation Name..." class="form-control AlterInput propel-key-press-input propel-key-press-input-mendatory"  autocomplete="off">
       <span class="AlterInputLabel">Designation Name</span>
      </label>
      <label class="form-group m-0  p-0 InputLabel w-100">
        <input type="text" name="no_of_posting" placeholder="No of Posting..." class="form-control AlterInput propel-key-press-input "  autocomplete="off">
         <span class="AlterInputLabel">No of Posting</span>
        </label>
        <br>
        <em class="mb-4 ">&nbsp;&nbsp;&nbsp;The only purpose of  this, is to show number of  vacancies available.
          </em>
    <!-- <div class="mb-5 row">
      <label for="department" class="col-sm-6">Max Allowed Posting under this Designation<br><em class="text-muted text-1">
        The only purpose of  this, is to show number of  vacancies available.
      </em>
      </label>
      <input type="text" class="col-sm-6 border-0 border-bottom outline-none propel-key-press-input propel-key-press-input-mendatory" style="border-color:blue !important; outline:none;">
    </div> -->
    {{-- <div class="form-ggroup">
      <label for="department" class="col-sm-6" >Department</label>
      <select class="form-select col-sm-6 department" id="department" name="department" >
      <option selected value="">Select Department</option>
      @foreach($datas as $data)
      <option value="{{$data['id']}}">{{$data['name']}}</option>
      @endForeach
    </select>
    </div> --}}
    <label class="form-group  p-0 mb-4 InputLabel w-100">
      <select class="form-select form-control department search-need propel-key-press-input-mendatory" id="department" name="department" >
        <option selected value="">Select Department</option>
        @foreach($datas as $data)
        <option value="{{$data['id']}}">{{$data['department_name']}}</option>
        @endForeach
      </select>
      </label>
    <div class=" mb-5  InputLabel" >
      <textarea name="description" id=" description" cols="30" rows="5" class="col-12 form-control AlterInput " placeholder="Write Your Description" spellcheck="true"></textarea>
      <span class="AlterInputLabel">Description</span>
    </div>
    <div class="custom-switch custom-switch-primary mb-5 row ">
      <div class="col-6" >
        <p>Is Active</p>
      </div>
      <div class="col-6">
      <input name="status" class="custom-switch-input" id="switch" type="checkbox" checked>
      <label class="custom-switch-btn float-right" for="switch"></label>
    </div>
    <input type="hidden" name="id" value="">
  </div>

  <div class="row justify-content-center">
    <div class="d-inline m-auto">
    <a href="{{URL::previous()}}"><button type="button" class="propelbtn propelbtncurved propelcancel  propel-hover">Cancel</button></a>
    <button type="reset" class="propelbtn propelbtncurved propelreset  ">Reset</button>
    <button type="submit" class="propelbtn propelbtncurved propelsubmit " name="saveAndClose" value="saveAndClose">Save and Close</button>
      <button type="submit" class="propelbtn propelbtncurved propelsubmit " name="saveAndNew" value="saveAndNew">Save and New</button>

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