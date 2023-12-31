@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 country0 add0 for-active"><!-- | -->
        <!-- | -->
        <div class="add"> <!-- | -->
            <!-- | --> <span>add</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('country.store') }}" data-dupl-val='true' method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="country" required placeholder="Country..."
                class="form-control AlterInput  propel-key-press-input-mendatory" autocomplete="off">
            <span class="AlterInputLabel">Country</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" name="activeStatus"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Status">
                <option selected value="" disabled>Select Status</option>
                @foreach ($statusData as $data)
                    @if($data['id'] == "1")
                        <option value="{{ $data['id'] }}" selected>{{ $data['activeType'] }}</option>
                    @else 
                        <option value="{{ $data['id'] }}" >{{ $data['activeType'] }}</option>
                    @endif
                @endforeach
                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">Status</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="number" name="numericCode" placeholder="Enter Numeric Code..."
                class="form-control AlterInput" autocomplete="off">
            <span class="AlterInputLabel">Numeric Code</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="number" name="phoneCode" placeholder="Enter Phone Code..."
                class="form-control AlterInput" autocomplete="off">
            <span class="AlterInputLabel">Phone Code</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="capital" placeholder="Enter Capital..." class="form-control AlterInput textValidation"
                autocomplete="off">
            <span class="AlterInputLabel">Capital</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="flag" placeholder="Enter Flag..." class="form-control AlterInput "
                autocomplete="off">
            <span class="AlterInputLabel">Flag</span>
        </label>

        <div class=" mb-5  InputLabel">
            <textarea name="description" id="description" cols="30" rows="5" class="col-12 form-control AlterInput "
                placeholder="Write Your Description..." spellcheck="true"></textarea>
            <span class="AlterInputLabel">Description</span>
        </div>

        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Cancel</button>
            <button type="reset" class="propelbtn propelbtncurved propelcancel ddReset">Reset</button>

            <button class="propelbtn propelbtncurved propelsubmit" type="submit" value="saveAndClose" name="link">Save &
                Close</button>
            <button class="propelbtn propelbtncurved propelsubmit" type="submit" value="saveAndNew" name="link">Save &
                New</button>
        </div>

    </form>
    <script>
        function cancelPage() {
            var url = "{{ route('country.index') }}";
            window.location.href = url;
        }
        $('.textValidation').on('keydown', function(e) {
            if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) {
                e.preventDefault();
                return false;
            }
        });
        var valRouteUrl = "{{ route('countryValidation') }}";
    </script>
@endsection
