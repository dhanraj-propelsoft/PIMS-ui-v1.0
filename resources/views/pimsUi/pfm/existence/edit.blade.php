@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="pfm0 existence0 edit0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="edit">
            <!-- | -->
            <!-- | --> <span>edit</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('existence.store') }}" data-dupl-val="true" data-edit-form="true" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="existence" placeholder="Enter Existence..."
                class="form-control AlterInput  propel-key-press-input-mendatory" autocomplete="off"
                value="{{ $modeldata['existence'] }}">
            <span class="AlterInputLabel">Existence</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" name="activeStatus"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Status">
                <option selected value="" disabled>Select Status</option>
                @foreach ($modeldatas1 as $data1)
                    <option value="{{ $data1['id'] }}" {{ $data1['id'] == $modeldata['activeStatus'] ? 'selected' : '' }}>
                        {{ $data1['activeType'] }}</option>
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
        <input type="hidden" value="{{ $modeldata['id'] }}" name="id">


        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button type="submit" class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('existence.destroy', $modeldata['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="propelbtn propelbtncurved propeldelete propelDelPopup">Delete</button>
    </form>

    </div>


    <script>
        function cancelPage() {
            var url = "{{ route('existence.index') }}";
            window.location.href = url;
        }
        var duplVal = $("form[data-dupl-val='true']");

        duplVal.on('input change', function() {
            var formData = new FormData($(duplVal)[0]);
            $.ajax({
                url: "{{ route('existenceValidation') }}",
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
        // function closePage(id){
        //   var url = "{{ route('existence.edit', ':id') }}";
        //       url = url.replace(':id', id);
        //   window.location.href = url;
        // }
    </script>
@endsection
