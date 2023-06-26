@extends('layouts.dashboard.app')
@section('content')

<div class="hrm0 designation0 for-active"></div>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 mb-4">

            <table class="data-table  data-table-feature">
                <thead>
                    <tr>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Total Posting</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{$data['designation_name']}}</td>

                        @foreach($departments as $dept)
                          @if($data['dept_id']==$dept['id'])
                          <td>{{$dept['department_name']}}</td>
                          @endif
                        @endforeach
                        <td>{{$data['no_of_posting']}}</td>
                        @if($data['active_state']=='1')
                        <td>Active</td>
                        @else
                        <td>In Active</td>
                        @endif
                        <td>
                            <div class="dropdown d-inline-block">
                                <button class="propeltablebtn   dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    View
                                </button>
                                <div class="dropdown-menu rounded propel-shadow" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="{{ url('hrmDesignation/'.$data['id'].'/edit') }}">Edit</a>
                                    <form action="{{ route('hrmDesignation.destroy',$data['id']) }}" method="post" id='deleteform{{$data["id"]}}'>@csrf @method('DELETE')</form>
                                    <a class="dropdown-item" onclick="DefaultPropelAlert(`Are you sure you want to delete this Record`,`deleteform{{$data['id']}}`);">Delete</a>
                                </div>
                        </td>
                    </tr>
                    @endforeach
                        
                    </tr>
                  
                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
document.querySelector(".propel-breadcrumb-extra-content").innerHTML =
    `<a href="{{ route('hrmDesignation.create') }}""><button class='propelbtn propelbtn-sm propelbtncurved propeladd propel-hover'>Add</button></a>`;
</script>
@endsection