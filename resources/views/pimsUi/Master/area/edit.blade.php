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


    <form action="{{route('area.store')}}" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <label class="form-group p-0 InputLabel w-100">
          <select class="form-select w-100 AlterInput search-need" name="districtId" data-minimum-results-for-search="Infinity"
              data-placeholder="Select District">
              <option selected value="" disabled>Select District</option>
              @foreach($modeldatas as $data)
              <option value="{{$data['id']}}" {{ $data['id'] == $result['districtId'] ? 'selected' : '' }}>{{$data['district']}}</option>
              @endforeach

              <!-- Add more districts here -->
          </select>
          <span class="AlterInputLabel box">District</span>
      </label>

        <label class="form-group p-0 mb-4 InputLabel w-100">
            <input type="text" required name="area" placeholder="Enter Area..." class="form-control AlterInput "
                autocomplete="off" value="{{ $result['area'] }}">
            <span class="AlterInputLabel">Area</span>
        </label>

        <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">
            <div class="">
              <p>Is Active</p>
            </div>
            <div class="">
              <input name="activeStatus" value="{{ $result['activeStatus'] }}" class="custom-switch-input" id="switch" type="checkbox" {{ $result['activeStatus'] == 1 ? 'checked' : '' }}>
              <label class="custom-switch-btn float-right" for="switch"></label>
            </div>
          </div>
          <div class=" mb-5  InputLabel">
            <textarea name="description" id="description" cols="30" rows="5" class="col-12 form-control AlterInput " placeholder="Write Your Description..." spellcheck="true">{{ $result['description'] }}</textarea>
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
            <button class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('area.destroy', $result['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="propelbtn propelbtncurved propeldelete">Delete</button>
    </form>

    </div>


    <script>
        $(document).ready(function() {
    const checkbox = $('#switch');
    const statusInput = $('[name="activeStatus"]').eq(0);

    checkbox.on('change', function() {
      if (this.checked) {
        statusInput.val(1);
      } else {
        statusInput.val(0);
      }
    });
  });
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
