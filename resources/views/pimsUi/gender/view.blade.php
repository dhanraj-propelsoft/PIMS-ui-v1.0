@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 gender0 view0 for-active">
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
            <input type="text" name="gender" placeholder="Person gender..." class="form-control AlterInput "
                autocomplete="off" disabled value="{{ $modeldata['name'] }}">
            <span class="AlterInputLabel"> gender</span>
        </label>
        <div class=" mb-5  InputLabel">
            <textarea name="description" id=" description" cols="30" rows="5" class="col-12 form-control AlterInput "
                placeholder="Write Your Description" spellcheck="true" disabled>{{ $modeldata['description'] }}</textarea>
            <span class="AlterInputLabel">Description</span>
        </div>
        <div class="row justify-content-between mx-1">
            <span>
                Is Active
            </span>
            <span>
                {{ $modeldata['status'] }}
            </span>

        </div>
        <div class="row justify-content-between  mx-1  mt-3">
            <button class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button class="propelbtn propelbtncurved propelsubmit" onclick="viewPage(<?php echo $modeldata['id']; ?>)">Edit</button>
        </div>

    </div>
    <script>
        function viewPage(id) {
            var url = '{{ route('gender.edit', ':id') }}';
            url = url.replace(':id', id);
            window.location.href = url;
        }

        function cancelPage() {
            var url = '{{ route('gender.index') }}';
            window.location.href = url;
        }
    </script>
@endsection
