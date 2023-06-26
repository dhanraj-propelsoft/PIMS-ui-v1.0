@extends('layouts.dashboard.app')
@section('content')
{{-- <link rel="stylesheet" href="css/vendor/smart_wizard.min.css" /> --}}
{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 resource0 rejoin0 for-active"><!-- | -->
 <!-- | -->     <div class="rejoin">                                    <!-- | -->
 <!-- | -->      <span>View</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->
  
   {{-- ------------------------------------------------------------------------------------------------------------------- --}}
   <div class="card m-1 p-2 fit-workspace">
    <div class="row h-100 ">
      <div class="col-md h-100 resource-table-container">
        <div class="table-head">
        <div class="table-head-item">Resource</div>
        <div class="table-head-item">Status</div>
      </div>
      <div class="table-body-container resource-table">
        <div class="table-body" id="bodyItem1">
            <div class="body-item">Nothing</div>
            <div class="body-item">Nothing</div>
        </div>
        <div class="table-body" id="bodyItem2">
          <div class="body-item">Nothing</div>
          <div class="body-item">Nothing</div>
      </div>
      <div class="table-body" id="bodyItem3">
        <div class="body-item">Nothing</div>
        <div class="body-item">Nothing</div>
    </div>
    <div class="table-body" id="bodyItem4">
      <div class="body-item">Nothing</div>
      <div class="body-item">Nothing</div>
  </div>
  <div class="table-body" id="bodyItem5">
    <div class="body-item">Nothing</div>
    <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem6">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>

<div class="table-body" id="bodyItem7">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem8">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem9">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem10">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem11">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem12">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem13">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem14">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem15">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem16">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem17">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem18">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem19">
  <div class="body-item">Nothing</div>
  <div class="body-item">Nothing</div>
</div>
<div class="table-body" id="bodyItem20">
  <div class="body-item">Final</div>
  <div class="body-item">Final</div>
</div>

      </div>
      </div>
      <div class="col-md h-100 overflow-auto">
        <div class="w-100 img-container">
          <img src="{{asset('assets/images/userlogo.jpg')}}" alt="..." class="img-thumbnail m-auto">
          
        </div>
      <figcaption class="figure-caption text-center">Resource Org Code</figcaption>
        <p >
          <label ><i class="simple-icon-user"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Selvaraj</label>
        </p>
        <p >
          <label ><i class="simple-icon-layers"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Designation</label>
        </p>
        <p >
          <label ><i class="simple-icon-basket-loaded"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Department</label>
        </p>
        <p >
          <label ><i class="simple-icon-folder"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Resource Type</label>
        </p>
        {{-- <p >
          <label ><i class="simple-icon-calendar"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >DOJ : <span>12:23:2002</span></label>
        </p> --}}
        <p >
          <label ><i class="simple-icon-phone"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >90909090990</label>
        </p>
        <p >
          <label ><i class="simple-icon-folder-alt"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Selvaraj@gmail.com</label>
        </p>
        <p >
          <label ><i class="simple-icon-calendar"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >12 janaury 2002</label>
        </p>
        <p >
          <label ><i class="simple-icon-diamond"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >A <sup>+ve</sup></label>
        </p>
        <p >
          <label ><i class="simple-icon-user-female"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Male</label>
        </p>
        {{-- <p >
          <label ><i class=""></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Tamil,English</label>
        </p>
        <p >
          <label ><i class=""></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Married</label>
        </p>
        <p >
          <label ><i class=""></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Nominee : <span>Tamil</span></label>
        </p> --}}
        <p >
          <label ><i class="simple-icon-location-pin"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >address</label>
        </p>
      </div>
      <div class="col-md h-100 overflow-auto">
        <h2 class="text-center">Profession & Education</h2>
        
        <p><label ><i class="simple-icon-briefcase"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Founder & CEO at Propelsoft
        </label></p>
        <p><label ><i class="simple-icon-graduation"></i></label>&nbsp;&nbsp;&nbsp;&nbsp;<label >Studied Piping at IIT Bombay
        </label></p>
      </div>
    </div>
  </div>
  <style>
   .table-head , .table-body{
    display: flex;
    width: 100%;
    justify-content: space-around;
    padding: 5px;
    
   }
   .table-head{
    font-weight: 800;
    background-color: rgb(172, 134, 243);
    color: white;
    /* border-top-left-radius: 5px;
    border-top-right-radius: 5px; */
   }
   .table-body-container{
    height:94%;
    overflow-y: scroll; 
   }
   .table-body{
    border-bottom: 1px solid #dddddd;
    border-left: 1px solid #dddddd;
    border-right: 1px solid #dddddd;
    transition: 0.5s;
   }

   .table-body:hover{
    background-color: #dddddd
   }
   .resource-table-container{
    border-radius: 5px;
   overflow: hidden;
   margin: 0 10px !important;
    padding: 0;
 
   }
   .active-table-body{
    background:var(--propel) ;
    color:white;
    box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px inset;
   }
   .active-table-body:hover{
    background:var(--propel) ;
    color:white;
   }
   .img-container{
    display: flex;
    justify-content: center;
   }
   .img-container img{
    height: 200px;
    width: 200px;
    object-position: center;
    border-radius: 5px;
   }
  </style>
  <input type="hidden" id="scrollValue" value="<?php echo $_GET['a']; ?>">
<script>
   var scrollValue=$("#scrollValue").val();
   
   $("#bodyItem"+scrollValue).addClass("active-table-body");`
  $(".table-body").click(function(){
    $(".active-table-body").removeClass('active-table-body');
    $(this).addClass('active-table-body');
    scrollValue=$(this).attr('id');
  }); 
  document.getElementById(scrollValue).scrollIntoView();
  // document.getElementById(scrollValue).css("background","red");
  // document.getElementById(scrollValue).addClas("active-table-body");
</script>
  
 @endsection