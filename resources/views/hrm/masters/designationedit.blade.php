@extends('layouts.dashboard.app')
@section('content')
{{-- This is For Navigation and Breadcrumbs --}}

<!-- | -->
<div class="hrm0 designation0 edit0 for-active">
    <!-- | -->
    <!-- | -->
    <div class="edit">
        <!-- | -->
        <!-- | --> <span>edit</span> <!-- | -->
        <!-- | -->
    </div> <!-- | -->
    <!-- | -->
</div> <!-- | -->

{{-- ------------------------------------------------------------------------------------------------------------------- --}}
<link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css')}}" />
<form class="col-xl-8 m-auto card propel-card rounded shadow-none p-5" method="post" action="{{ route('hrmDesignation.store') }}" data-edit-form="true">
    @csrf
    <label class="form-group  p-0 mb-4 InputLabel w-100">
        <select class="form-select form-control department" id="department" name="department">
            <option selected value="" disabled>Select Department</option>
            @foreach($departments as $dept)
            <option value="{{$dept['id']}}"
                <?php echo ($dept['id'] == $datas['dept_id']) ? 'Selected' : ""; ?>>
                {{$dept['department_name']}}</option>
                @endForeach
        </select>
    </label>

    <label class="form-group  p-0 mb-4 InputLabel w-100">
        <input type="text" name="designation" value="{{$datas['designation_name']}}" placeholder="Enter Your Designation Name..."
            class="form-control AlterInput propel-key-press-input propel-key-press-input-mendatory" autocomplete="off">
        <span class="AlterInputLabel">Designation Name</span>
    </label>
    <label class="form-group m-0  p-0 InputLabel w-100">
        <input type="text" name="no_of_posting" value="{{$datas['no_of_posting']}}" placeholder="No of Posting..."
            class="form-control AlterInput propel-key-press-input propel-key-press-input-mendatory" autocomplete="off">
        <span class="AlterInputLabel">No of Posting</span>
    </label>
    <br>
    <em class="mb-4 ">&nbsp;&nbsp;&nbsp;The only purpose of this, is to show number of vacancies available.
    </em>

     


    <div class=" mb-5  InputLabel">
        <textarea id="" cols="30" rows="5" class="col-12 form-control AlterInput" placeholder="Write Your Description"
            name="description" spellcheck="true">{{$datas['description']}}</textarea>
        <span class="AlterInputLabel">Description</span>
    </div>
    <div class="custom-switch custom-switch-primary mb-5 row ">
        <div class="col-6">
            <p>Is Active</p>
        </div>
        <div class="col-6">
            <input class="custom-switch-input status" id="switch" name="status" type="checkbox"
                status-data="{{$datas['active_state']}}">
            <label class="custom-switch-btn float-right" for="switch"></label>
        </div>
        <input type="hidden" name="id" value="{{$datas['id']}}">
    </div>
    <div class="row justify-content-center">
        <div class="d-inline">
            <a href="{{ URL::previous() }}"><button type="button"
                    class="propelbtn propelbtncurved propelcancel propel-hover m-2">Cancel</button></a>
            <button type="submit" class="propelbtn propelbtncurved propelsubmit m-2">Update</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    var status = $('.status').attr('status-data');
    if (status == 1) {
        $('.status').attr('checked', true);
    } else {
        $('.status').attr('checked', false);
    }
    $('.sub-department-check').click(function() {
        if ($('.sub-department-check').prop('checked') == true) {
            $('.parent-department').addClass('d-block');
        } else {
            $('.parent-department').removeClass('d-block');
            $('.parent-department').addClass('d-none');
        }
    });
});
</script>
@endsection