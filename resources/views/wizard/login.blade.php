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
                            Don’t have a Login yet, just enter your mobile number and follow us. we ensure your Signup for a New Account in few steps
                        </p> --}}
                    </div>
                    <div class="form-side">
                        {{-- <a href="Dashboard.Default.html">
                            <span class="logo-single"></span>
                        </a> --}}
                        <div class="log-container col-md-12  ">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                            <div>
                                <span>  Propel Soft </span>
                                <span>Accleretinhead</span>
                            </div>
                        </div>
                   
                        <cite title="Hi !">Hi !</cite> <span style="font-weight:bold;"> {{$name}}</span> <span class="lead-sm text-muted">(  {{$mobile}}  )</span>
                        <br>
                        <br>
                        <form action="{{route('post_login')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            @error('success')
                            <span style="color:green;">{{ $message }}</span>
                            @enderror
                            <input type="hidden" name="username" value="{{$mobile}}">
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input type="password" name="password" placeholder="Enter Your Password" class="form-control AlterInput propel-key-press-input">
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Password</span>

                            </label>
                            <span class="text-danger">@error('err'){{ $message }}@enderror</span>
                            <div class="d-flex justify-content-end align-items-center">


                                <button class="propelbtn propelbtncurved propellogin propel-key-press" type="submit">LOGIN</button>
                            </div>

                        </form>


                        <div class="row icon-cards-row mb-4  mt-1 p-0">
                            <div class="col-12 p-0">
                                <a href="#1" class="propelbtn propelbtncurved propelsubmit propel-hover p-0">
                                    <!-- <div class="card-body text-center p-1 "> -->
                                        I’m not {{$name}}, I don’t have a
                                        password yet and wish to
                                        Signup for a New Account
                                       
                                    <!-- </div> -->
                                </a>
                            </div>
                        </div>
                        <p class="ExtraInfo">
                            Don’t have a login yet!<br> Just enter your mobile number and follow us. we ensure
                            your
                            Signup for a New Account in few steps.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- THIS PARTICULAR SCRIPT WAS MOVED BY LOKESHWARI FOR THE PROCESS CONTENT IN THOSE PAGES -->
<script>
    $(function() {
        $(".btn-shadow").attr('disabled', 'disabled');
    });
    $(document).ready(function() {

        $("#password").on("input", function() {
            var pass = $(this).val();
            if (pass.length > 0) {
                $(".btn-shadow").removeAttr('disabled');
            } else {
                $(".btn-shadow").attr('disabled', 'disabled');
                return false;
            }

        });

    });
</script>

@endsection
<!-- THIS PARTICULAR LINE WAS COMMENDED BY LOKESHWARI FOR THE PROCESS OF REMOVING CDN. -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- <script>
    $(function() {
        $(".btn-shadow").attr('disabled', 'disabled');
    });
    $(document).ready(function() {

        $("#password").on("input", function() {
            var pass = $(this).val();
            if (pass.length > 0) {
                $(".btn-shadow").removeAttr('disabled');
            } else {
                $(".btn-shadow").attr('disabled', 'disabled');
                return false;
            }

        });

    });
</script> -->