@extends('layouts.dashboard.app')
@section('content')

<link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css')}}" />
{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 resourcetype0 edit0 for-active"><!-- | -->
 <!-- | -->     <div class="edit">                                   <!-- | -->
 <!-- | -->      <span>edit</span>                                   <!-- | -->
 <!-- | -->    </div>                                               <!-- | -->
 <!-- | -->   </div>                                                <!-- | -->
 
         {{-- ------------------------------------------------------------------------------------------------------------------- --}}
<form class="col-xl-8 m-auto card propel-card shadow-none rounded p-5" method="post" action="{{ route('hrmResourceType.store') }}" data-edit-form="true">
@method('post')
  @csrf
    {{-- <div class="mb-5 row">
      <label for="department" class="col-sm-6"  style="color:blue;">Human Resource Type</label>
      <input type="text" name="name" value="{{$datas['name']}}" class="col-sm-6 border-0 border-bottom outline-none" style="border-color:blue !important; outline:none;">
    </div> --}}
    <label class="form-group  p-0 mb-4 InputLabel w-100">
      <input type="text" name="name"  value="{{$datas['name']}}" placeholder="Human Resource Type..." class="form-control AlterInput propel-key-press-input propel-key-press-input-mendatory"  autocomplete="off">
       <span class="AlterInputLabel">Human Resource Type</span>
      </label>
      <input type="hidden" name="id" value="{{$datas['id']}}">
    <div class="form-group mb-5  InputLabel" >
      <textarea name="description" id="" cols="30" rows="5" class="form-control AlterInput" placeholder="Write Your Description" spellcheck="true">{{$datas['description']}}</textarea>
      <span class="AlterInputLabel">Description</span>
    </div>
    <div class="custom-switch custom-switch-primary mb-5 row justify-content-between">
      <div class="col-6">
        <p>Is Active</p>
      </div>
      <div class="col-6">
      <input class="custom-switch-input status" id="switch" type="checkbox"  name="active_state" status-data="{{$datas['active_state']}}">
      <label class="custom-switch-btn float-right" for="switch"></label>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="d-inline">
    <a href="{{ URL::previous() }}"><button type="button" class="propelbtn propelbtncurved propelcancel propel-hover m-2">Cancel</button></a>
    <button type="submit" class="propelbtn propelbtncurved propelsubmit m-2">Update</button>
    </div>
</div>
  </form>

  <script>
   $(document).ready(function(){
    var status = $('.status').attr('status-data');
    if (status == 1) {
      $('.status').attr('checked', true);
    } else {
      $('.status').attr('checked', false);
    }

   $('.sub-department-check').click(function(){
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