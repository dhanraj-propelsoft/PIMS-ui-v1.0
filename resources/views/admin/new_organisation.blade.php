@extends('layouts.dashboard.app')
@section('content')


<div class="row">
    <div class="col-12">
        <h1>Organisation</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">

        </nav>
        <div class="separator mb-5"></div>
    </div>
</div>

<!--Table-->
<div class="container">
    <div class="row">
        <h2 style="margin:0 auto;">Create an Organisation</h2>

        <div class="container">
            <div id="loginbox" class="mainbox col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">


                    </div>

                    <div style="padding-top:30px" class="panel-body">

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form action="{{ route('organisation_details') }}" id="organisation_form" class="form-horizontal" role="form" method="post">
                            @csrf
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="name" type="text" class="form-control" name="organisation_name" value="" placeholder="Organisation Name *" required>
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="email" type="email" class="form-control" name="organisation_email" placeholder="Organisation Email *" required>
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <button type="submit" style="margin:auto;display:block;" id="btn-login" class="btn btn-success">Continue </buttonx>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="padding-top:15px; font-size:120%">
                                        Note: * Organisation Administartors are the responsible person who actually operate and authority to pay for the organization.

                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



@endsection