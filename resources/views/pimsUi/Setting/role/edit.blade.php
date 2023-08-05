@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 addressType0 edit0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="edit">
            <!-- | -->
            <!-- | --> <span>edit</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('roles.store') }}" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        @if (session('failed'))
        <div class="alert alert-danger">
            {{ session('failed') }}
        </div>
    @endif
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="roles" required placeholder="Enter  Roles.." class="form-control AlterInput "
                value="{{ $modeldatas['roleName'] }}" autocomplete="off">
            <span class="AlterInputLabel">Roles</span>
        </label>
        <b>Permission</b>
        <br>

        <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">

            @foreach ($modeldatas['permission'] as $data)
                <input name="permission[]" class="manualcheck" value="{{ $data['id'] }}"
                    @foreach ($modeldatas['permissionId'] as $permission)
            {{ $data['id'] == $permission['permission_id'] ? 'checked' : '' }} @endforeach
                    type="checkbox">{{ $data['name'] }}
            @endforeach
            <input type="checkbox" class="checkedAll" name="admin" value="9"
                {{ isset($modeldatas['admin']) && $modeldatas['admin'] == 9 ? 'checked' : '' }}>Admin

            <input type="hidden" value="{{ $modeldatas['roleId'] }}" name="roleId">


            <div class="row justify-content-between  mx-1  mt-3">
                <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
                <button class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('roles.destroy', $modeldatas['roleId']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="propelbtn propelbtncurved propeldelete">Delete</button>
    </form>

    </div>


    <script>
        $(document).ready(function() {
            const checkbox = $('#switch');
            const statusInput = $('[name="active_status"]').eq(0);

            checkbox.on('change', function() {
                if (this.checked) {
                    statusInput.val(1);
                } else {
                    statusInput.val(0);
                }
            });
        });

        function cancelPage() {
            var url = "{{ route('roles.index') }}";
            window.location.href = url;
        }
        $(document).ready(function() {
            $('.checkedAll').on('click', function() {
                if ($(this).prop('checked')) {
                    $('.manualcheck').not(this).prop('disabled', true).prop('checked', false);
                } else {
                    $('.manualcheck').prop('disabled', false);
                }
            });
            $('.manualcheck').on('click', function() {
                if ($(this).prop('checked')) {
                    $('.checkedAll').not(this).prop('checked', false);
                }
              });
        });
    </script>
@endsection
