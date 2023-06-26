@extends('layouts.dashboard.app')
@section('content')            
{{-- This is For Navigation and Breadcrumbs --}}
 <!-- | -->   <div class="hrm0 resource0 addresource0 for-active">  <!-- | -->
 <!-- | -->     <div class="addresource">                                    <!-- | -->
 <!-- | -->      <span>add resource</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->
   {{--------------------------------------------------------------------------------------------------------------------- --}}
   <form action="{{route('findResourceWithEmailAndMobile')}}" method="post" class="col-sm-6">    
   {{csrf_field()}} 
</label>    
   <label class="form-group  p-0 mb-4 InputLabel w-100">
   <input type="text" name="mobile" class="form-control AlterInput propel-key-press-input-mendatory" maxlength="10"  id="mobile-num" placeholder="Ex : 9090909090">
    <span class="AlterInputLabel">Enter Personal Mobile Number1</span>
   </label>
   <label class="form-group  p-0 mb-4 InputLabel w-100">
    <input type="email" name="email" class="form-control AlterInput w-100 propel-key-press-input-mendatory"  placeholder="Ex : valla@gmail.com">
     <span class="AlterInputLabel">Enter Person Email</span>
    </label>
    <div class="w-100">
      <div class="form-check">
          <input class="form-check-input propel-key-press-input-mendatory" type="checkbox" id="gridCheck1">
          <label class="form-check-label" for="gridCheck1">
              The Above Details is Person's Mobile Numebr and email also ensure the above details are not company detail or a shared
              information of their family member.
          </label>  
      </div>
  </div>
  <div class="col-12 d-flex justify-content-center mt-5">
    <button type="submit" class="propelbtn propelcurved propelsubmit propel-key-press-mendatory-button">Submit</button>
  </div>
</form>
 {{-- Input Box js Work --}}
 <script> 
  var userName = document.querySelector('.AlterInput');
  var propelSubmit = document.querySelector('.propelsubmit');
userName.addEventListener('input', restrictNumber);
function restrictNumber (e) {  
var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
this.value = newValue;
}
</script>
   @endsection