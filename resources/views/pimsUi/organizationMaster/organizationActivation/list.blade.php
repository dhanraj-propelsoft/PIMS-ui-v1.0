@extends('layouts.dashboard.app')
@section('content')
    <div class="organisation0 orgActivation0 for-active"></div>

    <!--Table-->
    <div class="container col-md-10 m-4 mx-auto">
        <div class="row ">


            <table class="table shadow mt-4">
                <thead>
                    <tr>
                        <th>Organization</th>
                        <th>Active Status</th>
                        <th>Activation</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i=1; $i<5; $i++)
                        <tr ondblclick="">  {{-- viewPage(<?php //echo $modeldata['id']; ?>) --}}
                            <td>{{ $i }}</td>
                            <td>In-Active</td>
                            <td><button class='propelbtn propelbtn-sm propelbtn-sm propelbtncurved propeladd propel-hover' onclick='activePopup({{ $i }})'>Activate</button></td>
                        </tr>
                    @endfor
                </tbody>

            </table>

            <br><br>

        </div>
    </div>
    <!--End Table-->

    <script>
        function activePopup(id) {
            audio.play();
            $('.propel-alert-info').html("Are you sure you want to Active?");
            $('.default-alert-btns').html("<button type='submit' class='propelbtn propelsubmit propel-hover hoverable-btn  w-30 ' id='form-submit' onclick='activeOrganization("+id+")'>Yes</button> <button  class=' propelbtn propelsubmit propel-hover hoverable-btn   w-30' onclick='closeSuperGrandpa(this)'>Cancel</button>");
            $('.default-alert-container').show();
        }
        function activeOrganization(id) {
            var url = '{{ route('orgActivation.show', ':id') }}';
            url = url.replace(':id', id);
            window.location.href = url;
        }
    </script>
@endsection
