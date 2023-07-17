@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 salutation0 edit0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="edit">
            <!-- | -->
            <!-- | --> <span>edit</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{ url('salutation') }}" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" name="salutation" placeholder="Person Salutation..." class="form-control AlterInput "
                autocomplete="off" value="{{ $modeldata['name'] }}">
            <span class="AlterInputLabel">Person Salutation</span>
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
              <div class="col-6">
                <input name="status" class="custom-switch-input" id="switch" type="checkbox" checked>
                <label class="custom-switch-btn float-right" for="switch"></label>
              </div>
                <input type="hidden" value="{{ $modeldata['activeStatus'] }}" name="activeStatus">
                <input type="hidden" value="{{ $modeldata['id'] }}" name="id">

                {{ $modeldata['status'] }}
            </span>

        </div>
        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('salutation.destroy', $modeldata['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="propelbtn propelbtncurved propeldelete">Delete</button>
    </form>

    </div>


    <script>
        function cancelPage() {
            var url = '{{ route('salutation.index') }}';
            window.location.href = url;
        }

        // function closePage(id){
        //   var url = '{{ route('salutation.edit', ':id') }}';
        //       url = url.replace(':id', id);
        //   window.location.href = url;
        // }
    </script>
@endsection
