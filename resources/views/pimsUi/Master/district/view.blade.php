@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 district0 view0 for-active"><!-- | -->
        <!-- | -->
        <div class="view"> <!-- | -->
            <!-- | --> <span>view</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <div class="m-auto col-md-6 card p-2 rounded">
        <label class="form-group p-0 InputLabel w-100">
            <select disabled class="form-select w-100 AlterInput search-need" name="countryId"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Country">
                <option selected value="" disabled>Select Country</option>
                <option value="{{ $modeldata['countryId'] }}" selected>{{ $modeldata['countryName'] }}</option>
                <!-- Add more countrys here -->
            </select>
            <span class="AlterInputLabel box">Country</span>
        </label>
        <label class="form-group p-0 InputLabel w-100">
            <select disabled class="form-select w-100 AlterInput search-need" name="stateId"
                data-minimum-results-for-search="Infinity" data-placeholder="Select State">
                <option selected value="" disabled>Select State</option>
                <option value="{{ $modeldata['stateId'] }}" selected>{{ $modeldata['stateName'] }}</option>
                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">State</span>
        </label>
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="district" placeholder="Enter District..." class="form-control AlterInput "
                autocomplete="off" disabled value="{{ $modeldata['district'] }}">
            <span class="AlterInputLabel">District</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" disabled name="activeStatus"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Status">
                <option selected value="" disabled>Select Status</option>
                @foreach ($modeldata['activeStatus'] as $data)
                    <option value="{{ $data['id'] }}" {{ $data['id'] == $modeldata['activeStatusId'] ? 'selected' : '' }}>
                        {{ $data['active_type'] }}</option>
                @endforeach
                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">Status</span>
        </label>
        <div class=" mb-5  InputLabel">
            <textarea name="description" id="description" cols="30" rows="5" class="col-12 form-control AlterInput"
                disabled placeholder="Write Your Description..." spellcheck="true">{{ $modeldata['description'] }}</textarea>
            <span class="AlterInputLabel">Description</span>
        </div>
        <div class="row justify-content-between  mx-1  mt-3">
            <button class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button class="propelbtn propelbtncurved propelsubmit" onclick="viewPage(<?php echo $modeldata['districtId']; ?>)">Edit</button>
        </div>

    </div>

    <script>
        function viewPage(id) {
            var url = "{{ route('district.edit', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }

        function cancelPage() {
            var url = "{{ route('district.index') }}";
            window.location.href = url;
        }
    </script>
@endsection
