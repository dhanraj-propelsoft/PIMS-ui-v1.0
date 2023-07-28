@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="common-master0 city0 view0 for-active"><!-- | -->
 <!-- | -->     <div class="view">                                    <!-- | -->
 <!-- | -->      <span>view</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->


 <div class="m-auto col-md-6 card p-2 rounded">
  <label class="form-group p-0 InputLabel w-100">
    <select disabled  class="form-select w-100 AlterInput search-need" name="state" data-minimum-results-for-search="Infinity"
        data-placeholder="Select State">
        <option selected value="" disabled>Select State</option>
        <option value="{{ $modeldata['stateId'] }}" selected  >{{ $modeldata['stateName'] }}</option>

        <!-- Add more states here -->
    </select>
    <span class="AlterInputLabel box">State</span>
</label>
    <label class="form-group p-0 mb-4 InputLabel w-100">
        <input type="text" name="city" placeholder="Person City..." class="form-control AlterInput " autocomplete="off" disabled value="{{ $modeldata['city'] }}">
        <span class="AlterInputLabel" >Person City</span>
      </label>

      <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">
        <div class="">
          <p>Is Active</p>
        </div>
        <div class="">
          <input name="active_status" value="{{$modeldata['activeStatus']}}" class="custom-switch-input" id="switch" type="checkbox" disabled {{ $modeldata['activeStatus'] == 1 ? 'checked' : '' }} >
          <label class="custom-switch-btn float-right" for="switch"></label>
        </div>
      </div>
      <div class="row justify-content-between  mx-1  mt-3">
        <button class="propelbtn propelbtncurved propelcancel"  onclick="cancelPage()">Close</button>
        <button class="propelbtn propelbtncurved propelsubmit" onclick="viewPage(<?php echo $modeldata['id']; ?>)" >Edit</button>
      </div>

 </div>

 <script>
function viewPage(id){
  var url = "{{ route('city.edit', ':id') }}";
      url = url.replace(':id', id);
  window.location.href = url;
}
function cancelPage(){
  var url = "{{ route('city.index') }}";
    window.location.href = url;
}
</script>
@endsection