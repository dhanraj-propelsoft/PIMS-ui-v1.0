@extends('layouts.dashboard.app')
@section('content')
@if(request()->is('myAccount'))
    <div class="user0 account0 for-active"></div>
    @php
    $url="createAccount";
     @endphp

@elseif(request()->is('OrganizationAccount'))
    <div class="organisation0 organisation-list0 for-active"></div>
    @php
    $url="createOrganisation";
     @endphp
@endif

 

    <!--Table-->
    <div class="container col-md-10 m-4 mx-auto">
        <div class="row ">
            <h2 class="text-center col-12">Select an Account to manage settings</h2>

            <table class="table  shadow mt-4 ">
                <thead >
                    <tr>
                        <th >Account</th>
                        <th>Type</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organisation as $org)
                        <?php $orgId = $org['orgId']; ?>
                        {{-- onclick="window.location.href='{{url('setOrganizationId',$org['orgId'])}}'" --}}
                        <tr>
                            <td class="organizationName" orgId="{{ $org['orgId'] }}">{{ $org['org_name'] }}</td>
                            <td>Dummy Data</td>
                            <td>Dummy Data</td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
            </table>
            <br><br>

        </div>
    </div>
    <!--End Table-->

    <script>

        document.querySelector(".propel-breadcrumb-extra-content").innerHTML =
            `<a href="{{route($url) }}"><button class='propelbtn propelbtn-sm propelbtn-sm propelbtncurved propeladd propel-hover'>Create</button></a>`;
        $('.organizationName').click(function() {
            var orgId = $(this).attr('orgId');
            var orgName = $(this).text();
            if (orgId && orgName) {
                $.ajax({
                    url: "{{ route('setOrganizationId') }}",
                    type: 'ajax',
                    method: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        orgId: orgId,
                        orgName: orgName
                    },
                    success: function(data) {

                        var orgId = data.orgId;
                        var orgName = data.orgName;
                        if (orgId && orgName) {
                            location.reload();
                        }
                    },
                    error: function() {}
                });
            }
        });
    </script>
@endsection
