@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 city0 edit0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="edit">
            <!-- | -->
            <!-- | --> <span>edit</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('city.store') }}" data-edit-form="true" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory" required name="countryId"
                id="countryId" data-minimum-results-for-search="Infinity" data-placeholder="Select Country">
                <option selected value="" disabled>Select Country</option>
                @foreach ($countryData as $data)
                    <option value="{{ $data['countryId'] }}" {{ $data['countryId'] == $modeldata['countryId'] ? 'selected' : '' }}>
                        {{ $data['country'] }}</option>
                @endforeach
                <!-- Add more countrys here -->
            </select>
            <span class="AlterInputLabel box">Country</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory" required name="stateId"
                id="districtId" id="stateId" data-minimum-results-for-search="Infinity" data-placeholder="Select State">
                <option selected value="" disabled>Select State</option>
                @foreach ($stateData as $data)
                    <option value="{{ $data['stateId'] }}" {{ $data['stateId'] == $modeldata['stateId'] ? 'selected' : '' }}>
                        {{ $data['state'] }}</option>
                @endforeach

                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">State</span>
        </label>
        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory" required name="districtId"
                data-minimum-results-for-search="Infinity" data-placeholder="Select District">
                <option selected value="" disabled>Select District</option>
                @foreach ($districtData as $data)
                    <option value="{{ $data['districtId'] }}"  {{ $data['districtId'] == $modeldata['districtId'] ? 'selected' : '' }}>
                        {{ $data['district'] }}</option>
                @endforeach
                <!-- Add more districts here -->
            </select>
            <span class="AlterInputLabel box">District</span>
        </label>
        
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="city" placeholder="City..."
                class="form-control AlterInput  propel-key-press-input-mendatory" autocomplete="off"
                value="{{ $modeldata['city'] }}">
            <span class="AlterInputLabel">City</span>
        </label>


        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" name="activeStatus"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Status">
                <option selected value="" disabled>Select Status</option>
                @foreach ($statusData as $data)
                    <option value="{{ $data['id'] }}"
                        {{ $data['id'] == $modeldata['activeStatus'] ? 'selected' : '' }}>
                        {{ $data['activeType'] }}</option>
                @endforeach
                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">Status</span>
        </label>

        <div class=" mb-5  InputLabel">
            <textarea name="description" id="description" cols="30" rows="5" class="col-12 form-control AlterInput "
                placeholder="Write Your Description..." spellcheck="true">{{ $modeldata['description'] }}</textarea>
            <span class="AlterInputLabel">Description</span>
        </div>

        <input type="hidden" value="{{ $modeldata['cityId'] }}" name="id">


        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button type="submit" class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('city.destroy', $modeldata['cityId']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="propelbtn propelbtncurved propeldelete propelDelPopup">Delete</button>
    </form>

    </div>


    <script>

        function cancelPage() {
            var url = "{{ route('city.index') }}";
            window.location.href = url;
        }
        function get_states(country) {
            var country_id = country.value;
            $.ajax({
                url: "{{route('get_states')}}",
                type: 'ajax',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    country_id: country_id,
                },
                success: function(data) {
        
                    var states = JSON.parse(data);
                    console.log(states);
                    $('#stateId')
                        .find('option')
                        .remove()
                        .end();
                    $("#stateId").prepend("<option value=''>Select State</option>").val('');
                    $.each(states, function(key, value) {
                        var option = '<option value="' + value.id + '">' + value.name +
                            '</option>';
                        $('#stateId').append(option);
                    });

                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        function get_districts(state) {
            var state_id = state.value;
            $.ajax({
                url: "{{route('get_districts')}}",
                type: 'ajax',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    state_id: state_id,
                },
                success: function(data) {
        
                    var districts = JSON.parse(data);
                    console.log(districts);
                    $('#districtId')
                        .find('option')
                        .remove()
                        .end();
                    $("#districtId").prepend("<option value=''>Select District</option>").val('');
                    $.each(districts, function(key, value) {
                        var option = '<option value="' + value.id + '">' + value.name +
                            '</option>';
                        $('#districtId').append(option);
                    });

                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        // function closePage(id){
        //   var url = "{{ route('city.edit', ':id') }}";
        //       url = url.replace(':id', id);
        //   window.location.href = url;
        // }
    </script>
@endsection
