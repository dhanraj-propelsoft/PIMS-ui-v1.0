@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 country0 view0 for-active"><!-- | -->
        <!-- | -->
        <div class="view"> <!-- | -->
            <!-- | --> <span>view</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <div class="m-auto col-md-6 card p-2 rounded">
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="country" placeholder="Country..." class="form-control AlterInput " autocomplete="off"
                disabled value="{{ $modeldata['country'] }}">
            <span class="AlterInputLabel">Country</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" disabled name="activeStatus"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Status">
                <option selected value="" disabled>Select Status</option>
                @foreach ($modeldata['activeStatus'] as $data1)
                    <option value="{{ $data1['id'] }}" {{ $data1['id'] == $modeldata['activeStatusId'] ? 'selected' : '' }}>
                        {{ $data1['active_type'] }}</option>
                @endforeach
                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">Status</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="number" name="numericCode" disabled placeholder="Enter Numeric Code..."
                class="form-control AlterInput " autocomplete="off" value="{{ $modeldata['numericCode'] }}">
            <span class="AlterInputLabel">Numeric Code</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="number" name="phoneCode" disabled placeholder="Enter Phone Code..."
                class="form-control AlterInput " autocomplete="off" value="{{ $modeldata['phoneCode'] }}">
            <span class="AlterInputLabel">Phone Code</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="capital" disabled placeholder="Enter Capital..." class="form-control AlterInput "
                autocomplete="off" value="{{ $modeldata['capital'] }}">
            <span class="AlterInputLabel">Capital</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="flag" disabled placeholder="Enter Flag..." class="form-control AlterInput "
                autocomplete="off" value="{{ $modeldata['flag'] }}">
            <span class="AlterInputLabel">Flag</span>
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
            var url = "{{ route('country.edit', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }

        function cancelPage() {
            var url = "{{ route('country.index') }}";
            window.location.href = url;
        }
    </script>
@endsection
