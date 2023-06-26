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
                            <span class="danger" style="color:red;"></span>


                            <span class="success" style="color:green;"></span>

                            <h6 class="mb-4">OTP Verification</h6>

                            <form action="{{ route('PersonDetails') }}" id="formSubmit" class="frm-single" id="sub"
                                method="post" autocomplete="off">
                                @csrf


                                <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                    <input class="form-control AlterInput"
                                        placeholder="Enter OTP Received on {{ $maskEmail }}" id="otp"
                                        name="otp" value="{{ old('otp') }}" required />

                                    <span class="AlterInputLabel">Enter OTP Received On Your Email </span>
                                </label>
                                <input type="hidden" id="email" name="email" value="{{ $email }}">
                                <input type="hidden" id="uid" name="uid" value="{{ $uid }}">

                                <div class="d-flex justify-content-between align-items-center">


                                    <button class="propelbtn propelbtncurved propelreset propel-hover Resend" id="rsotp"
                                        type="button">Resend OTP</button>

                                    <button class="propelbtn propelbtncurved propelsubmit Validate"
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
                var email = $('#email').val();

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
                            $('#formSubmit').submit();
                        } else {
                            propelStatus('danger', ' OTP  Validation Failed');

                        }

                    }
                });
            });

            $(".Resend").click(function() {
                var uid = $("#uid").val();
                var email = $('#email').val();
                $.ajax({
                    url: "{{ route('resendEmailOtp') }}",
                    type: "POST",
                    data: {
                        uid: uid,
                        email: email,
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
