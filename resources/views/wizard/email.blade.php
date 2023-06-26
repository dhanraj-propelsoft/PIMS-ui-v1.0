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

                        <h6 class="mb-4">Login</h6>
                        <p class="black " style="font-style: italic; font-family:arial narrow;">
                            No credentials are found, with your mobile number {{$mobile}}, Kindly provide email for cross verification
                        </p>
                        <form action="{{url('person_check_email')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            <label class="form-group col-md-12  p-0 mb-4" style="position: relative;">
                                <input class="form-control AlterInput " type="email" placeholder="Enter Your Personal Email only" name="email" value="{{old('email')}} " onkeyup="ValidateEmail(this)" />
                                <input type="hidden" name="mobile" value="{{$mobile}}">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Email Address</span>
                            </label>


                            <div class="d-flex justify-content-end">
                                <button class="propelbtn propelbtncurved propelsubmit" type="submit" id="emailValidate">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.getElementById("emailValidate").disabled = true;

    function ValidateEmail(mail) {

        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail.value)) {
            document.getElementById("emailValidate").disabled = false;
        } else {
            document.getElementById("emailValidate").disabled = true;
        }
    }
</script>
@endsection