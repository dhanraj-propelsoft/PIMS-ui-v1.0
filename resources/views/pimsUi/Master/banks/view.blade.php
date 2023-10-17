@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 banks0 view0 for-active"><!-- | -->
        <!-- | -->
        <div class="view"> <!-- | -->
            <!-- | --> <span>view</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <div class="m-auto col-md-6 card p-2 rounded">
        <!-- Bank -->
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="bank" required placeholder="Bank..." value="{{ $modeldata['bankName'] }}"
                class="form-control AlterInput" autocomplete="off" disabled>
            <span class="AlterInputLabel">Bank</span>
        </label>

        <!-- IFSC Code -->
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="ifsc_code" required placeholder="IFSC Code..." value=""
                class="form-control AlterInput" autocomplete="off" disabled>
            <span class="AlterInputLabel">IFSC Code</span>
        </label>

        <!-- MICR Code -->
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="micr_code" required placeholder="MICR Code..." value=""
                class="form-control AlterInput" autocomplete="off" disabled>
            <span class="AlterInputLabel">MICR Code</span>
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
            <textarea name="description" disabled id="description" cols="30" rows="5"
                class="col-12 form-control AlterInput " placeholder="Write Your Description..." spellcheck="true">{{ $modeldata['description'] }}</textarea>
            <span class="AlterInputLabel">Description</span>
        </div>
        <div class="row justify-content-between  mx-1  mt-3">
            <button class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button class="propelbtn propelbtncurved propelsubmit" onclick="viewPage(<?php echo $modeldata['bankId']; ?>)">Edit</button>
        </div>

    </div>

    <script>
        function viewPage(id) {
            var url = "{{ route('bank.edit', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }

        function cancelPage() {
            var url = "{{ route('bank.index') }}";
            window.location.href = url;
        }
    </script>
@endsection
