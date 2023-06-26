@extends('layouts.auth.app')

@section('form')

<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">


                        {{-- <p class="ExtrInfo">
                        You can change your password for security reasons or reset it if you forget it
                        </p> --}}
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
                        <h2 class="mb-4 text-capitalize d-inline-block"> Hi! <b>{{$personName}}</b></h2>

                        <form action="{{route('userCreation')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            <fieldset class="fieldset-password">
                              <br>
                                <label class="form-group col-md-12 p-0  InputLabel mb-4">

                                    <input class="form-control AlterInput propel-key-press-input-mendatory" id="pwd" type="password" placeholder="Enter New Password" name="password" value="{{ old('password') }}" />


                                    <span class="AlterInputLabel">Password</span>

                                </label>
                               <!-- END pwd_strength_wrap -->
                                <label class="input-group col-md-12 p-0  InputLabel mb-4">
                                    <input class="form-control AlterInput propel-key-press-input-mendatory" id="cpwd" type="password" validationAttr="check" checkId="pwd" placeholder="Retype Password for Confirmation" name="passwordConfirmation" value="{{ old('confirm_password') }}" />
                                    <span class="input-group-addon">
                                        <div class="fa-regular fa-eye pwd-view"></div>
                                    </span>
                                    <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                                    <span class="AlterInputLabel">Confirm Password</span>
                                </label>


                            </fieldset>
                            {{-- <div id="pwd_strength_wrap">
                                <div id="passwordDescription">Password not entered</div>
                                <div id="passwordStrength" class="strength0"></div>
                        </div> --}}
                            <input type="hidden" name="uid" value="{{$uid}}">


                            <div class="d-flex justify-content-end">

                                <button class="propelbtn propelbtncurved propelsubmit sign_up" type="submit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


