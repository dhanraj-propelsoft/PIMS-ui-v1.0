@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

<!-- | -->
<div class="common-master0 state0 add0 for-active"><!-- | -->
  <!-- | -->
  <div class="add"> <!-- | -->
    <!-- | --> <span>add</span> <!-- | -->
    <!-- | -->
  </div> <!-- | -->
  <!-- | -->
</div> <!-- | -->


<form action="{{route('roles.store')}}" method="post" class="m-auto col-md-6 card p-2 rounded">
  @csrf


  <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="text" name="roles" required  placeholder="Enter  Roles.." class="form-control AlterInput " autocomplete="off">
    <span class="AlterInputLabel">Roles</span>
  </label>


  <b>Permission</b>
<br>

  <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">

        @foreach($modeldatas as $data)
      <input name="permission[]"  class="manualcheck" value="{{$data['id']}}"   type="checkbox" >{{$data['name']}}
      @endforeach
      <input type="checkbox" class="checkedAll" name="admin" value="9">Admin
  </div>

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
    var url = "{{route('roles.index')}}";
    window.location.href = url;
  }

</script>

@endsection