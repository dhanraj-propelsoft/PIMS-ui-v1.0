@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 city0 add0 for-active"><!-- | -->
        <!-- | -->
        <div class="add"> <!-- | -->
            <!-- | --> <span>add</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('city.store') }}" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 InputLabel w-100">
            <select required class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory" name="state_id"
                data-minimum-results-for-search="Infinity" data-placeholder="Select State">
                <option selected value="" disabled>Select State</option>
                @foreach ($modeldatas as $data)
                    <option value="{{ $data['id'] }}">{{ $data['state'] }}</option>
                @endforeach
                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">State</span>
        </label>


        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="city" required placeholder="City..."
                class="form-control AlterInput  propel-key-press-input-mendatory" autocomplete="off">
            <span class="AlterInputLabel">City</span>
        </label>


        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" name="activeStatus"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Status">
                <option selected value="" disabled>Select Status</option>
                <option value="1">Active</option>
                <option value="0">In-Active</option>
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
            <button type="reset" class="propelbtn propelbtncurved propelcancel">Reset</button>

            <button class="propelbtn propelbtncurved propelsubmit" type="submit" value="saveAndClose" name="link">Save &
                Close</button>
            <button class="propelbtn propelbtncurved propelsubmit" type="submit" value="saveAndNew" name="link">Save &
                New</button>
        </div>

    </form>
    <script>
        function cancelPage() {
            var url = "{{ route('city.index') }}";
            window.location.href = url;
        }
    </script>
@endsection
