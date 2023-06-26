@extends('layouts.dashboard.app')
@section('content')

<link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css')}}" />
<script src="{{ asset('js/custom.js') }}" defer></script>
{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 department0 edit0 for-active"><!-- | -->
 <!-- | -->     <div class="edit">                                    <!-- | -->
 <!-- | -->      <span>edit</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->
  
         {{-- ------------------------------------------------------------------------------------------------------------------- --}}
<form class="col-xl-8 m-auto card propel-card rounded shadow-none p-5" method="post" action="{{ route('hrmDepartment.store') }}"  data-edit-form="true">
  
  @csrf
  {{-- <div class="mb-5 row">
    <label for="department" class="col-sm-6" style="color:blue; ">Department Name</label>
    <input type="text" name="department" value="{{$datas['name']}}" placeholder="Enter Your Department Name..." class="col-sm-6 border-0 border-bottom outline-none  propel-key-press-input propel-key-press-input-mendatory" style="border-color:blue !important; outline:none;">
  </div> --}}
<input type="hidden" name="id" value="{{$datas['id']}}">
  <label class="form-group  p-0 mb-4 InputLabel w-100">
    <input type="text" name="name" placeholder="Enter Your Department Name..." class="form-control AlterInput propel-key-press-input propel-key-press-input-mendatory"  value="{{$datas['department_name']}}" autocomplete="off">
     <span class="AlterInputLabel">Department Name</span>
    </label>

    <div class="form-row">
      <div class="form-group col-md-6">
      <div class="custom-control custom-checkbox mb-4">
        <input type="checkbox" class="custom-control-input sub-department-check" id="customCheckThis">
        <label class="custom-control-label" for="customCheckThis">It is a Sub Department of</label>
      </div>
    </div>
    <div class="form-group col-md-6">
    <select class="form-select d-none w-100 parent-department" id="parent_dept_id" name="parent_dept_id">
      <option selected value="">Select Parent Department</option>
      @foreach($parentDeptDatas as $parentDeptData)
      <option value="{{$parentDeptData['id']}}" <?php echo ($parentDeptData['id'] == $datas['parent_dept_id']) ? 'Selected' : ""; ?>>{{$parentDeptData['department_name']}}</option>
      @endForeach
    </select>
    </div>
  </div>

 
    

  
<label class="form-group  p-0 mb-4 InputLabel w-100">
  <textarea name="description" id="" cols="30" rows="4" class="w-100 form-control AlterInput propel-key-press-input" placeholder="Write Your Description" spellcheck="true">{{$datas['description']}}</textarea>
  <span class="AlterInputLabel">Description</span>
</label>

  <div class="custom-switch custom-switch-primary mb-5 row ">
    <div class="col-6">
      <p>Is Active</p>
    </div>
    <div class="col-6">
      <input class="custom-switch-input status" id="switch" type="checkbox" name="status" status-data="{{$datas['active_state']}}">
      <label class="custom-switch-btn float-right" for="switch"></label>
    </div>

  </div>
  <div class="row justify-content-center">
    <div class="d-inline">
      <a href="{{ URL::previous() }}"><button type="button" class="propelbtn propelbtncurved propelcancel m-2">Cancel</button></a>
      <button type="submit" class="propelbtn propelbtncurved propelsubmit m-2">Update</button>
    </div>
  </div>
</form>



<script>
  $(document).ready(function() {
    var checkParentdept = "{{$datas['parent_dept_id']}}";
    var status = $('.status').attr('status-data');
    if (status == 1) {
      $('.status').attr('checked', true);
    } else {
      $('.status').attr('checked', false);
    }


    if (checkParentdept) {
      // console.log('sub dept Here');
      $('.sub-department-check').trigger('click');
      checkBoxCheck();
    }

    $('.sub-department-check').click(function() {
      checkBoxCheck();
    });
  });

  function checkBoxCheck() {
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
    }
  }

 </script>
@endsection