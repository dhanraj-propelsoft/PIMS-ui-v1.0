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
                            <form action="{{ route('passwordPage') }}" class="frm-single" id="otpForm" method="post"
                                autocomplete="off">
                                @csrf
                                <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                    <input class="form-control AlterInput" type="text" id="verification"
                                        placeholder="Enter OTP Received on your Mobile {{ $mobile }}" name="otp"
                                        value="{{ old('otp') }}" />
                                    <span class="AlterInputLabel">OTP</span>
                                </label>
                                <p class="ExtraInfo">
                                </p>
                                <input type="hidden" name="number" id="number" value="{{ $mobileNumber }}">
                                <input type="hidden" name="personUid" id="personUid" value="">
                                <input type="hidden" name="tempId" id="tempId" class="frm-inp"
                                    value="{{ $tempId }}">
                                    <input type="hidden" name="personName" id="UserName">
                                <div class="frm-input" id="recaptcha-container"></div>

                                <div class="d-flex justify-content-between">

                                    <button class="propelbtn propelbtnrounded propelreset resendOtpForTempId"
                                        type="button">Resend OTP</button>
                                    <button class="propelbtn propelbtnrounded propellogin ValidationForOtp"
                                        type="button">Validate</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $(".ValidationForOtp").click(function() {
                var uid = $("#tempId").val();
                var otp = $("#verification").val();
                if (uid && otp) {
                    $.ajax({
                        url: "{{ route('personConfirmationMobileOTP') }}",
                        type: "POST",
                        data: {
                            tempId: uid,
                            otp: otp,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            var type = result.success;
                            if (type ==true) {
                                var uid = $("#personUid").val(result.data.uid);
                                 var name=$("#UserName").val(result.data.first_name);
                                $('#otpForm').submit();
                            } else  {
                                propelStatus('danger', ' OTP  validation Failed');
                            }
                        }
                    });
                }

            });
            $(".resendOtpForTempId").click(function() {
                var uid = $("#tempId").val();
                var number = $('#number').val();
                if (uid && number) {
                    $.ajax({
                        url: "{{ route('tempOTP') }}",
                        type: "POST",
                        data: {
                            tempId: uid,
                            mobileNumber: number,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result == 1) {
                                propelStatus('success', 'Resend OTP Successfully');
                            } else {
                                propelStatus('danger', 'Resend OTP Failed');

                            }

                        }
                    });

                }


            });


        });
    </script>
@endsection
