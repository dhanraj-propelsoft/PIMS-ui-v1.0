@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

<!-- | -->
<div class="common-master0 user0 add0 for-active"><!-- | -->
  <!-- | -->
  <div class="add"> <!-- | -->
    <!-- | --> <span>add</span> <!-- | -->
    <!-- | -->
  </div> <!-- | -->
  <!-- | -->
</div> <!-- | -->


<form action="{{route('users.store')}}" method="post" class="m-auto col-md-6 card p-2 rounded">
  @csrf
  <label class="form-group p-0 InputLabel w-100">
    <select required class="form-select w-100 AlterInput search-need" name="roleId" data-minimum-results-for-search="Infinity"
        data-placeholder="Select Role">
        <option selected value="" disabled>Select Role</option>
        @foreach($modeldatas as $data)
        <option value="{{$data['id']}}">{{$data['name']}}</option>
        @endforeach

    </select>
    <span class="AlterInputLabel box">Roles</span>
</label>

  <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="text" name="userName" required  placeholder="User Name..." class="form-control AlterInput " autocomplete="off">
    <span class="AlterInputLabel">User Name</span>
  </label>

  <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="email" name="email" required  placeholder="User Email..." class="form-control AlterInput " autocomplete="off">
    <span class="AlterInputLabel">Enter Email</span>
  </label>
  <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="number" name="mobile" required  placeholder="User Mobile..." class="form-control AlterInput " autocomplete="off">
    <span class="AlterInputLabel">Enter Mobile</span>
  </label>
  <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="password" name="password" required  placeholder="User password..." class="form-control AlterInput " autocomplete="off">
    <span class="AlterInputLabel">Enter password</span>
  </label>
  <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="password" name="conformPassword" required  placeholder="Conform Password..." class="form-control AlterInput " autocomplete="off">
    <span class="AlterInputLabel">Conform  Password</span>
  </label>
  <div class="row justify-content-between  mx-1  mt-3">
    <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Cancel</button>
    <button type="reset" class="propelbtn propelbtncurved propelcancel">Reset</button>

    <button class="propelbtn propelbtncurved propelsubmit" type="submit" value="saveAndClose" name="link">Save & Close</button>
    <button class="propelbtn propelbtncurved propelsubmit" type="submit" value="saveAndNew" name="link">Save & New</button>
  </div>

</form>
<script>
$(document).ready(function() {
  $('.checkedAll').on('click', function() {
    if ($(this).prop('checked')) {
      $('.manualcheck').not(this).prop('disabled', true);
    } else {
      $('.manualcheck').prop('disabled', false);
    }
  });
});


  function cancelPage() {
    var url = "{{route('users.index')}}";
    window.location.href = url;
  }

</script>

@endsection