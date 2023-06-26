@extends('layouts.auth.app')

@section('form')

<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        {{-- <p class=" text-white h2">Create Account</p>

                        <p class="white mb-0">
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
                                <span>Propel Soft</span>
                                <span>Acclereting Business Ahead</span>
                            </div>
                        </div>
                        <h6 class="mb-4">Create a Account</h6>
                        <form action="{{route('basic_details')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            <span class="text-danger">@error('error'){{ $message }}@enderror</span>
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <!-- <input class="form-control AlterInput" type="text" placeholder="Saluation" name="saluation" value="{{ old('saluation') }}" /> -->
                                <select name="salutation" class="form-control AlterInput" id="exampleFormControlSelect1" required>
                                    <option value="">Select</option>
                                    @foreach ($salutations as $key => $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['salutation'] }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('saluation'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Saluation</span>
                            </label>

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required/>
                                <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">First Name</span>
                            </label>
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="Middle Name" name="middle_name" value="{{ old('middle_name') }}" />
                                <span class="text-danger">@error('middle_name'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Middle Name</span>
                            </label>
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" />
                                <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Last Name</span>
                            </label>
                          
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="Nick Name" name="nick_name" value="{{ old('nick_name') }}" />
                                <span class="text-danger">@error('nick_name'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Nick Name</span>
                            </label>

                            <input type="hidden" name="mobile" value="{{$mobile}}">
                            <input type="hidden" name="email" value="{{$email}}">



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
