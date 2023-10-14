@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 district0 edit0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="edit">
            <!-- | -->
            <!-- | --> <span>edit</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('district.store') }}" data-edit-form="true" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory" required name="countryId"
            id="countryId" data-minimum-results-for-search="Infinity" data-placeholder="Select Country" onchange="get_states(this)">
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
                id="stateId" data-minimum-results-for-search="Infinity" data-placeholder="Select State">
                <option selected value="" disabled>Select State</option>
                @foreach ($stateData as $data)
                    <option value="{{ $data['id'] }}" {{ $data['id'] == $modeldata['stateId'] ? 'selected' : '' }}>
                        {{ $data['state'] }}</option>
                @endforeach

                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">State</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" required name="district" required placeholder="Enter District..."
                class="form-control AlterInput propel-key-press-input-mendatory duplicateVal" autocomplete="off"
                value="{{ $modeldata['district'] }}">
            <span class="AlterInputLabel">District</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" name="activeStatus"
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
            <textarea name="description" id="description" cols="30" rows="5" class="col-12 form-control AlterInput "
                placeholder="Write Your Description..." spellcheck="true">{{ $modeldata['description'] }}</textarea>
            <span class="AlterInputLabel">Description</span>
        </div>
        <input type="hidden" value="{{ $modeldata['districtId'] }}" name="id">


        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button type="submit" class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('district.destroy', $modeldata['districtId']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="propelbtn propelbtncurved propeldelete propelDelPopup">Delete</button>
    </form>

    </div>


    <script>
        function cancelPage() {
            var url = "{{ route('district.index') }}";
            window.location.href = url;
        }
        $('.duplicateVal').on('input blur', function() {
            var ele_name = $(this).attr('name');
            var ele_val = $(this).val();
            let countryId = parseInt($("select[name='countryId']").val());
            let stateId = parseInt($("select[name='stateId']").val());
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append(ele_name, ele_val);
            formData.append('countryId', countryId);
            formData.append('stateId', stateId);
            formData.append("id", "{{ $modeldata['districtId'] }}");
            $.ajax({
                url: '{{ route('check_district') }}',
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

        // function closePage(id){
        //   var url = "{{ route('district.edit', ':id') }}";
        //       url = url.replace(':id', id);
        //   window.location.href = url;
        // }
    </script>
@endsection
