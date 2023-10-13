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


    <form action="{{ route('users.store') }}" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" name="roleId" data-minimum-results-for-search="Infinity"
                data-placeholder="Select Role">
                <option selected value="" disabled>Select Role</option>
                @foreach ($result as $data)
                    <option value="{{ $data['id'] }}" {{ $modeldatas['roleId'] == $data['id'] ? 'selected' : '' }}>
                        {{ $data['name'] }}</option>
                @endforeach

            </select>
            <span class="AlterInputLabel box">Roles</span>
        </label>
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="userName" value="{{ $modeldatas['name'] }}" required placeholder="User Name..."
                class="form-control AlterInput " autocomplete="off">
            <span class="AlterInputLabel">User Name</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="email" name="email" value="{{ $modeldatas['email'] }}" placeholder="User Email..."
                class="form-control AlterInput " autocomplete="off">
            <span class="AlterInputLabel">Enter Email</span>
        </label>
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="number" name="mobile" value="{{ $modeldatas['mobile'] }}" placeholder="User Mobile..."
                class="form-control AlterInput " autocomplete="off">
            <span class="AlterInputLabel">Enter Mobile</span>
        </label>
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="password" name="password" required placeholder="User password..." class="form-control AlterInput "
                autocomplete="off">
            <span class="AlterInputLabel">Enter password</span>
        </label>
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="password" name="conformPassword" required placeholder="Conform Password..."
                class="form-control AlterInput " autocomplete="off">
            <span class="AlterInputLabel">Conform Password</span>
        </label>
        <input type="hidden" value="{{ $modeldatas['id'] }}" name="userId">


        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('users.destroy', $modeldatas['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="propelbtn propelbtncurved propeldelete propelDelPopup">Delete</button>
    </form>

    </div>


    <script>
        function cancelPage() {
            var url = "{{ route('users.index') }}";
            window.location.href = url;
        }
    </script>
@endsection
