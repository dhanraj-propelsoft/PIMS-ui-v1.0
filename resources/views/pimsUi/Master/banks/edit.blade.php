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


    <form action="{{route('bank.store')}}" method="post" class="m-auto col-md-6 card p-2 rounded">
        @csrf
        <!-- Person Bank -->
   <label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="text" name="bank" required placeholder="Person Bank..." value="{{ $modeldata['bankName'] }}" class="form-control AlterInput" autocomplete="off">
    <span class="AlterInputLabel">Person Bank</span>
</label>

<!-- Person IFSC Code -->
<label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="text" name="ifsc" value="{{ $modeldata['ifsc'] }}" required placeholder="Person IFSC Code..." class="form-control AlterInput" autocomplete="off">
    <span class="AlterInputLabel">Person IFSC Code</span>
</label>

<!-- Person MICR Code -->
<label class="form-group p-0 mb-4 InputLabel w-100">
    <input type="text" name="micr"  value="{{ $modeldata['micr'] }}" required placeholder="Person MICR Code..." class="form-control AlterInput" autocomplete="off">
    <span class="AlterInputLabel">Person MICR Code</span>
</label>

        <div class="custom-switch custom-switch-primary mb-5 row justify-content-between mx-1">
            <div class="">
              <p>Is Active</p>
            </div>
            <div class="">
              <input name="active_status" value="{{ $modeldata['activeStatus'] }}" class="custom-switch-input" id="switch" type="checkbox"  {{ $modeldata['activeStatus'] == 1 ? 'checked' : '' }}>
              <label class="custom-switch-btn float-right" for="switch"></label>
            </div>
          </div>
                <input type="hidden" value="{{ $modeldata['id'] }}" name="id">


        <div class="row justify-content-between  mx-1  mt-3">
            <button type="button" class="propelbtn propelbtncurved propelcancel" onclick="cancelPage()">Close</button>
            <button class="propelbtn propelbtncurved propelsubmit">update</button>

    </form>
    <form action="{{ route('bank.destroy', $modeldata['id']) }}" method="POST">
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
