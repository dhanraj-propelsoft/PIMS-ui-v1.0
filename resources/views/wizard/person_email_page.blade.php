@extends('layouts.auth.app')

@section('form')

<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        <p class=" text-white h2">Email Address Not Found</p>

                        <p class="white mb-0">
                            Enter Your Email Address To conbtinue Further
                        </p>
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
                        <h6 class="mb-4">Registration</h6>
                        <form action="{{route('update_email')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="email" placeholder="Enter Your Personal Email only" name="email" value="{{ old('email') }}" />
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Email Address</span>
                            </label>
                            <input type="hidden" name="uid" value="{{$uid}}">


                            <div class="d-flex justify-content-end">

                                <button class="propelbtn propelbtncurved propelnext" type="submit">Next</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
