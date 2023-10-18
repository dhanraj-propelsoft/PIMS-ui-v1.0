@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 country0 edit0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="edit">
            <!-- | -->
            <!-- | --> <span>edit</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('country.store') }}" data-dupl-val='true' data-edit-form="true" method="post" class="m-auto col-md-6 card p-2 rounded">
        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
        @csrf
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="country" required placeholder="Country..."
                class="form-control AlterInput  propel-key-press-input-mendatory" autocomplete="off"
                value="{{ $modeldata['country'] }}">
            <span class="AlterInputLabel">Country</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" name="activeStatus"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Status">
                <option selected value="" disabled>Select Status</option>
                @foreach ($modeldata['activeStatus'] as $data)
                    <option value="{{ $data['id'] }}"
                        {{ $data['id'] == $modeldata['activeStatusId'] ? 'selected' : '' }}>
                        {{ $data['active_type'] }}</option>
                @endforeach
                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">Status</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="number" name="numericCode" placeholder="Enter Numeric Code..."
                class="form-control AlterInput" autocomplete="off" value="{{ $modeldata['numericCode'] }}">
            <span class="AlterInputLabel">Numeric Code</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="number" name="phoneCode" placeholder="Enter Phone Code..."
                class="form-control AlterInput" autocomplete="off" value="{{ $modeldata['phoneCode'] }}">
            <span class="AlterInputLabel">Phone Code</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="capital" placeholder="Enter Capital..."
                class="form-control AlterInput textValidation" autocomplete="off"
                value="{{ $modeldata['capital'] }}">
            <span class="AlterInputLabel">Capital</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="flag" placeholder="Enter Flag..." class="form-control AlterInput "
                autocomplete="off" value="{{ $modeldata['flag'] }}">
            <span class="AlterInputLabel">Flag</span>
        </label>

        <div class=" mb-5  InputLabel">
            <textarea name="description" id="description" cols="30" rows="5" class="col-12 form-control AlterInput "
                placeholder="Write Your Description..." spellcheck="true">{{ $modeldata['description'] }}</textarea>
            <span class="AlterInputLabel">Description</span>
        </div>


        <input type="hidden" value="{{ $modeldata['countryId'] }}" name="id">


        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button type="submit" class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('country.destroy', $modeldata['countryId']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="propelbtn propelbtncurved propeldelete propelDelPopup">Delete</button>
    </form>

    </div>


    <script>
        function cancelPage() {
            var url = "{{ route('country.index') }}";
            window.location.href = url;
        }
        $('.textValidation').on('keydown', function(e) {
            if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) {
                e.preventDefault();
                return false;
            }
        });
        var valRouteUrl = "{{ route('countryValidation') }}";

        // function closePage(id){
        //   var url = "{{ route('country.edit', ':id') }}";
        //       url = url.replace(':id', id);
        //   window.location.href = url;
        // }
    </script>
@endsection
