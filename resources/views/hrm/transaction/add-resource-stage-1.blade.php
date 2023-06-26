@extends('layouts.dashboard.app')
@section('content')


{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 resource0 addresource0 for-active"><!-- | -->
 <!-- | -->     <div class="addresource">                                    <!-- | -->
 <!-- | -->      <span>add resource</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->
  
   {{-- ------------------------------------------------------------------------------------------------------------------- --}}
   <form action="{{route('findResourceWithEmailAndMobile')}}" class=" col-sm-6  card m-auto p-5" method="post">
    {{csrf_field()}} 

   <label class="form-group  p-0 mb-4 InputLabel w-100">
   <input type="text" name="mobileNo" class="form-control AlterInput propel-key-press-input-mendatory" maxlength="10"  validateattr="mobile-num" placeholder="Ex : 9090909090" name="mobileNo" maxlength="10">
    <span class="AlterInputLabel">Enter Personal Mobile Number <sup>*</sup></span>
   </label>

   <label class="form-group  p-0 mb-4 InputLabel w-100">
    <input type="email" name="email" class="form-control AlterInput w-100 propel-key-press-input-mendatory"  placeholder="Ex : valla@gmail.com"  name="email">
     <span class="AlterInputLabel">Enter Person Email <sup>*</sup></span>
    </label>
    
    <div class="w-100">
      <div class="form-check d-flex align-items-center fomr-check-validate">
          <label class="toggleButton">
            <input class="form-check-input propel-key-press-input-mendatory" type="checkbox" id="gridCheck1" name="ownCredential" agree="yes">
            <div>
                <svg viewBox="0 0 44 44">
                    <path d="M14,24 L21,31 L39.7428882,11.5937758 C35.2809627,6.53125861 30.0333333,4 24,4 C12.95,4 4,12.95 4,24 C4,35.05 12.95,44 24,44 C35.05,44 44,35.05 44,24 C44,19.3 42.5809627,15.1645919 39.7428882,11.5937758" transform="translate(-2.000000, -2.000000)"></path>
                </svg>
            </div>
        </label>
          <label class="form-check-label ml-2" for="gridCheck1">
              The Above Details is Person's Mobile Numebr and email also ensure the above details are not company detail or a shared
              information of their family member.
          </label>  
      </div>
  </div>
  <div class="col-12 d-flex justify-content-center mt-5">
    <button type="submit" class="propelbtn propelcurved propelsubmit propel-key-press-mendatory-button">Submit</button>
  </div>

</form>
 {{-- Input Box js Work
 <script>
  var userName = document.querySelector('.AlterInput');
  var propelSubmit = document.querySelector('.propelsubmit');
userName.addEventListener('input', restrictNumber);
function restrictNumber (e) {  
var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
this.value = newValue;
}

</script> --}}
   @endsection