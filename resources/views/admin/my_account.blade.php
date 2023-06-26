@extends('layouts.dashboard.app')
@section('content')
<div class="user0 account0 for-active"></div>
<style>
  .table {
    border-radius: 12px;
  }

  .table thead tr {
    background-color: #ff6582;
    border: 2px solid #ddd;
  }

  .table thead tr th {
    border: 2px solid #ddd;
  }


  .table {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
  }

  .table tr td {
    border: 2px solid #ddd;
  }



  .e_btn {
    font-size: 1em;
    line-height: 1em;
    letter-spacing: 0.04em;
    display: inline-block;
  }

  .brd_btn--svg__circle {
    width: 100%;
  }

  .brd_btn--svg__border {
    /* width: 230px; */
    width: 100%;
  }

  .brd_btn--svg {
    position: relative;
    /* height: 52px;
    width: 230px; */
    height: 100%;
    width: 100%;
    overflow: hidden;
    /*  border-radius: 21px;
 border:2px solid red;*/
  }

  .brd_btn--svg:hover {

    border: inherit;
  }

  .brd_btn--svg:hover .brd_btn--svg__circle circle {
    -webkit-transform: scale(0);
    transform: scale(0);
    border: inherit;
  }

  .brd_btn--svg:hover .brd_btn--svg__label {
    color: #00f;
  }

  .brd_btn--svg:hover .brd_btn--svg__border--left path,
  .brd_btn--svg:hover .brd_btn--svg__border--right path {
    stroke-dasharray: 61.8204345703125 61.8204345703125;
    stroke-dashoffset: 0;
    -webkit-transition-delay: 0.25s;
    -webkit-transition-duration: 0.5s;
    -webkit-transition-timing-function: ease-in-out;
    -webkit-transition-property: stroke-dashoffset;
    -moz-transition-delay: 0.25s;
    -moz-transition-duration: 0.5s;
    -moz-transition-timing-function: ease-in-out;
    -moz-transition-property: stroke-dashoffset;
    -ms-transition-delay: 0.25s;
    -ms-transition-duration: 0.5s;
    -ms-transition-timing-function: ease-in-out;
    -ms-transition-property: stroke-dashoffset;
    transition-delay: 0.25s;
    transition-duration: 0.5s;
    transition-timing-function: ease-in-out;
    transition-property: stroke-dashoffset;
  }

  .brd_btn--svg__label {
    -webkit-font-smoothing: antialiased;
    font-family: sans-serif;
    font-weight: bold;
    text-align: center;
    color: black;
    z-index: 3;
    width: 100%;
    -webkit-transition: color 0.5s ease-in-out;
    transition: color 0.5s ease-in-out;
  }

  .brd_btn--svg__circle circle {
    -webkit-transition: transform 0.5s ease-in-out;
    -webkit-transform: scale(1.1);
    -webkit-transform-origin: 50% 50%;
    -moz-transition: transform 0.5s ease-in-out;
    -moz-transform: scale(1.1);
    -moz-transform-origin: 50% 50%;
    -ms-transition: transform 0.5s ease-in-out;
    -ms-transform: scale(1.1);
    -ms-transform-origin: 50% 50%;
    -webkit-transition: -webkit-transform 0.5s ease-in-out;
    transition: -webkit-transform 0.5s ease-in-out;
    transition: transform 0.5s ease-in-out;
    transition: transform 0.5s ease-in-out, -webkit-transform 0.5s ease-in-out;
    transform: scale(1.1);
    transform-origin: 50% 50%;
  }

  .brd_btn--svg__border--left path,
  .brd_btn--svg__border--right path {
    stroke-dasharray: 61.8204345703125 61.8204345703125;
    -webkit-transition-duration: 0s;
    -webkit-transition-timing-function: ease-in-out;
    -webkit-transition-property: stroke-dashoffset;
    -webkit-transition-delay: 0.5s;
    -moz-transition-duration: 0s;
    -moz-transition-timing-function: ease-in-out;
    -moz-transition-property: stroke-dashoffset;
    -moz-transition-delay: 0.5s;
    -ms-transition-duration: 0s;
    -ms-transition-timing-function: ease-in-out;
    -ms-transition-property: stroke-dashoffset;
    -ms-transition-delay: 0.5s;
    transition-duration: 0s;
    transition-timing-function: ease-in-out;
    transition-property: stroke-dashoffset;
    transition-delay: 0.5s;
  }

  .brd_btn--svg__border--left path {
    stroke-dashoffset: -61.8204345703125;
  }

  .brd_btn--svg__border--right path {
    stroke-dashoffset: 61.8204345703125;
  }

  .brd_btn--svg svg,
  .brd_btn--svg__label {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -webkit-transform-origin: 50% 50%;
    -moz-transform: translate(-50%, -50%);
    -moz-transform-origin: 50% 50%;
    -ms-transform: translate(-50%, -50%);
    -ms-transform-origin: 50% 50%;
    transform: translate(-50%, -50%);
    transform-origin: 50% 50%;
  }

  .c-white {
    color: white;
  }
</style>

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
    <h2 style="margin:0 auto;">Select an Account to manage settings</h2>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Account</th>
          <th>Type</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($organisation))
        @foreach ($organisation as $org)
        <tr>
          <td><a href="{{route('list')}}">

            </a>{{$org['details']['organisation_name']}}</td>
          <td><a href="{{route('list')}}">Organisation<a></td>
          <td><a href="{{route('list')}}">
              @if ($org['authorization']==1)
              Admin
              @else if($org['authorization']==2)
              Owner
              @endif
            </a></td>
        </tr>
        @endforeach
        @endif


      </tbody>
      <tfoot>
    </table>
    <br><br>

  </div>
</div>
<!--End Table-->



@endsection




