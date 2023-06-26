@extends('layouts.dashboard.app')
@section('content')


<div class="row">
  <div class="col-12">
    <h1>Create Organisation</h1>
    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">

    </nav>
    <div class="separator mb-5"></div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title" id="myModalLabel">Create an Organisation</h4>
        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
      </div>
      <div class="modal-body">
        <!-- <p>Create an Organisation</p> -->

        <h2><i class="fa fa-envelope"></i> No Organisation was Found on your Accout</h2>

        <p>Just follow us, In few steps you can add an Organisation</p>


          <div class="col-md-12 center-block">
            <a href="{{route('new_organisation')}}"><button style="text-align:center;" type="button" value="sub" name="sub" class="btn btn-danger ">Continue</button></a>
          </div>
      </div>
      <div class="modal-footer">
        <p>Note: * Organisation Administartors are the responsible person who actually operate and authority to pay for the organization.</p>
      </div>
    </div>
  </div>
</div>
<!-- THIS PARTICULAR SCRIPT WAS MOVED BY LOKESHWARI FOR THE PROCESS CONTENT IN THOSE PAGES -->
<script>
  $(document).ready(function() {
    var organisation_count = "<?php echo $organisation_count; ?>";
    if (organisation_count <= 0) {
      $('#myModal').modal('show');
    }else{
      window.location.href = "{{URL::to('new_organisation')}}"
    }

  });
</script>
@endsection



<!-- THIS PARTICULAR LINE WAS COMMENDED BY LOKESHWARI FOR THE PROCESS OF REMOVING CDN. -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- <script>
  $(document).ready(function() {
    var organisation_count = "<//?php echo $organisation_count; ?>";
    if (organisation_count <= 0) {
      $('#myModal').modal('show');
    }else{
      window.location.href = "{{URL::to('new_organisation')}}"
    }

  });
</script> -->