@extends('layouts.dashboard.app')
@section('content')
  
    <div class="common-master0 genre0 for-active"></div>

    <!--Table-->
    <div class="container col-md-10 m-4 mx-auto">
        <div class="row ">
            <h2 class="text-center col-12">Select an Account to manage settings</h2>

            <table class="table shadow mt-4">
                <thead>
                  <tr>
                    <th>Person genre</th>
                    <th>Created By</th>
                    <th>Modified By</th>
                    <th>Active Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr  ondblclick="window.location.href='/genreView'" >
                    <td >Mr.</td>
                    <td>John Doe</td>
                    <td>Jane Smith</td>
                    <td>Active</td>
                  </tr>
           
                </tbody>
               
              </table>
              
            <br><br>

        </div>
    </div>
    <!--End Table-->

    <script>

        document.querySelector(".propel-breadcrumb-extra-content").innerHTML =
            `<a href="/genreAdd"><button class='propelbtn propelbtn-sm propelbtn-sm propelbtncurved propeladd propel-hover'>Add</button></a>`;
    
    </script>
@endsection
