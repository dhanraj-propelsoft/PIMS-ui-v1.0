@extends('layouts.auth.app')

@section('form')
{{-- This is For Navigation and Breadcrumbs --}}

                                                 <!-- | -->
  
   {{-- ------------------------------------------------------------------------------------------------------------------- --}}
   <style>
    .customer-logo{
       padding: 12px 20px;
        border-radius: 50%;
        background: linear-gradient(60deg,rgb(205, 43, 237),rgb(149, 0, 255));
       height: 50px;
       width: 50px;
    }


   </style>
   <form action="{{route('personValidate')}}" id="choiceForm" class="col-sm-6 card m-auto p-5" method="post">
    {{csrf_field()}}
   <div >
    <p>
        This Mobile Number  and email  has thes recordon our system By selecting one of them you ensure its your record.
    </p>
    <hr>
   @foreach ($personDatas as $person)
      <div class="RadioGroup">
        <input id="radio{{$loop->iteration}}" class="choice" value="{{$person['personUid']}},{{$person['mobileId']}},{{$person['emailId']}}" name="personDetails" type="radio"/>
        <label for="radio{{$loop->iteration}}"> 
          <div class="customer-logo">
            <span ><p>{{Str::upper( mb_substr($person['personName'], 0, 1))}}</p></span>
        </div>
        <div>
          <p>{{$person['personName']}}</p>
          <p>{{substr($person['mobileId'], 0, 4) . "****" . substr($person['mobileId'], 7, 4)}}</p>
          <p>{{substr($person['emailId'], 0, 4) . "****" . substr($person['emailId'], 7, 9)}}</p>
        </div>
        </label>
      </div>
      <hr>
@endforeach



{{-- <a href="{{route('loginMobilePage')}}">None Of The Above Record is Mine Create a New Account For Me</a> --}}
      <style>
        
        .RadioGroup{
          background-color: #fff;
  display: block;
  margin: 10px 0;
  position: relative;
        }
        .RadioGroup label {
  padding: 12px 30px;
  width: 100%;
  display: flex;  
  align-items: center;
 gap: 20px;
  text-align: left;
  color: #3C454C;
  cursor: pointer;
  position: relative;
  z-index: 2;
  transition: color 200ms ease-in;
  overflow: hidden;
}
.RadioGroup label:before {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  content: "";
  background-color: #5562eb;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%) scale3d(1, 1, 1);
  transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
  opacity: 0;
  z-index: -1;
}
.RadioGroup label:after {
  width: 32px;
  height: 32px;
  content: "";
  border: 2px solid #D1D7DC;
  background-color: #fff;
  background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
  background-repeat: no-repeat;
  background-position: 2px 3px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  right: 30px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  transition: all 200ms ease-in;
}
.RadioGroup input:checked ~ label {
  color: #fff;
}
.RadioGroup input:checked ~ label:before {
  transform: translate(-50%, -50%) scale3d(56, 56, 1);
  opacity: 1;
}
.RadioGroup input:checked ~ label:after {
  background-color: #54E0C7;
  border-color: #54E0C7;
}
.RadioGroup input {
  width: 32px;
  height: 32px;
  order: 1;
  z-index: 2;
  position: absolute;
  right: 30px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  visibility: hidden;
}

      </style>
        {{-- <div class="customer-logo">
            <label >N</label>
        </div>
        <div class="customer-info">
          <div>
            <p>Nova Faulraj Felix</p>
            <p>9494949494</p>
            <p>Example@gmail.com</p>
          </div>
        </div>
        <div class="radio">
            <input type="radio" name="userConfirmation" id="">
        </div> --}}
  
    <hr>
  
    <div class="col-12 d-flex justify-content-center mt-5">
        <button type="button" class="propelbtn propelcurved propelsubmit Continue">Continue</button>
      </div>
   </div>
</form>
<form action="" method="post">
  <input type="hidden" name="mobileNumber" value="{{$mobileNumber}}">
<input type="hidden" name="email" value="{{$email}}">
<button type="submit">None Of The Above Record is Mine Create a New Account For Me</button>   

</form>

<script>
  $(document).ready(function () {
    $(".Continue").click(function(){
     var choose=$('.choice').attr("type");
 if(choose=="radio"){
  $('#choiceForm').submit();
 }
 else {
  
 }

    });
  
 
  });
</script>
@endsection