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

                            <div class="log-container col-md-12  ">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                                <div>
                                    <span>Propel Soft</span>
                                    <span>Acclereting Business Ahead</span>
                                </div>
                            </div>
                            <h2 class="mb-4 text-capitalize d-inline-block"> Hi! <b>{{ $personName }}</b></h2>

                            <h6 class="mb-4">OTP Verification</h6>

                            <form action="{{ route('passwordPage') }}" class="frm-single FormSub" method="post"
                                id="subForm" method="post" autocomplete="off">
                                @csrf
                                <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                    <input class="form-control AlterInput propel-key-press-input-mendatory"
                                        placeholder="Enter OTP Received on {{ $email }}" id="otp"
                                        name="otp" value="{{ old('otp') }}" />
                                    <span class="AlterInputLabel">OTP <sup>&#9733;</sup> </span>
                                </label>
                                <span href="" class="otp mb-4 text-bold" id="rsotp">Resent OTP</span>
                                <input type="hidden" name="personUid" id="uid" value="{{ $uid }}">
                                <input type="hidden" name="personEmail" id="personEmail" value="{{ $personEmail }}">
                                <input type="hidden" name="personName" id="personName" value="{{ $personName }}">


                                <div class="d-flex justify-content-between align-items-center mt-4">


                                    <button class="propelbtn propelbtncurved  propel-hover propelsubmit" type="button">I'm
                                        {{ $personName }} </button>

                                    <button class="propelbtn propelbtncurved propelsubmit Validate"
                                        type="button">Validate</button>
                                </div>
                            </form>
                            <br>
                            <p class="ExtraInfo">
                                &emsp;&emsp; If you don’t hold the above email, also if youare not holding any previous
                                account in propel
                                Kindly contact Propelsoft.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $('form input').keydown(function(e) {
                if (e.keyCode == 13) {
                    e.preventDefault();
                    return false;
                }
            });
            $("#dumbtn").hide();
            $("#rsotp").click(function() {
                $("#warning").hide();
                var uid = $("#uid").val();
                $.ajax({
                    url: "{{ route('resendOtpForEmailByUid') }}",
                    type: "POST",
                    data: {
                        uid: uid,
                        type: 1,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result) {
                            propelStatus('success', 'Resend OTP Send Your Email');
                        }
                    }
                });

            });
            $(".Validate").click(function() {
                var uid = $("#uid").val();
                var otp = $("#otp").val();
                var email = $('#personEmail').val();
                if (uid && otp && email) {
                    $.ajax({
                        url: "{{ route('validateEmailOtp') }}",
                        type: "POST",
                        data: {
                            uid: uid,
                            otp: otp,
                            email: email,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            var type = result.type;
                            if (type == 1) {
                                $('.FormSub').submit();
                            } else {
                                propelStatus('danger', 'OTP Validation Failed');
                            }
                        }

                    });
                }

            });
        });
    </script>
@endsection
