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
                        <form action="{{route('basic_details1')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            <span class="text-danger">@error('error'){{ $message }}@enderror</span>
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <select name="gender" class="form-control AlterInput" id="gender" required>
                                    <option value="">Select</option> abitha  IS uruttu
                                    @foreach ($gender as $key => $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['gender'] }}
                                    </option>   
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Gender</span>
                            </label>

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <select name="blood_group" class="form-control AlterInput" id="blood_group" required>
                                    <option value="">Select</option>
                                    @foreach ($blood as $key => $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['blood_group'] }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('blood_group'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Blood Group</span>
                            </label>
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="date" placeholder="DOB" name="dob" value="{{ old('dob') }}" required />
                                <span class="text-danger">@error('dob'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">DOB</span>
                            </label>


                          <input type="hidden" name="salutation_id" value="{{$salutation_id}}">
                          <input type="hidden" name="firstName" value="{{$firstName}}"> 
                          <input type="hidden" name="middleName" value="{{$middleName}}"> 
                          <input type="hidden" name="lastName" value="{{$lastName}}">
                           <input type="hidden" name="nickName" value="{{$nickName}}"> 
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
