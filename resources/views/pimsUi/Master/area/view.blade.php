@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="common-master0 area0 view0 for-active"><!-- | -->
 <!-- | -->     <div class="view">                                    <!-- | -->
 <!-- | -->      <span>view</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->


 <div class="m-auto col-md-6 card p-2 rounded">
  <label class="form-group p-0 InputLabel w-100">
    <select disabled  class="form-select w-100 AlterInput search-need" name="districtId" data-minimum-results-for-search="Infinity"
        data-placeholder="Select District">
        <option selected value="" disabled>Select District</option>
        <option value="{{ $modeldata['districtId'] }}" selected  >{{ $modeldata['districtName'] }}</option>

        <!-- Add more districts here -->
    </select>
    <span class="AlterInputLabel box">District</span>
</label>
    <label class="form-group p-0 mb-4 InputLabel w-100">
        <input type="text" name="area" placeholder="Enter Area..." class="form-control AlterInput " autocomplete="off" disabled value="{{ $modeldata['area'] }}">
        <span class="AlterInputLabel" >Area</span>
      </label>

      <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">
        <div class="">
          <p>Is Active</p>
        </div>
        <div class="">
          <input name="activeStatus" value="{{$modeldata['activeStatus']}}" class="custom-switch-input" id="switch" type="checkbox" disabled {{ $modeldata['activeStatus'] == 1 ? 'checked' : '' }} >
          <label class="custom-switch-btn float-right" for="switch"></label>
        </div>
      </div>
      <div class=" mb-5  InputLabel">
        <textarea name="description" id="description" cols="30" rows="5" class="col-12 form-control AlterInput" disabled placeholder="Write Your Description..." spellcheck="true">{{ $modeldata['description']}}</textarea>
        <span class="AlterInputLabel">Description</span>
      </div>
      <label class="form-group p-0 mb-4 InputLabel w-100">
          <input type="text" name="pinCode" placeholder="Enter PinCode..." class="form-control AlterInput " autocomplete="off" disabled value="{{ $modeldata['pinCode'] }}">
          <span class="AlterInputLabel" >PinCode</span>
        </label>
      <div class="row justify-content-between  mx-1  mt-3">
        <button class="propelbtn propelbtncurved propelcancel"  onclick="cancelPage()">Close</button>
        <button class="propelbtn propelbtncurved propelsubmit" onclick="viewPage(<?php echo $modeldata['id']; ?>)" >Edit</button>
      </div>

 </div>

 <script>
function viewPage(id){
  var url = "{{ route('area.edit', ':id') }}";
      url = url.replace(':id', id);
  window.location.href = url;
}
function cancelPage(){
  var url = "{{ route('area.index') }}";
    window.location.href = url;
}
</script>
@endsection