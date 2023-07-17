@extends('layouts.dashboard.app')
@section('content')
    {{-- This is For Navigation and Breadcrumbs --}}

    <!-- | -->
    <div class="common-master0 gender0 add0 for-active">
        <!-- | -->
        <!-- | -->
        <div class="add">
            <!-- | -->
            <!-- | --> <span>add</span> <!-- | -->
            <!-- | -->
        </div> <!-- | -->
        <!-- | -->
    </div> <!-- | -->


    <form action="{{url('gender')}}" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 mb-4 InputLabel w-100">
          <input type="text" name="gender" required  placeholder="Person gender..." class="form-control AlterInput " autocomplete="off">
          <span class="AlterInputLabel">Person gender</span>
        </label>
        <div class=" mb-5  InputLabel">
            <textarea name="description" id=" description" cols="30" rows="5" class="col-12 form-control AlterInput "
                placeholder="Write Your Description" spellcheck="true"></textarea>
            <span class="AlterInputLabel">Description</span>
        </div>
        <div class="row justify-content-between mx-1">
            <span>
                Is Active
            </span>
            <span>
                YES
            </span>

        </div>
        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button"  class="propelbtn propelbtncurved propelcancel"  onclick="cancelPage()">Cancel</button>
            <button type="reset" class="propelbtn propelbtncurved propelcancel">Reset</button>

            <button class="propelbtn propelbtncurved propelsubmit" value="saveAndClose" name="link">Save &
                Close</button>
            <button class="propelbtn propelbtncurved propelsubmit" value="saveAndNew" name="link">Save &
                New</button>
        </div>

    </form>
    <script>
      function cancelPage() {
        var url = '{{ route("gender.index") }}';
        window.location.href = url;
      }
      </script>
@endsection
