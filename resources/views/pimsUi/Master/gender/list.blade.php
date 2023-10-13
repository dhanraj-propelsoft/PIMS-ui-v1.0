@extends('layouts.dashboard.app')
@section('content')
    <div class="person-master0 gender0 for-active"></div>

    <!--Table-->
    <div class="container col-md-10 m-4 mx-auto">
        <div class="row ">


            <table class="table shadow mt-4">
                <thead>
                    <tr>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modeldatas as $modeldata)
                        <tr ondblclick="viewPage(<?php echo $modeldata['id']; ?>)">
                            <td>{{ $modeldata['gender'] }}</td>
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
            `<a href="{{ route('gender.create') }}"><button class='propelbtn propelbtn-sm propelbtn-sm propelbtncurved propeladd propel-hover'>Add</button></a>`;

        function viewPage(id) {
            var url = "{{ route('gender.show', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }
    </script>
@endsection
