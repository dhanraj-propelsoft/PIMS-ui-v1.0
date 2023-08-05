@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

<!-- | -->
<div class="common-master0 user0 add0 for-active"><!-- | -->
  <!-- | -->
  <div class="add"> <!-- | -->
    <!-- | --> <span>add</span> <!-- | -->
    <!-- | -->
  </div> <!-- | -->
  <!-- | -->
</div> <!-- | -->


<form action="{{route('users.store')}}" method="post" class="m-auto col-md-6 card p-2 rounded">
  @csrf
  <label class="form-group p-0 InputLabel w-100">
    <select disabled class="form-select w-100 AlterInput search-need" name="roleId" data-minimum-results-for-search="Infinity"
        data-placeholder="Select Role">
        <option selected value="" disabled>Select Role</option>
        @foreach($result as $data)
        <option value="{{$data['id']}}" {{ ($modeldatas['roleId'] == $data['id']) ? 'selected' : '' }}>{{$data['name']}}</option>
        @endforeach

    </select>
    <span class="AlterInputLabel box">Roles</span>
</label>

  <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="text" name="userName" disabled value="{{$modeldatas['name']}}" required  placeholder="User Name..." class="form-control AlterInput " autocomplete="off">
    <span class="AlterInputLabel">User Name</span>
  </label>

  <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="email" name="email" disabled value="{{$modeldatas['email']}}"  placeholder="User Email..." class="form-control AlterInput " autocomplete="off">
    <span class="AlterInputLabel">Enter Email</span>
  </label>
  <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="number" name="mobile" disabled  value="{{$modeldatas['mobile']}}" placeholder="User Mobile..." class="form-control AlterInput " autocomplete="off">
    <span class="AlterInputLabel">Enter Mobile</span>
  </label>

  <div class="row justify-content-between  mx-1  mt-3">
    <button class="propelbtn propelbtncurved propelcancel" type="button" onclick="cancelPage()">Close</button>
    <button class="propelbtn propelbtncurved propelsubmit" type="button" onclick="viewPage(<?php echo $modeldatas['id'];  ?>)">Edit</button>
</div>

</form>
<script>
 function viewPage(id) {
            var url = "{{ route('users.edit', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }

        function cancelPage() {
            var url = "{{ route('users.index') }}";
            window.location.href = url;
        }
</script>

@endsection