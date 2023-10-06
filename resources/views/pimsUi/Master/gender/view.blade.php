@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="person-master0 gender0 view0 for-active">
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
            <input type="text" name="gender" placeholder="Gender..." class="form-control AlterInput "
                autocomplete="off" disabled value="{{ $modeldata['gender'] }}">
            <span class="AlterInputLabel">Gender</span>
        </label>
        <div class=" mb-5  InputLabel">
            <textarea name="description" id=" description" cols="30" rows="5" class="col-12 form-control AlterInput "
                placeholder="Write Your Description" spellcheck="true" disabled>{{ $modeldata['description'] }}</textarea>
            <span class="AlterInputLabel">Description</span>
        </div>
        <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">
          <div class="">
            <p>Is Active</p>
          </div>
          <div class="">
            <input name="active_status" value="{{$modeldata['activeStatus']}}" class="custom-switch-input" id="switch" type="checkbox" disabled {{ $modeldata['activeStatus'] == 1 ? 'checked' : '' }}>
            <label class="custom-switch-btn float-right" for="switch"></label>
          </div>
        </div>
        <div class="row justify-content-between  mx-1  mt-3">
            <button class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button class="propelbtn propelbtncurved propelsubmit" onclick="viewPage(<?php echo $modeldata['id']; ?>)">Edit</button>
        </div>

    </div>
    <script>
        function viewPage(id) {
            var url = "{{ route('gender.edit', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }
        function cancelPage() {
            var url = "{{ route('gender.index') }}";
            window.location.href = url;
        }
    </script>
@endsection
