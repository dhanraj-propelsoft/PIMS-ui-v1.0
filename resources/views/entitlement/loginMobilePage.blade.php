@extends('layouts.auth.app')

@section('form')
<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">



                    </div>
                    <div class="form-side">
               

                        <div class="log-container col-md-12">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                            <div class="logo-text">
                                <span>Propel Soft</span>
                                <span>Acclereting Business Ahead</span>
                            </div>
                        </div>
                        <h6 class="mb-4">Login</h6>
                        <form action="{{ route('checkUserMobileNumber') }}" id="mobile_form" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            <div class="input-group mb-2 mr-sm-2" style="border-bottom:2px solid rgb(215,215,215);">
                                <div class="input-group-append">
                                    <div class="input-group-text" style="border:none; background:transparent;" onclick="alert('Now we are available only in India ')">+91&nbsp;&nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                        </svg></div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="India" style="text-align:center; outline:none; border:none;" readonly>
                                <span class="input-group-addon d-flex align-items-center border-0 ">
                                    <img src="{{ asset('assets/images/Flag-India.jpg') }}" style="width: 35px;height:25px;" />
                                </span>
                            </div>
                            <br>

                      

                            <label class="form-group  p-0 mb-4 InputLabel w-100">
                                <input type="text" class="form-control AlterInput propel-key-press-input-mendatory" maxlength="10" value="{{old('mobile')}}" validateattr="mobile-num" placeholder="Ex : 9090909090" name="mobileNumber" maxlength="10">
                                <span class="AlterInputLabel">Enter your Personal Mobile Number Only <sup>*</sup></span>
                                
                            </label>
                            @error('mobile')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="d-flex justify-content-end">
                                <button class="propelbtn propelbtncurved propelsubmit" type="submit" id="nextButton" loader="submit">Submit</button>
                            </div>
                            <p class="ExtraInfo">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Don’t have a login yet...!<br> Just enter your mobile number and follow us. we ensure your Signup for a NewAccount in few steps.

                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Input Box js Work --}}
    {{-- <script>
            var userName = document.querySelector('.AlterInput');
            var propelSubmit = document.querySelector('.propelsubmit');
userName.addEventListener('input', restrictNumber);
function restrictNumber (e) {  
  var newValue = this.value.replace(new RegExp(/[^\d]/,'ig'), "");
  this.value = newValue;


}

        </script>
        --}}
</main>
@endsection
<!-- THIS PARTICULAR LINE ARE ALREADY COMMENDED FOR THE PROCESS OF REMOVING CDN. -->
<!-- {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}} -->
<!-- <script>
    // $(function(){
    //     $("#nextButton").attr('disabled','disabled');
    // });
    // $(document).ready(function() {

    //     $("#mobile-num").on("input", function() {
    //         var mobNum = $(this).val();
    //         var filter = /^\d*(?:\.\d{1,2})?$/;

    //         if (filter.test(mobNum)) {
    //             if (mobNum.length == 10) {
    //                 $("#nextButton").removeAttr('disabled');
    //                 $("#mobile_form").submit();
    //                 //window.location.href='{{url("/login/?m=")}}'+mobNum;
    //             } else {
    //                 $("#nextButton").attr('disabled', 'disabled');
    //                 return false;
    //             }
    //         } else {
    //             alert('Not a valid number');
    //             $("#nextButton").attr('disabled', 'disabled');
    //             $("#mobile-valid").addClass("hidden");
    //             return false;
    //         }

    //     });

    // });
</script> -->