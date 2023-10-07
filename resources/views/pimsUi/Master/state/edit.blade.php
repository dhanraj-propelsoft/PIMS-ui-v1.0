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


    <form action="{{ route('state.store') }}" data-edit-form="true" method="post" class="m-auto col-md-6 card p-2 rounded">
        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
        @csrf
        <label class="form-group p-0 InputLabel w-100">
            <select required class="form-select w-100 AlterInput search-need propel-key-press-input-mendatory"
                name="countryId" data-minimum-results-for-search="Infinity" data-placeholder="Select Country">
                <option selected value="" disabled>Select Country</option>
                @foreach ($modeldatas as $data)
                    <option value="{{ $data['id'] }}" {{ $data['id'] == $result['countryId'] ? 'selected' : '' }}>
                        {{ $data['country'] }}</option>
                @endforeach

            </select>
            <span class="AlterInputLabel box">Country</span>
        </label>
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input required type="text" name="state" placeholder="State..."
                class="form-control AlterInput propel-key-press-input-mendatory" autocomplete="off"
                value="{{ $result['state'] }}">
            <span class="AlterInputLabel">State</span>
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

        <input type="hidden" value="{{ $result['id'] }}" name="id">


        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button type="submit" class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('state.destroy', $result['id']) }}" method="POST">
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

        // function closePage(id){
        //   var url = '{{ route('salutation.edit', ':id') }}';
        //       url = url.replace(':id', id);
        //   window.location.href = url;
        // }
    </script>
@endsection
