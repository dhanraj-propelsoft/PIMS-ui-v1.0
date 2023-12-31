@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 banks0 add0 for-active"><!-- | -->
        <!-- | -->
        <div class="add"> <!-- | -->
            <!-- | --> <span>add</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('bank.store') }}" data-dupl-val='true' method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <!-- Bank -->
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="bank" required placeholder="Bank..."
                class="form-control AlterInput propel-key-press-input-mendatory" autocomplete="off">
            <span class="AlterInputLabel">Bank</span>
        </label>

        <!-- IFSC Code -->
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="ifsc" required placeholder="IFSC Code..."
                class="form-control AlterInput propel-key-press-input-mendatory" autocomplete="off">
            <span class="AlterInputLabel">IFSC Code</span>
        </label>

        <!-- MICR Code -->
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="micr" required placeholder="MICR Code..."
                class="form-control AlterInput propel-key-press-input-mendatory" autocomplete="off">
            <span class="AlterInputLabel">MICR Code</span>
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
            var url = "{{ route('bank.index') }}";
            window.location.href = url;
        }
                
        var valRouteUrl = "{{ route('bankValidation') }}";
    </script>
@endsection
