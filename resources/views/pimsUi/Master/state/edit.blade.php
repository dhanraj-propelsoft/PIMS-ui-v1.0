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


    <form action="{{route('state.store')}}" method="post" class="m-auto col-md-6 card p-2 rounded">
      @if (session('failed'))
      <div class="alert alert-danger">
          {{ session('failed') }}
      </div>
  @endif
        @csrf
        <label class="form-group p-0 InputLabel w-100">
          <select required class="form-select w-100 AlterInput search-need" name="country_id" data-minimum-results-for-search="Infinity"
              data-placeholder="Select Country">
              <option selected value="" disabled>Select Country</option>
              @foreach($modeldatas as $data)
              <option value="{{$data['id']}}" {{ $data['id'] == $result['country_id'] ? 'selected' : '' }}>{{$data['country']}}</option>
              @endforeach

          </select>
          <span class="AlterInputLabel box">Country</span>
      </label>
        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input required type="text" name="state" placeholder="State..." class="form-control AlterInput "
                autocomplete="off" value="{{ $result['state'] }}">
            <span class="AlterInputLabel">State</span>
        </label>

        <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">
            <div class="">
              <p>Is Active</p>
            </div>
            <div class="">
              <input name="active_status" value="{{ $result['activeStatus'] }}" class="custom-switch-input" id="switch" type="checkbox"  {{ $result['activeStatus'] == 1 ? 'checked' : '' }}>
              <label class="custom-switch-btn float-right" for="switch"></label>
            </div>
          </div>
                <input type="hidden" value="{{ $result['id'] }}" name="id">


        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('state.destroy', $result['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="propelbtn propelbtncurved propeldelete">Delete</button>
    </form>

    </div>


    <script>
        $(document).ready(function() {
    const checkbox = $('#switch');
    const statusInput = $('[name="active_status"]').eq(0);

    checkbox.on('change', function() {
      if (this.checked) {
        statusInput.val(1);
      } else {
        statusInput.val(0);
      }
    });
  });
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
