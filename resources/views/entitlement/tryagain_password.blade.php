@extends('layouts.auth.app')
@section('form')
<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">
                        {{-- <p class=" text-white h2">Create Account</p> --}}
                    </div>
                    <div class="form-side">
                        {{-- <a href="Dashboard.Default.html">
                            <span class="logo-single"></span>
                        </a> --}}
                        <div class="log-container col-md-12  ">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                            <div>
                                <span>Propel Soft</span>
                                <span>Acclereting Business Ahead</span>
                            </div>
                        </div>
                        <h2 class="mb-4 text-capitalize"> Hi! <b>{{$name}}</b></h2>
                     <span>  Hope you had entered wrong Password you
can  try again or else Reset through Forget
Password</span>
<br><br>
<div class="d-flex align-itmes-center justify-content-between mt-2">
    <form action="{{route('resendOtpForEmailByUid')}}" class="frm-single" method="post" autocomplete="off">
      @csrf
    <input type="hidden" name="uid" value="{{$uid}}">
    <button  class="propelbtn propel-hover propelsubmit " type="submit">Forget Password</button>
    </form>
    <a  href=""  onclick="window.history.go(-1); return false;" class="propelbtn propel-hover  propelsubmit  try_password">Try Again</a>

</div>
<br><br><br>
<p class="ExtraInfo">
    &nbsp;&nbsp; If you don’t hold the above email/mobile, also if you are not holding any previous account in propel Kindly contact <span class="propel-text-info">Propelsoft </span>.​
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script>
    $( document ).ready(function() {
        var path = document.referrer;
        $(".try_password").attr("href", path);
});
</script>
@endsection