@extends('layouts.auth.app')

@section('form')
<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-sm-8 col-md-10 mx-auto my-auto">
                <div class="card index-card">
                    <div class="card-body  form-side  pt-2">
                        <div class="row justify-content-between align-items-center logo-in-row p-1 mb-4">
                            <h6 class="h3">Create a New Account</h6>
                            <div class="log-container   ">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                                <div>
                                    <span>Propel Soft</span>
                                    <span>Acclereting Business Ahead</span>
                                </div>
                            </div>
                        </div>


                        <form action="{{route('storeTempPersonPhase1')}}" class="frm-single col-md-6 m-auto" method="post" autocomplete="off">
                            @csrf
                            <span class="text-danger">@error('error'){{ $message }}@enderror</span>
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <!-- <input class="form-control AlterInput" type="text" placeholder="Saluation" name="saluation" value="{{ old('saluation') }}" /> -->
                             <div class="form-row">
                                <div class="form-group col-md-4">
                                <select name="salutation" class="form-control AlterInput search-need" data-minimum-results-for-search="Infinity" id="exampleFormControlSelect1" data-placeholder="Salutation" >
                                    <option value="">Select</option>
                                    @foreach ($salutations as $key => $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['salutation'] }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('saluation'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Saluation</span>

                            </div>
                            <div class="form-group col-md-8">
                            <label class="form-group  p-0  InputLabel col-md-12">
                                <input class="form-control AlterInput  propel-key-press-input-mendatory" type="text" placeholder="First Name" name="firstName" value="{{ old('first_name') }}" required/>
                                <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">First Name<sup>*</sup> </span>
                            </label>
                        </div>
                        </div>

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="Middle Name" name="middleName" value="{{ old('middle_name') }}" />
                                <span class="text-danger">@error('middle_name'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Middle Name</span>
                            </label>
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="Last Name" name="lastName" value="{{ old('last_name') }}" />
                                <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Last Name</span>
                            </label>

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" placeholder="Nick Name or Alias" name="nickName" value="{{ old('nick_name') }}" />
                                <span class="text-danger">@error('nick_name'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Nick Name or Alias</span>
                            </label>



                            <input type="hidden" name="tempId" value="{{$tempId}}">



                            <div class="d-flex justify-content-end">

                                <button class="propelbtn propelbtncurved propellogin" type="submit">Next</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
