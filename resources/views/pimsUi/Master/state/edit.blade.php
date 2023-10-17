@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 state0 edit0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="edit">
            <!-- | -->
            <!-- | --> <span>edit</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('state.store') }}" data-dupl-val="true" data-edit-form="true" method="post"
        class="m-auto col-md-6 card p-2 rounded">
        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
        @csrf
        <label class="form-group p-0 InputLabel w-100">
            <select required class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory"
                name="countryId" data-minimum-results-for-search="Infinity" data-placeholder="Select Country" onchange="get_states(this)">
                <option selected value="" disabled>Select Country</option>
                @foreach ($modeldata['countries'] as $data)
                    <option value="{{ $data['id'] }}" {{ $data['id'] == $modeldata['countryId'] ? 'selected' : '' }}>
                        {{ $data['country'] }}</option>
                @endforeach

            </select>
            <span class="AlterInputLabel box">Country</span>
        </label>
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input required type="text" name="state" placeholder="State..."
                class="form-control AlterInput propel-key-press-input-mendatory duplicateVal" autocomplete="off"
                value="{{ $modeldata['state'] }}">
            <span class="AlterInputLabel">State</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" name="activeStatus"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Status">
                <option selected value="" disabled>Select Status</option>
                @foreach ($modeldata['activeStatus'] as $data)
                    <option value="{{ $data['id'] }}"
                        {{ $data['id'] == $modeldata['statusId'] ? 'selected' : '' }}>
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

        <input type="hidden" value="{{ $modeldata['stateId'] }}" name="id">


        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button type="submit" class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('state.destroy', $modeldata['stateId']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="propelbtn propelbtncurved propeldelete propelDelPopup">Delete</button>
    </form>

    </div>


    <script>
        function cancelPage() {
            var url = "{{ route('state.index') }}";
            window.location.href = url;
        }
        var duplVal = $("form[data-dupl-val='true']");

        duplVal.on('input change', function() {
            var formData = new FormData($(duplVal)[0]);
            $.ajax({
                url: "{{ route('stateValidation') }}",
                type: 'ajax',
                method: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.error != false) {
                        for (var key in data.error) {
                            var responseData = data.error[key];
                            if (responseData != "") {
                                $("input[name='" + key + "']").attr('validate', 'failure');
                                errorShow($("input[name='" + key + "']"), responseData);
                                formValid();
                            }
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
                    console.log(states);
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
        //   var url = "{{ route('state.edit', ':id') }}";
        //       url = url.replace(':id', id);
        //   window.location.href = url;
        // }
    </script>
@endsection
