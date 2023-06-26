@extends('layouts.auth.app')

@section('form')

<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        {{-- <p class=" text-white h2">MAGIC IS IN THE DETAILS</p> --}}

                        {{-- <p class="white mb-0">
                            No credentials are found, with your mobile number {{$mobile}}, Kindly provide email for cross verification
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

                        {{-- <h6 class="mb-4">Login</h6> --}}
                        <p class="black " style="font-style: italic; font-family:arial narrow;">
                            No credentials are found, with your mobile number {{$mobile}}, Kindly provide email for cross verification
                        </p>
                        <form action="{{url('checkUserEmail')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            <label class="form-group col-md-12  p-0 mb-4" style="position: relative;">
                                <input class="form-control AlterInput " type="email" placeholder="Enter Your Personal Email only" name="email" value="{{old('email')}}"  />
                                <input type="hidden" name="mobileNumber" value="{{$mobile}}">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Email Address</span>
                            </label>


                            <div class="d-flex justify-content-end">
                                <button class="propelbtn propelbtncurved propelsubmit" type="submit" id="emailValidate">Submit</button>
                            </div>
                        </form>
                        <br>
                        <p class="ExtraInfo">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Kindly provide your personal and permeant email only never enter any official email which may be invalid on time.
                          </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection