@extends('layouts.dashboard.app')
@section('content')
    <div class="user0 change-password0 for-active"></div>


    <div class="row m-2 d-flex justify-content-center align-items-center change-password-container" vh="150">

        <form action="{{ route('changePassword') }}" method="post" id="organisation_form"
            class="form-horizontal col-lg-4 p-4 card propel-card  shadow-none" role="form" onsubmit="return false">
            @csrf
            <h3 class="d-block text-center mb-4 font-weight-bold">Set New Password </h3>
            <label class="input-group col-md-12 p-0  InputLabel mb-4">
                <input class="form-control AlterInput propel-key-press-input-mendatory oldPassword" type="Password"
                    placeholder="Old Password" name="oldPassword" value="{{ old('middle_name') }}" />
                    <span class="input-group-addon">
                        <div class="fa-regular fa-eye pwd-view"></div>
                    </span>
                <span class="AlterInputLabel">Old Password</span>
            </label>
            <label class="input-group col-md-12 p-0  InputLabel mb-4 ">
                <input class="form-control AlterInput propel-key-press-input-mendatory newPassword" type="Password"
                    id="pwd" placeholder="New Password" name="newPassword" value="{{ old('middle_name') }}" />
                    <span class="input-group-addon">
                        <div class="fa-regular fa-eye pwd-view"></div>
                    </span>
                <span class="AlterInputLabel">New Password</span>
            </label>
            <label class="input-group col-md-12 p-0  InputLabel mb-4">
                <input class="form-control AlterInput propel-key-press-input-mendatory confPassword" type="Password"
                    validationAttr="check" checkId="pwd" placeholder="Confirm Password" name="confirmPassword"
                    value="{{ old('middle_name') }}" />
                    <span class="input-group-addon">
                        <div class="fa-regular fa-eye pwd-view"></div>
                    </span>
                <span class="AlterInputLabel">Confirm Password</span>
            </label>
            <div class="row justify-content-center">
                <button class="propelbtn propelsubmit cp-btn submit-btn"  type="submit">Submit</button>
            </div>

        </form>
        <div class="modal fade overflow-hidden " id="ChangePassword" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog mt-0 overflow-hidden" role="document">
                <div class="modal-content overflow-hidden">
                    <div class="modal-header p-2 border-0">
                        <h3 class="modal-title w-100 text-center" id="exampleModalLabel">Change Password</h3>
                        <button type="button" class="propel-glass-btn close-btn mobile-number-modal" data-dismiss="modal"
                            aria-label="Close">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2"
                                    rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor"></rect>
                                <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                    transform="rotate(45 8.46447 7.05029)" fill="currentColor"></rect>
                            </svg>
                        </button>
                    </div>


                    <div class="card-body ">
                        <div class="d-flex justify-content-center m-2">
                            <div class="success-icon">
                                <div class="success-icon__tip"></div>
                                <div class="success-icon__long"></div>
                            </div>
                        </div>
                        <p class="text-center"> Your Password had been changed successfully.</p>
                    </div>

                </div>
            </div>
        </div>
        <script>
            $(".cp-btn").click(function(e) {
                $(".open-success-modal").show();
            });
            $('.submit-btn').click(function() {
                if (!$(this).hasClass('disable')) {
                    setNewPassword()
                }

            });

            function setNewPassword() {
                var oldPswd = $('.oldPassword').val();
                var newPswd = $('.newPassword').val();
                var ConfPswd = $('.confPassword').val();
                if (oldPswd && newPswd && ConfPswd) {
                    $.ajax({
                        url: "{{ route('changePassword') }}",
                        type: 'ajax',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            oldpassword: oldPswd,
                            password: newPswd,
                            passwordConfirmation: ConfPswd
                        },
                        success: function(data) {
                            var message = data.message;
                            var status = data.status;
                            if (message == "Failed") {
                                DefaultPropelAlert(status);
                            }
                            else{
                                $('#ChangePassword').modal('show');
                                setInterval(() => {
                                    document.getElementById('logout-form').submit();
                                }, 2000);
                            }
                        },
                        error: function() {}
                    });

                } else {
                    alert('Some Password Filed Missing');
                }

            }
        </script>
        <style>
            .close-btn {
                background-color: rgb(239, 5, 5);
                box-shadow: 0 4px 9px -4px rgb(239, 5, 5);
                font-weight: 800;
                width: 25px;
                height: 25px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .close-btn:hover {
                box-shadow: 0 4px 9px -4px rgb(239, 5, 5);
            }

            .close-btn svg {
                transform: scale(2);
                fill: white
            }


            .modal-content {

                border-radius: 10px !important;
            }

            .modal-dialog {
                height: 100vh;
                display: flex;
                align-items: center;

            }

            .success-icon {
                display: inline-block;
                width: 8em;
                height: 8em;
                font-size: 20px;
                border-radius: 50%;
                border: 4px solid #96df8f;
                background-color: #fff;
                position: relative;
                overflow: hidden;
                transform-origin: center;
                -webkit-animation: showSuccess 180ms ease-in-out;
                animation: showSuccess 180ms ease-in-out;
                transform: scale(1);
            }

            .success-icon__tip,
            .success-icon__long {
                display: block;
                position: absolute;
                height: 4px;
                background-color: #96df8f;
                border-radius: 10px;
            }

            .success-icon__tip {
                width: 2.4em;
                top: 4.3em;
                left: 1.4em;
                transform: rotate(45deg);
                -webkit-animation: tipInPlace 300ms ease-in-out;
                animation: tipInPlace 300ms ease-in-out;
                -webkit-animation-fill-mode: forwards;
                animation-fill-mode: forwards;
                -webkit-animation-delay: 180ms;
                animation-delay: 180ms;
                visibility: hidden;
            }

            .success-icon__long {
                width: 4em;
                transform: rotate(-45deg);
                top: 3.7em;
                left: 2.75em;
                -webkit-animation: longInPlace 140ms ease-in-out;
                animation: longInPlace 140ms ease-in-out;
                -webkit-animation-fill-mode: forwards;
                animation-fill-mode: forwards;
                visibility: hidden;
                -webkit-animation-delay: 440ms;
                animation-delay: 440ms;
            }

            @-webkit-keyframes showSuccess {
                from {
                    transform: scale(0);
                }

                to {
                    transform: scale(1);
                }
            }

            @keyframes showSuccess {
                from {
                    transform: scale(0);
                }

                to {
                    transform: scale(1);
                }
            }

            @-webkit-keyframes tipInPlace {
                from {
                    width: 0em;
                    top: 0em;
                    left: -1.6em;
                }

                to {
                    width: 2.4em;
                    top: 4.3em;
                    left: 1.4em;
                    visibility: visible;
                }
            }

            @keyframes tipInPlace {
                from {
                    width: 0em;
                    top: 0em;
                    left: -1.6em;
                }

                to {
                    width: 2.4em;
                    top: 4.3em;
                    left: 1.4em;
                    visibility: visible;
                }
            }

            @-webkit-keyframes longInPlace {
                from {
                    width: 0em;
                    top: 5.1em;
                    left: 3.2em;
                }

                to {
                    width: 4em;
                    top: 3.7em;
                    left: 2.75em;
                    visibility: visible;
                }
            }

            @keyframes longInPlace {
                from {
                    width: 0em;
                    top: 5.1em;
                    left: 3.2em;
                }

                to {
                    width: 4em;
                    top: 3.7em;
                    left: 2.75em;
                    visibility: visible;
                }
            }
            .change-password-container{
                background-image: url("{{asset('assets/images/cp.jpg')}}");
                /* background-size:contain; */
                background-repeat: no-repeat;
                background-position:   left bottom;
            }

            /* #WizardForm{ */
            /* background:url("{{ asset('img/bgimage/addresource.webp') }}") ; */
            /* } */
        </style>
    @endsection
