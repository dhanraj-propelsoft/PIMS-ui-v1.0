@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 state0 add0 for-active"><!-- | -->
        <!-- | -->
        <div class="add"> <!-- | -->
            <!-- | --> <span>add</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('state.store') }}" data-dupl-val="true" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 InputLabel w-100">
            <select required class="form-control w-100 AlterInput search-need propel-key-press-input-mendatory"
                name="countryId" data-minimum-results-for-search="Infinity" id="countryId" data-placeholder="Select Country">
                <option selected value="" disabled>Select Country</option>
                @foreach ($countryData as $data)
                    <option value="{{ $data['countryId'] }}">{{ $data['country'] }}</option>
                @endforeach

            </select>
            <span class="AlterInputLabel">Country</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="state" required placeholder="State..."
                class="form-control AlterInput propel-key-press-input-mendatory duplicateVal" autocomplete="off">
            <span class="AlterInputLabel">State</span>
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
    </script>
@endsection
