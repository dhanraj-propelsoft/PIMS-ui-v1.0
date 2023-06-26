@extends('layouts.dashboard.app')
@section('content')

{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="organisation0 organisation-list0 for-active"><!-- | -->
 <!-- | -->                                          <!-- | -->
 <!-- | -->   </div>      <!-- | -->
  
   {{-- ------------------------------------------------------------------------------------------------------------------- --}}
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 mb-4">

            <table class="data-table  data-table-feature">
                <thead>
                    <tr>
                        <th>Designation</th>
                        <th>Department</th>                    
                        <th>Status</th>
                        <th>Action</th>
                        <th>Preferred</th>

                    </tr>
                </thead>
                <tbody>
                  <td>none</td>
                  <td>werfwe</td>
                  <td>werwe</td>
              
                  <td>

                    <div class="dropdown d-inline-block">
                        <button class="propeltablebtn  dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            View
                        </button>
                        <div class="dropdown-menu rounded propel-shadow" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">View</a>
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                            <a class="dropdown-item" href="#">Relive</a>
                            <a class="dropdown-item" href="#">Rejoin</a>
                        </div>
                  </td>
             
                  <td > 
                      <label class="propel-checkbox">
                    <input type="checkbox" class="propel-checkbox__input"/>
                    <span class="propel-checkbox__inner"></span>
                  </label>
                
                </td>
                        
                    </tr>
                 

                </tbody>
            </table>

        </div>
    </div>

</div>
<script>
    document.querySelector(".propel-breadcrumb-extra-content").innerHTML = `<a href="#"><button class='propelbtn propelbtn-sm propelbtncurved propeladd propel-hover create-org'>Create</button></a>`;
</script>
@endsection