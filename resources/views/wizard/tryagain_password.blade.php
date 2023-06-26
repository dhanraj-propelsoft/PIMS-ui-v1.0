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
                        <h6 class="mb-4"><em> Hi!</em> <b>{{$name}}</b></h6>
                        Hope you had entered wrong Password you
can  try again or else Reset through Forget
Password
<div class="d-flex align-itmes-center justify-content-center mt-2">
    <a  href=""  onclick="window.history.go(-1); return false;" class="propelbtn propel-hover  propelreset try_password">Try Again</a>
    <a   href="{{url('forget_password',$uid)}}" class="propelbtn propel-hover propelsubmit ">Forget Password</a>
</div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $( document ).ready(function() {
        var path = document.referrer;
        $(".try_password").attr("href", path);
});
</script>
@endsection