@extends('layouts.dashboard.app')
@section('content')
    <div class="user0 default-login0 for-active"></div>
    <div class="container col-md-12 m-4">
        <div class="row col-12">
            <h2 class="w-100 text-center">Select an Account to manage settings</h2>

            <table class="table m-auto col-md-10 shadow mt-4 table-bordered">
                <thead>
                    <tr>
                        <th>Account</th>
                        <th>Type</th>
                        <th>Role</th>
                        <th>Preferred</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organisation as $org)
                        <?php $orgId = $org['orgId']; ?>

                        <tr>
                            <td> {{ $org['org_name'] }}</td>
                            <td>Dummy Data</td>
                            <td>Dummy Data</td>
                            <td><label class="round checkbox">
                                    <input type="checkbox" value="{{ $org['orgId'] }}" id="checkbox-{{$loop->iteration}}"
                                        <?php if ($org['default_org']==1){ ?>checked<?php } ?> orgName="{{ $org['org_name'] }}"
                                        class="checkbox-input defaultOrg">
                                        <label for="checkbox-{{$loop->iteration}}"></label>
                                </label></td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
            </table>
            <br><br>

        </div>
    </div>
    
    <script>
        const checkboxInputs = document.querySelectorAll('.checkbox-input');

        checkboxInputs.forEach(input => {
            input.addEventListener('click', () => {
                checkboxInputs.forEach(otherInput => {
                    if (otherInput !== input) {
                        otherInput.checked = false;
                    }
                });
            });
        });
        $('.defaultOrg').click(function() {
            var orgName = $(this).attr('orgName');
            var orgId = $(this).val();
            if (orgName && orgId) {
                $.ajax({
                    url: "{{ route('setDefaultOrganization') }}",
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
    <!--End Table-->
@endsection
