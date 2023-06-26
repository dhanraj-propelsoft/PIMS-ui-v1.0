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
                        <h6 class="mb-4">Create a Account </h6>
                        <form action="{{route('create_password')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            <div class="alert alert-danger" id="error" style="display: none;"></div>
                            <div class="alert alert-success" id="successAuth" style="display: none;"></div>

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" id="verification" placeholder="Enter your OTP" name="otp" value="{{ old('otp') }}" />
                                <span class="text-danger">@error('otp'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">OTP</span>
                            </label>
                            <p class="ExtraInfo">
                                Enter OTP Received on your Mobile @isset($mobile['mobile']){{$mobile['mobile']}}@endisset
                            </p>

                            <input type="hidden" value="{{$mobile['mobile']}}" id="number">
                            <input type="hidden" name="uid" id="uid" class="frm-inp" value="{{$uid}}">
                            <div class="frm-input" id="recaptcha-container"></div>

                            <div class="d-flex justify-content-between">

                                <button class="propelbtn propelbtnrounded propelreset" type="button" onclick="ResendOTP();">Resend OTP</button>
                                <button class="propelbtn propelbtnrounded propellogin" type="button" onclick="verify();">Validate</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

<script>
    var firebaseConfig = {
        apiKey: "AIzaSyAGGpTyLhdOPkKhox6hh6AsN_Ykk0-RsZI",
        authDomain: "propel-68894.firebaseapp.com",
        databaseURL: "https://propel-68894.firebaseapp.com",
        projectId: "propel-68894",
        storageBucket: "propel-68894.appspot.com",
        messagingSenderId: "777207678412",
        appId: "1:777207678412:web:58e2af28992df8f2cc0969",
        measurementId: "G-PBBJN2TV6W"
    };

    firebase.initializeApp(firebaseConfig);
    console.log(firebase.app().name);
</script>
<script type="text/javascript">
    //Firebase//


    window.onload = function() {
        render();
        sendOTP();
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
            "recaptcha-container", {
                size: "invisible",
                callback: function(response) {
                    sendOTP();
                }
            }
        );
        // window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        // recaptchaVerifier.render();
    }

    function sendOTP() {
        var n = $("#number").val();
        var number = "+91" + n;
        //var number="+918220695662";
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#successAuth").text("Message sent");
            $("#successAuth").show();
        }).catch(function(error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }

    function verify() {
        var code = $("#verification").val();
        var uid = $("#uid").val();
        coderesult.confirm(code).then(function(result) {
            var user = result.user;
            console.log("success");
            window.location.href = "{{URL::to('create_password?uid=')}}" + uid
            $("#successOtpAuth").text("Auth is successful");
            $("#successOtpAuth").show();
        }).catch(function(error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }

    function ResendOTP() {
        var n = $("#number").val();
        var number = "+91" + n;
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#successAuth").text("Message sent");
            $("#successAuth").show();
        }).catch(function(error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
</script>
