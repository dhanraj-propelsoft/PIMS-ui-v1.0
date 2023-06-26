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
                            <form action="{{ route('personEmailOtp') }}" id="person" class="frm-single" method="post"
                                autocomplete="off">
                                @csrf
                                <div class="alert alert-danger" id="error" style="display: none;"></div>
                                <div class="alert alert-success" id="successAuth" style="display: none;"></div>

                                <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                    <input class="form-control AlterInput" id="otp" type="text" id="verification"
                                        placeholder="Enter OTP Received on your Mobile {{ $mobile }}" name="otp"
                                        value="{{ old('otp') }}" />
                                    <span class="text-danger">
                                        @error('otp')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <span class="AlterInputLabel">OTP</span>
                                </label>
                                <p class="ExtraInfo">
                                </p>
                                <input type="hidden" id="uid" name="uid" value="{{ $uid }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" id="number" name="mobileNumber" value="{{ $mobileNumber }}">
                                <div class="frm-input" id="recaptcha-container"></div>
                                <div class="d-flex justify-content-between">
                                    <button class="propelbtn propelbtnrounded propelreset Resend" type="button">Resend
                                        OTP</button>
                                    <button class="propelbtn propelbtnrounded propellogin Validate"
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
            $(".Validate").click(function() {

                var uid = $("#uid").val();
                var otp = $("#otp").val();
                var number = $('#number').val();
                $.ajax({
                    url: "{{ route('personMobileOtpValidated') }}",
                    type: "POST",
                    data: {
                        uid: uid,
                        otp: otp,
                        mobile_no: number,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        var type = result.type;
                        if (type == 1) {
                            $('#person').submit();  
                        } else {
                            propelStatus('danger', 'OTP Validation  Failed');
                        }

                    }
                });
            });

            $(".Resend").click(function() {
                var uid = $("#uid").val();
                var number = $('#number').val();
                $.ajax({
                    url: "{{ route('resendMobileOtp') }}",
                    type: "POST",
                    data: {
                        uid: uid,
                        mobileNumber: number,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result == 1) {
                            propelStatus('success', ' Resend OTP Successfully');
                        } else {
                            propelStatus('danger', 'Resend OTP  Failed');

                        }

                    }
                });

            });


        });
    </script>
@endsection
