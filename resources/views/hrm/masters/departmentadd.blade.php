@extends('layouts.dashboard.app')
@section('content')

<link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css')}}" />
{{-- This is For Navigation and Breadcrumbs --}}

<!-- | -->
<div class="hrm0 department0 add0 for-active">
  <!-- | -->
  <!-- | -->
  <div class="add">
    <!-- | -->
    <!-- | --> <span>add</span> <!-- | -->
    <!-- | -->
  </div> <!-- | -->
  <!-- | -->
</div> <!-- | -->

{{-- ------------------------------------------------------------------------------------------------------------------- --}}
{{-- @if(session()->has('message'))
<div class="propel-alert propel-alert-success"> 
  <p>{{ session()->get('message') }}</p>
<p class="simple-icon-close close-grandpa-parent"></p>
<script>
  setTimeout(function() {

    $(".close-grandpa-parent").parent().css('display', 'none');

  }, 2500);
</script>
</div>
@endif --}}
<form class="col-xl-8 m-auto card propel-card shadow-none rounded p-5" action="{{ route('hrmDepartment.store') }}" method="post">
  {{csrf_field()}}

  <label class="form-group  p-0 mb-4 InputLabel w-100">
    <input type="text" name="name" placeholder="Enter Your Department Name..." class="form-control AlterInput propel-key-press-input-mendatory" autocomplete="off">
    <span class="AlterInputLabel">Department Name <sup>*</sup></span>
  </label>

  {{-- Dual Input --}}
  <div class="form-row">
    <div class="form-group col-md-6">
      <div class="custom-control custom-checkbox mb-4">
        <input type="checkbox" class="custom-control-input sub-department-check" id="customCheckThis">
        <label class="custom-control-label" for="customCheckThis">It is a Sub Department of</label>
      </div>
    </div>
    <div class="form-group col-md-6">
      <select class="form-select d-none w-100 parent-department" id="parent_dept_id" name="parent_dept_id">
        <option selected value="" disabled>Select Parent Department</option>
        @foreach($parentDeptDatas as $parentDeptData)
        <option value="{{$parentDeptData['id']}}">{{$parentDeptData['department_name']}}</option>
        @endForeach
      </select>
    </div>
  </div>


  <label class="form-group  p-0 mb-4 InputLabel w-100">
    <textarea name="description" id="" cols="30" rows="4" class="w-100 form-control AlterInput" placeholder="Write Your Description" spellcheck="true"></textarea>
    <span class="AlterInputLabel">Description</span>
  </label>
  <div class="custom-switch custom-switch-primary mb-5 row ">
    <div class="col-6">
      <p>Is Active</p>
    </div>
    <div class="col-6">
      <input name="status" class="custom-switch-input" id="switch" type="checkbox" checked>
      <label class="custom-switch-btn float-right" for="switch"></label>
    </div>
  </div>
  <input type="hidden" name="id" value="">
  <div class="row justify-content-center">
    <div class="d-inline m-auto">
      <a href="{{ route('hrmDepartment.index') }}"><button type="button" class="propelbtn propelbtncurved propelcancel m-2">Cancel</button></a>
      <button type="reset" class="propelbtn propelbtncurved propelreset">Reset</button>
      <button type="submit" class="propelbtn propelbtncurved propelsubmit" name="saveAndClose" value="saveAndClose">Save and Close</button>
      <button type="submit" class="propelbtn propelbtncurved propelsubmit" name="saveAndNew" value="saveAndNew">Save and New</button>
    </div>
  </div>
</form>

<script>
  $(document).ready(function() {
    $('.sub-department-check').click(function() {
      if ($('.sub-department-check').prop('checked') == true) {
        $('.parent-department').addClass('d-block');
        $('.parent-department').select2({
  
  templateSelection: function (data) {
  
    return data.text;
  }
});
      } else {
        $('.parent-department').removeClass('d-block');
        $('.parent-department').addClass('d-none');
        $('.parent-department').select2("destroy");
        $('.parent-department option:first').prop('selected', true).trigger("change");
      }
    });
  });
</script>
@endsection