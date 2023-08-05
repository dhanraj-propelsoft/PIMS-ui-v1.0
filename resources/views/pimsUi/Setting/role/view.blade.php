@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 role0 view0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="view">
            <!-- | -->
            <!-- | --> <span>view</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <div class="m-auto col-md-6 card p-2 rounded">
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="roles" disabled placeholder="Enter  Roles.." class="form-control AlterInput "
                value="{{ $modeldatas['roleName'] }}" autocomplete="off">
            <span class="AlterInputLabel">Roles</span>
        </label>


        <b>Permission</b>
        <br>

        <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">

          @foreach ($modeldatas['permission'] as $data)
          <input name="permission[]" disabled class="manualcheck" value="{{ $data['id'] }}"
          @foreach ($modeldatas['permissionId'] as $permission)
              {{ $data['id'] == $permission['permission_id'] ? 'checked' : '' }}
          @endforeach
          type="checkbox">{{ $data['name'] }}
      @endforeach



            <input type="checkbox" disabled class="checkedAll" name="admin" value="9"
                {{ isset($modeldatas['admin']) && $modeldatas['admin'] == 9 ? 'checked' : '' }}>Admin
        </div>


        <div class="row justify-content-between  mx-1  mt-3">
            <button class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button class="propelbtn propelbtncurved propelsubmit" onclick="viewPage(<?php echo $modeldatas['roleId']; ?>)">Edit</button>
        </div>

    </div>

    <script>
        function viewPage(id) {
            var url = "{{ route('roles.edit', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }

        function cancelPage() {
            var url = "{{ route('roles.index') }}";
            window.location.href = url;
        }
    </script>
@endsection
