@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="pfm0 activeStatus0 view0 for-active"><!-- | -->
        <!-- | -->
        <div class="view"> <!-- | -->
            <!-- | --> <span>view</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <div class="m-auto col-md-6 card p-2 rounded">
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="activeType" placeholder="Enter Active Status..." class="form-control AlterInput "
                autocomplete="off" disabled value="{{ $modeldata['activeType'] }}">
            <span class="AlterInputLabel">Active Status</span>
        </label>

        <div class=" mb-5  InputLabel">
            <textarea name="description" disabled id="description" cols="30" rows="5"
                class="col-12 form-control AlterInput " placeholder="Write Your Description..." spellcheck="true">{{ $modeldata['description'] }}</textarea>
            <span class="AlterInputLabel">Description</span>
        </div>
        <div class="row justify-content-between  mx-1  mt-3">
            <button class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button class="propelbtn propelbtncurved propelsubmit" onclick="viewPage(<?php echo $modeldata['id']; ?>)">Edit</button>
        </div>

    </div>

    <script>
        function viewPage(id) {
            var url = "{{ route('activeStatus.edit', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }

        function cancelPage() {
            var url = "{{ route('activeStatus.index') }}";
            window.location.href = url;
        }
    </script>
@endsection
