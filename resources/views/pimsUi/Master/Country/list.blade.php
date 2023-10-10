@extends('layouts.dashboard.app')
@section('content')

<div class="common-master0 country0 for-active"></div>

<!--Table-->
<div class="container col-md-10 m-4 mx-auto">
  <div class="row ">


    <table class="table shadow mt-4">
      <thead>
        <tr>
          <th>Country</th>
          <th>Active Status</th>
          <th>Numeric Code</th>
          <th>Phone Code</th>
          <th>Capital</th>
          <th>Flag</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        @foreach($modeldatas as $modeldata)
        <tr ondblclick="viewPage(<?php echo $modeldata['id']; ?>)">
          <td>{{$modeldata['country']}}</td>
          <td>{{$modeldata['currentStatusName']}}</td>
          <td>{{$modeldata['numericCode']}}</td>
          <td>{{$modeldata['phoneCode']}}</td>
          <td>{{$modeldata['capital']}}</td>
          <td>{{$modeldata['flag']}}</td>
          <td>{{$modeldata['description']}}</td>
        </tr>
        @endforeach
      </tbody>

    </table>

    <br><br>

  </div>
</div>
<!--End Table-->

<script>
  document.querySelector(".propel-breadcrumb-extra-content").innerHTML =
    `<a href="{{route('country.create')}}"><button class='propelbtn propelbtn-sm propelbtn-sm propelbtncurved propeladd propel-hover'>Add</button></a>`;

function viewPage(id){
  var url = '{{ route("country.show", ":id") }}';
      url = url.replace(':id', id);
  window.location.href = url;
}
</script>
@endsection