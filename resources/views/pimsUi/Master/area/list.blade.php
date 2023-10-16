@extends('layouts.dashboard.app')
@section('content')
    <div class="common-master0 area0 for-active"></div>

    <!--Table-->
    <div class="container col-md-10 m-4 mx-auto">
        <div class="row ">


            <table class="table shadow mt-4">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>State</th>
                        <th>District</th>
                        <th>City</th>
                        <th>Area</th>
                        <th>Active Status</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modeldatas as $modeldata)
                        <tr ondblclick="viewPage(<?php echo $modeldata['areaId']; ?>)">
                            <td>{{ $modeldata['countryName'] }}</td>
                            <td>{{ $modeldata['stateName'] }}</td>
                            <td>{{ $modeldata['districtName'] }}</td>
                            <td>{{ $modeldata['cityName'] }}</td>
                            <td>{{ $modeldata['area'] }}</td>
                            <td>{{ $modeldata['status'] }}</td>
                            <td>{{ $modeldata['description'] }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <br><br>

        </div>
    </div>
    <!--End Table-->

    <script>
        document.querySelector(".propel-breadcrumb-extra-content").innerHTML =
            `<a href="{{ route('area.create') }}"><button class='propelbtn propelbtn-sm propelbtn-sm propelbtncurved propeladd propel-hover'>Add</button></a>`;

        function viewPage(id) {
            var url = "{{ route('area.show', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }
    </script>
@endsection
