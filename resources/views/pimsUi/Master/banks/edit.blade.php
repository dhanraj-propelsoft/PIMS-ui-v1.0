@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 banks0 edit0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="edit">
            <!-- | -->
            <!-- | --> <span>edit</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('bank.store') }}" data-edit-form="true" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <!-- Bank -->
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="bank" required placeholder="Bank..." value="{{ $modeldata['bankName'] }}"
                class="form-control AlterInput propel-key-press-input-mendatory" autocomplete="off">
            <span class="AlterInputLabel">Bank</span>
        </label>

        <!-- IFSC Code -->
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="ifsc" value="{{ $modeldata['ifsc'] }}" required placeholder="IFSC Code..."
                class="form-control AlterInput propel-key-press-input-mendatory" autocomplete="off">
            <span class="AlterInputLabel">IFSC Code</span>
        </label>

        <!-- MICR Code -->
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="micr" value="{{ $modeldata['micr'] }}" required placeholder="MICR Code..."
                class="form-control AlterInput propel-key-press-input-mendatory" autocomplete="off">
            <span class="AlterInputLabel">MICR Code</span>
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
    <form action="{{ route('bank.destroy', $modeldata['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="propelbtn propelbtncurved propeldelete propelDelPopup">Delete</button>
    </form>

    </div>


    <script>

        function cancelPage() {
            var url = "{{ route('bank.index') }}";
            window.location.href = url;
        }

        // function closePage(id){
        //   var url = '{{ route('salutation.edit', ':id') }}';
        //       url = url.replace(':id', id);
        //   window.location.href = url;
        // }
    </script>
@endsection
