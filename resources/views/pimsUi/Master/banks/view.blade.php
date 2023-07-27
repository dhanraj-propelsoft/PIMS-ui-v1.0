@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="common-master0 banks0 view0 for-active"><!-- | -->
 <!-- | -->     <div class="view">                                    <!-- | -->
 <!-- | -->      <span>view</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->


 <div class="m-auto col-md-6 card p-2 rounded">
         <!-- Person Bank -->
   <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="text" name="bank" required placeholder="Person Bank..." value="{{$modeldata['bankName']}}" class="form-control AlterInput" autocomplete="off" disabled>
    <span class="AlterInputLabel">Person Bank</span>
</label>

<!-- Person IFSC Code -->
<label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="text" name="ifsc_code" required placeholder="Person IFSC Code..." value="{{$modeldata['ifsc']}}" class="form-control AlterInput" autocomplete="off" disabled>
    <span class="AlterInputLabel">Person IFSC Code</span>
</label>

<!-- Person MICR Code -->
<label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="text" name="micr_code" required placeholder="Person MICR Code..." value="{{$modeldata['micr']}}" class="form-control AlterInput" autocomplete="off" disabled>
    <span class="AlterInputLabel">Person MICR Code</span>
</label>
      <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">
        <div class="">
          <p>Is Active</p>
        </div>
        <div class="">
          <input name="active_status" value="{{$modeldata['activeStatus']}}" class="custom-switch-input" id="switch" type="checkbox" disabled  {{ $modeldata['activeStatus'] == 1 ? 'checked' : '' }}>
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
  var url ="{{ route('bank.edit', ':id') }}";
      url = url.replace(':id', id);
  window.location.href = url;
}
function cancelPage(){
  var url = "{{ route('bank.index') }}";
  window.location.href = url;
}
</script>
@endsection