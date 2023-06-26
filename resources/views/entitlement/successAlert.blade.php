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
                        <h2 class="mb-4 text-capitalize d-inline-block"> Hi! <b>{{$name}}</b></h2>

                        <form action="{{route('userLogin')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            <fieldset class="fieldset-password">
                              <br>
                              <h4>Your Password has been changed successfully, Kindly Login again using last generated password</h4>



                            </fieldset>
<br>
                            <input type="hidden" name="mobile" value="{{$mobile}}">
                            <input type="hidden" name="personName" value="{{$name}}">


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


