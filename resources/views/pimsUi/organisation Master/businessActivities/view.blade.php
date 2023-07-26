@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="common-master0 businessActivities0 view0 for-active"><!-- | -->
 <!-- | -->     <div class="view">                                    <!-- | -->
 <!-- | -->      <span>view</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->


 <div class="m-auto col-md-6 card p-2 rounded">
    <label class="form-group p-0 mb-4 InputLabel w-100">
        <input type="text" name="businessActivities" placeholder="Person Business Activities..." class="form-control AlterInput " autocomplete="off" disabled value="">
        <span class="AlterInputLabel" >Person Business Activities</span>
      </label>
      
      <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">
        <div class="">
          <p>Is Active</p>
        </div>
        <div class="">
          <input name="active_status" value="" class="custom-switch-input" id="switch" type="checkbox" disabled >
          <label class="custom-switch-btn float-right" for="switch"></label>
        </div>
      </div>
      <div class="row justify-content-between  mx-1  mt-3">
        <button class="propelbtn propelbtncurved propelcancel"  onclick="cancelPage()">Close</button>
        <button class="propelbtn propelbtncurved propelsubmit" onclick="viewPage()" >Edit</button>
      </div>

 </div>

 <script>
function viewPage(id){
  var url = '';
      url = url.replace(':id', id);
  window.location.href = url;
}
function cancelPage(){
  var url = '';
  window.location.href = url;
}
</script>
@endsection