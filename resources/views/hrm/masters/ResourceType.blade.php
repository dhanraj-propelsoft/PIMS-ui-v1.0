@extends('layouts.dashboard.app')
@section('content')

<div class="hrm0 resourcetype0 for-active"></div>
{{-- @if(session()->has('message'))
<div class="propel-alert propel-alert-success"> 
    <p>{{ session()->get('message') }}</p>
<p class="simple-icon-close close-grandpa-parent"></p>
<script>
setTimeout(function() {

    $(".close-grandpa-parent").parent().css('display', 'none');

}, 2500);
</script>
</div>
@endif --}}
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 mb-4">

            <table class="data-table  data-table-feature">
                <thead>
                    <tr>
                        <th>Human Resource Type</th>
                        <th>Status</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{$data['name']}}</td>
                        @if($data['active_state']=='1')
                        <td>Active</td>
                        @else
                        <td>Inactive</td>
                        @endif
                        <td>
                            <div class="dropdown d-inline-block">
                                <button class="propeltablebtn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    View
                                </button>
                                <div class="dropdown-menu rounded shadow" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item"
                                        href="{{ url('hrmResourceType/'.$data['id'].'/edit') }}">Edit</a>
                                    <form action="{{ route('hrmResourceType.destroy',$data['id']) }}"
                                        method="post" id='deleteform{{$data["id"]}}'>@csrf @method('DELETE')</form>
                                    <a class="dropdown-item"
                                        onclick="DefaultPropelAlert(`Are you sure you want to delete this Record`,`deleteform{{$data['id']}}`);">Delete</a>
                                </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
document.querySelector(".propel-breadcrumb-extra-content").innerHTML =
    `<a href="{{ route('hrmResourceType.create') }}"><button class='propelbtn propelbtn-sm propelbtncurved propeladd propel-hover'>Add</button></a>`;
</script>
@endsection