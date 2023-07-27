@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

<!-- | -->
<div class="common-master0 city0 add0 for-active"><!-- | -->
  <!-- | -->
  <div class="add"> <!-- | -->
    <!-- | --> <span>add</span> <!-- | -->
    <!-- | -->
  </div> <!-- | -->
  <!-- | -->
</div> <!-- | -->


<form action="" method="post" class="m-auto col-md-6 card p-2 rounded">
  @csrf 
  <label class="form-group p-0 InputLabel w-100">
    <select class="form-select w-100 AlterInput search-need" name="state" data-minimum-results-for-search="Infinity"
        data-placeholder="Select State">
        <option selected value="" disabled>Select State</option>
        <option value="andhra_pradesh" >Andhra Pradesh</option>
        <option value="telangana" >Telangana</option>
        <option value="karnataka">Karnataka</option>
        <!-- Add more states here -->
    </select>
    <span class="AlterInputLabel box">State</span>
</label>


  <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="text" name="city" required  placeholder="Person City..." class="form-control AlterInput " autocomplete="off">
    <span class="AlterInputLabel">Person City</span>
  </label>
 
  <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">
    <div class="">
      <p>Is Active</p>
    </div>
    <div class="">
      <input name="active_status" value="1" class="custom-switch-input" id="switch" type="checkbox" checked>
      <label class="custom-switch-btn float-right" for="switch"></label>
    </div>
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
    const checkbox = $('#switch');
    const statusInput = $('[name="active_status"]').eq(0);

    checkbox.on('change', function() {
      if (this.checked) {
        statusInput.val(1);
      } else {
        statusInput.val(0);
      }
    });
  });
  function cancelPage() {
    var url = '';
    window.location.href = url;
  }

</script>

@endsection