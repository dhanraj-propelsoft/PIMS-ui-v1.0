@extends('layouts.dashboard.app')
@section('content')
    <div class="common-master0 role0 for-active"></div>

    <!--Table-->
    <div class="container col-md-10 m-4 mx-auto">
        <div class="row ">


            <table class="table shadow mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modeldatas as $modeldata)
                        <tr ondblclick="viewPage(<?php echo $modeldata['id']; ?>)">
                            <td>{{ $modeldata['name'] }}</td>
                            <td>{{ $modeldata['mobile'] }}</td>
                            <td>{{ $modeldata['email'] }}</td>
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
            `<a href="{{ route('users.create') }}"><button class='propelbtn propelbtn-sm propelbtn-sm propelbtncurved propeladd propel-hover'>Add</button></a>`;

        function viewPage(id) {
            var url = "{{ route('users.show', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }
    </script>
@endsection
