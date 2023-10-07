@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 area0 edit0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="edit">
            <!-- | -->
            <!-- | --> <span>edit</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ route('area.store') }}" data-edit-form="true" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 InputLabel w-100">
            <select class="form-control w-100 AlterInput search-need propel-key-press-input-mendatory" name="districtId"
                data-minimum-results-for-search="Infinity" data-placeholder="Select District">
                <option selected value="" disabled>Select District</option>
                @foreach ($modeldatas as $data)
                    <option value="{{ $data['id'] }}" {{ $data['id'] == $result['districtId'] ? 'selected' : '' }}>
                        {{ $data['district'] }}</option>
                @endforeach

                <!-- Add more districts here -->
            </select>
            <span class="AlterInputLabel box">District</span>
        </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" required name="area" placeholder="Enter Area..."
                class="form-control AlterInput propel-key-press-input-mendatory" autocomplete="off"
                value="{{ $result['area'] }}">
            <span class="AlterInputLabel">Area</span>
        </label>

        <label class="form-group p-0 InputLabel w-100">
            <select class="form-select w-100 AlterInput search-need" name="activeStatus"
                data-minimum-results-for-search="Infinity" data-placeholder="Select Status">
                <option selected value="" disabled>Select Status</option>
                <option value="1" {{ $result['activeStatus'] == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $result['activeStatus'] == 0 ? 'selected' : '' }}>In-Active</option>
                <!-- Add more states here -->
            </select>
            <span class="AlterInputLabel box">Status</span>
        </label>

        <div class=" mb-5  InputLabel">
            <textarea name="description" id="description" cols="30" rows="5" class="col-12 form-control AlterInput "
                placeholder="Write Your Description..." spellcheck="true">{{ $result['description'] }}</textarea>
            <span class="AlterInputLabel">Description</span>
        </div>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" required name="pinCode" placeholder="Enter PinCode..." class="form-control AlterInput "
                autocomplete="off" value="{{ $result['pinCode'] }}">
            <span class="AlterInputLabel">PinCode</span>
        </label>
        <input type="hidden" value="{{ $result['id'] }}" name="id">


        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button type="submit" class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('area.destroy', $result['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="propelbtn propelbtncurved propeldelete propelDelPopup">Delete</button>
    </form>

    </div>


    <script>
        function cancelPage() {
            var url = "{{ route('area.index') }}";
            window.location.href = url;
        }

        // function closePage(id){
        //   var url = '{{ route('salutation.edit', ':id') }}';
        //       url = url.replace(':id', id);
        //   window.location.href = url;
        // }
    </script>
@endsection
