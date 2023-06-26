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
                    
                        
                        <form action="{{route('storeTempPersonPhase2')}}" class="frm-single col-md-6 m-auto" method="post" autocomplete="off">
                            @csrf
                            <span class="text-danger">@error('error'){{ $message }}@enderror</span>
                            <label class="form-group col-md-12 p-0 InputLabel mb-4">
                                <select name="gender" class="form-control AlterInput search-need" data-minimum-results-for-search="Infinity"  id="gender" data-placeholder="Gender">
                                    <option value="">Select</option>
                                    @foreach ($gender as $key => $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['gender'] }}
                                    </option>   
                                    @endforeach
                                </select>
                            
                                <span class="AlterInputLabel">Gender</span>
                            </label>

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <select name="bloodGroup" class="form-control AlterInput search-need" data-minimum-results-for-search="Infinity" id="blood_group"  data-placeholder="Blood Group"  >
                                    <option value="">Select</option>
                                    @foreach ($bloodGroup as $key => $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['blood_group'] }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('blood_group'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">Blood Group</span>
                            </label>
                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                
                                <input type="text"  placeholder="DOB" name="dob" value="{{ old('dob') }}" class="form-control  AlterInput w-100 datepicker ">
                                <span class="text-danger">@error('dob'){{ $message }}@enderror</span>
                                <span class="AlterInputLabel">DOB</span>
                            </label>
                          <input type="hidden" name="tempId" value="{{$tempId}}">
                            <div class="d-flex justify-content-end">
                                <button class="propelbtn propelbtncurved propellogin propel-hover" type="submit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
