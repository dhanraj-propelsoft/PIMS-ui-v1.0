@extends('layouts.dashboard.app')
@section('content')

<div class="hrm0 department0 for-active"></div>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 mb-4">

            <table class="data-table  data-table-feature" id="element">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Parent Department</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <?php
                    $id = $data['id'];
                    ?>
                    <tr>
                        <td>{{$data['department_name']}}</td>
                        @if($data['hrm_parent_dept'])

                        <td>{{$data['hrm_parent_dept']['department_name']}}</td>

                        @else
                        <td>None</td>
                        @endif
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
                                    <a class="dropdown-item" href="{{ url('hrmDepartment/'.$data['id'].'/edit') }}">Edit</a>
                                    <form action="{{ route('hrmDepartment.destroy',$data['id']) }}" method="post" id='deleteform{{$data["id"]}}'>@csrf @method('DELETE')</form>
                                    <a class="dropdown-item" onclick="DefaultPropelAlert(`Are you sure you want to delete this Record`,`deleteform{{$data['id']}}`);">Delete</a>
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
    
    document.querySelector(".propel-breadcrumb-extra-content").innerHTML = `<a href="{{ route('hrmDepartment.create') }}"><button class='propelbtn propelbtn-sm propelbtncurved propeladd propel-hover'>Add</button></a>`;
</script>
@endsection