@extends('layouts.dashboard.app')
@section('content')
<div class="user0 change-password0 for-active"></div>
<style>
    /* Text colors */

    .text-color-white {
        color: #FFFFFF;
    }

    .text-color-black {
        color: #000000;
    }

    .text-color-theme {
        color: #6f5499;
    }

    /* Background colors */
    .theme-bg {
        background: #6f5499;
    }

    .bg-black {
        background: #000000;
    }

    .secondary-bg {
        background: #f0ecf6;
    }


    /* Margin */

    .margin-bottom-0 {
        margin-bottom: 0 !important;
    }

    .margin-bottom-10 {
        margin-bottom: 10px !important;
    }

    .margin-bottom-15 {
        margin-bottom: 15px !important;
    }

    .margin-bottom-20 {
        margin-bottom: 20px !important;
    }

    .margin-bottom-30 {
        margin-bottom: 30px !important;
    }

    .margin-bottom-40 {
        margin-bottom: 40px !important;
    }

    .margin-bottom-50 {
        margin-bottom: 50px !important;
    }

    .margin-bottom-60 {
        margin-bottom: 60px !important;
    }

    .margin-bottom-70 {
        margin-bottom: 70px !important;
    }

    .margin-bottom-80 {
        margin-bottom: 80px !important;
    }

    .margin-bottom-90 {
        margin-bottom: 90px !important;
    }

    .margin-bottom-100 {
        margin-bottom: 100px !important;
    }

    .margin-bottom-120 {
        margin-bottom: 120px !important;
    }

    .margin-right-0 {
        margin-right: 0 !important;
    }

    .margin-right-5 {
        margin-right: 5px !important;
    }

    .margin-right-10 {
        margin-right: 10px !important;
    }

    /* Padding surround */

    .padding-0 {
        padding: 0px !important;
    }

    .padding-30 {
        padding: 30px !important;
    }

    .padding-50 {
        padding: 40px !important;
    }


    /* Buttons */



    .btn-outlined {
        border-radius: 0;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
    }

    .btn-outlined.btn-theme {
        background: none;
        color: #6f5499;
        border-color: #6f5499;
    }

    .btn-outlined.btn-theme:hover,
    .btn-outlined.btn-theme:active {
        color: #FFF;
        background: #6f5499;
        border-color: #6f5499;
    }

    .btn-lg {
        font-size: 18px;
        line-height: 22px;
        border: 4px solid;
        padding: 13px 40px;
    }

    .center {
        text-align: center;
    }

    .container {
        text-align: center;
    }
</style>

<div class="row">
    <div class="col-12">
        <h4>Change Password</h4>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">

        </nav>
        <div class="separator mb-5"></div>
        <!--ALERT-->
        @if (isset($success))
        <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
            <strong>Success!</strong> {{$success}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif (isset($err))
        <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
            <strong>Error!</strong> {{$err}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!--ALERT ENDS-->
    </div>
</div>

<div class="container">
    <br>
    <form action="{{route('set_password')}}" method="post" id="organisation_form" class="form-horizontal" role="form">
        @csrf
        <div class="row">
            <div class="col-md-12">

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" required>
                @if($errors->has('password'))
                <div class="alert alert-danger">{{$errors->first('password')}}</div>
                @endif
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="confirm_password" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn btn-outlined btn-theme btn-lg">Submit</button>
            </div>
        </div>

        <br>

    </form>
</div>

@endsection
