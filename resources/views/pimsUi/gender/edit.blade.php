@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 gender0 edit0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="edit">
            <!-- | -->
            <!-- | --> <span>edit</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ url('gender') }}" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="gender" placeholder="Person gender..." class="form-control AlterInput "
                autocomplete="off" value="{{ $modeldata['name'] }}">
            <span class="AlterInputLabel">Person gender</span>
        </label>
        <div class=" mb-5  InputLabel">
            <textarea name="description" id=" description" cols="30" rows="5" class="col-12 form-control AlterInput "
                placeholder="Write Your Description" spellcheck="true">{{ $modeldata['description'] }}</textarea>
            <span class="AlterInputLabel">Description</span>
        </div>
        <div class="row justify-content-between mx-1">
            <span>
                Is Active
            </span>
            <span>
                <input type="hidden" value="{{ $modeldata['activeStatus'] }}" name="activeStatus">
                <input type="hidden" value="{{ $modeldata['id'] }}" name="id">

                {{ $modeldata['status'] }}
            </span>

        </div>
        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>

            <button class="propelbtn propelbtncurved propelsubmit">update</button>
    </form>
    <form action="{{ route('gender.destroy', $modeldata['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="propelbtn propelbtncurved propeldelete">Delete</button>
    </form>
    </div>
    <script>
        function cancelPage() {
            var url = '{{ route('gender.index') }}';
            window.location.href = url;
        }
    </script>
@endsection
