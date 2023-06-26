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
                        </p> --}}
                    </div>

                    <div class="form-side">
                        {{-- <a href="Dashboard.Default.html">
                            <span class="logo-single"></span>
                        </a> --}}
                        <style>
                            .log-container {
                                   height: 50px;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   margin-bottom: 40px;
                                   margin-top: -60px;
                               }

                               .log-container>img {
                                   height: inherit;

                                   margin-right: 10px;
                               }

                               .log-container>div {
                                   padding-top: 20px;
                               }

                               .log-container>div>p:first-child {
                                   font-family: bahnschrift light;
                                   font-size: 40px;
                                   color: rgb(127, 0, 255);

                               }

                               .log-container>div>p:last-child {
                                   font-family: arial narrow;
                                   color: rgb(127, 127, 127);
                                   margin-top: -5px;
                                   letter-spacing: 1px;
                               }

                               @media only screen and (max-width: 1000px) {
                                  .log-container{
                                   margin-top:-40px;

                                  }
                               }
                               @media only screen and (max-width: 575px) {
                                  .log-container{
                                   margin-top:-20px;

                                  }
                               }
                               @media only screen and (max-width: 360px) {

                                  .log-container>div > p:first-child{
                                   font-size: 20px;
                                  }
                                  .log-container>div > p:last-child{
                                   font-size: 10px;
                                  }
                               }
                       </style>
                       {{-- End --}}


                       <div class="log-container col-md-12  ">
                           <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                           <div>
                               <span>Propel Soft</sp>
                               <span>Acclereting Business Ahead</span>
                           </div>
                       </div>
                        <h6 class="mb-4">Create Account</h6>
                        <form action="{{route('create_person')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            <h5>No user information was found on our system and To continue further kindly signup for a new account by filling the following details.</h5>
                            <h5>Its our Immense Pleasure to have you as user</h5>
                            <input type="hidden" name="mobile" value="{{$mobile}}">
                            <input type="hidden" name="email" value="{{$email}}">
                             
                            <span class="text-danger">@error('error'){{ $message }}@enderror</span>
                            <div class="d-flex justify-content-between ">
                                <button class="propelbtn propelbtncurved propellogin propel-hover">Cancel</button>
                               <button class="propelbtn propelbtncurved propellogin propel-hover" type="submit">Sign Up</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
