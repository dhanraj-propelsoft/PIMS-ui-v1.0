@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 area0 add0 for-active"><!-- | -->
        <!-- | -->
        <div class="add"> <!-- | -->
            <!-- | --> <span>add</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('area.store') }}" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 InputLabel w-100">
            <select required class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory" name="countryId"
                id="countryId" data-minimum-results-for-search="Infinity" data-placeholder="Select Country" onchange="get_states(this)">
                <option selected value="" disabled>Select Country</option>
                @foreach ($countryData as $data)
                    <option value="{{ $data['countryId'] }}">{{ $data['country'] }}</option>
                @endforeach
                <!-- Add more countrys here -->
            </select>
            <span class="AlterInputLabel box">Country</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select required class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory" name="stateId"
                id="stateId" data-minimum-results-for-search="Infinity" data-placeholder="Select State" onchange="get_districts(this)">
                <option selected value="" disabled>Select State</option>
                @foreach ($stateData as $data)
                    <option value="{{ $data['stateId'] }}">{{ $data['state'] }}</option>
                @endforeach
                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">State</span>
        </label>
        <label class="form-group p-0 InputLabel w-100">
            <select required class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory" name="districtId"
                id="districtId" data-minimum-results-for-search="Infinity" data-placeholder="Select District" onchange="get_cities(this)">
                <option selected value="" disabled>Select District</option>
                @foreach ($districtData as $data)
                    <option value="{{ $data['districtId'] }}">{{ $data['district'] }}</option>
                @endforeach
                <!-- Add more districts here -->
            </select>
            <span class="AlterInputLabel box">District</span>
        </label>
        <label class="form-group p-0 InputLabel w-100">
            <select required class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory"
                name="cityId" id="cityId" data-minimum-results-for-search="Infinity" data-placeholder="Select City">
                <option selected value="" disabled>Select City</option>
                @foreach ($cityData as $data)
                    <option value="{{ $data['cityId'] }}">{{ $data['city'] }}</option>
                @endforeach
                <!-- Add more citys here -->
            </select>
            <span class="AlterInputLabel box">City</span>
        </label>
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="area" required placeholder="Enter Area..."
                class="form-control AlterInput propel-key-press-input-mendatory duplicateVal" autocomplete="off">
            <span class="AlterInputLabel">Area</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" name="activeStatus"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Status">
                <option selected value="" disabled>Select Status</option>
                @foreach ($statusData as $data)
                    <option value="{{ $data['id'] }}">{{ $data['activeType'] }}</option>
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
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="pinCode" required placeholder="Enter PinCode..." class="form-control AlterInput "
                autocomplete="off">
            <span class="AlterInputLabel">PinCode</span>
        </label>
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
            var url = "{{ route('area.index') }}";
            window.location.href = url;
        }
        $('.duplicateVal').on('input blur', function() {
            var ele_name = $(this).attr('name');
            var ele_val = $(this).val();
            let countryId = parseInt($("select[name='countryId']").val());
            let stateId = parseInt($("select[name='stateId']").val());
            let districtId = parseInt($("select[name='districtId']").val());
            let cityId = parseInt($("select[name='cityId']").val());
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append(ele_name, ele_val);
            formData.append('countryId', countryId);
            formData.append('stateId', stateId);
            formData.append('districtId', districtId);
            formData.append('cityId', cityId);
            $.ajax({
                url: '{{ route('check_area') }}',
                type: 'ajax',
                method: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.error != false) {
                        var responseData = data.error[ele_name];
                        if (responseData != "") {
                            $("input[name='" + ele_name + "']").attr('validate', 'failure');
                            errorShow($("input[name='" + ele_name + "']"), responseData);
                            formValid();
                        }
                    }

                },
                error: function(err) {
                    //console.log(err);
                }
            });
        });
        function get_states(country) {
            var country_id = country.value;
            $.ajax({
                url: "{{route('get_states')}}",
                type: 'ajax',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    countryId: country_id,
                },
                success: function(data) {
        
                    var states = JSON.parse(data);
                    //console.log(states);
                    $('#stateId')
                        .find('option')
                        .remove()
                        .end();
                    $("#stateId").prepend("<option value=''>Select State</option>").val('');
                    $.each(states, function(key, value) {
                        var option = '<option value="' + value.id + '">' + value.state +
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
                    stateId: state_id,
                },
                success: function(data) {
        
                    var districts = JSON.parse(data);
                    //console.log(districts);
                    $('#districtId')
                        .find('option')
                        .remove()
                        .end();
                    $("#districtId").prepend("<option value=''>Select District</option>").val('');
                    $.each(districts, function(key, value) {
                        var option = '<option value="' + value.id + '">' + value.district +
                            '</option>';
                        $('#districtId').append(option);
                    });

                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        function get_cities(district) {
            var district_id = district.value;
            $.ajax({
                url: "{{route('get_cities')}}",
                type: 'ajax',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    districtId: district_id,
                },
                success: function(data) {
        
                    var cities = JSON.parse(data);
                    //console.log(cities);
                    $('#cityId')
                        .find('option')
                        .remove()
                        .end();
                    $("#cityId").prepend("<option value=''>Select City</option>").val('');
                    $.each(cities, function(key, value) {
                        var option = '<option value="' + value.id + '">' + value.city +
                            '</option>';
                        $('#cityId').append(option);
                    });

                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>
@endsection
