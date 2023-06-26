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

<h2>Sorry for the inconvenience caused, we need a unique mobile number and email owned by you to signup into system.
</h2>








                            <div class="d-flex justify-content-end">
                              <a href="{{route('loginMobilePage')}}" class="propelbtn propelbtncurved propellogin propel-hover" type="submit">continue</a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
