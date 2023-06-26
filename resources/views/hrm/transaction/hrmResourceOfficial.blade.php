@extends('layouts.dashboard.app')
@section('content')
<link rel="stylesheet" href="css/vendor/smart_wizard.min.css" />
{{-- This is For Navigation and Breadcrumbs --}}

 <!-- | -->   <div class="hrm0 resource0 addresource0 for-active"><!-- | -->
 <!-- | -->     <div class="addresource">                                    <!-- | -->
 <!-- | -->      <span>add resource</span>                                    <!-- | -->
 <!-- | -->    </div>                                                <!-- | -->
 <!-- | -->   </div>                                                 <!-- | -->
  
   {{-- ------------------------------------------------------------------------------------------------------------------- --}}
   <div class="col-12  ">

    <div class=" ">
        <div id="smartWizardCustomButtons">
            <ul class="card-header" style="display:flex;justify-content:space-between;">
                <li><a href="#customButtons1">Official<!--<br /><small>First step description</small>--></a></li>
                <li><a href="#customButtons2">Personal<!--<br /><small>Second step description</small>--></a></li>
                <li><a href="#customButtons3">Communication<!--<br /><small>Third step description</small>--></a></li>
                <li><a href="#customButtons4">ID & Documents<!--<br /><small>Third step description</small>--></a></li>
                <li><a href="#customButtons5">Education<!--<br /><small>Third step description</small>--></a></li>
                <li><a href="#customButtons6">Profession<!--<br /><small>Third step description</small>--></a></li>
                <li><a href="#customButtons7">Bank<!--<br /><small>Third step description</small>--></a></li>
                <li><a href="#customButtons8">Family<!--<br /><small>Third step description</small>--></a></li>
            </ul>

            <div class="card-body">
                <div id="customButtons1">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                    <label class="form-group  p-0   InputLabel w-100 ">
                        <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                         <span class="AlterInputLabel">Specific Organizatioin Code for resource</span>
                        </label></div>
                        <div class="form-group col-md-6">
                    <label class="form-group  p-0   InputLabel w-100 ">
                        <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                         <span class="AlterInputLabel">Date Of Joining</span>
                        </label>
                    </div></div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                    <label class="form-group  p-0   InputLabel w-100 ">
                        <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                         <span class="AlterInputLabel">Resource Type</span>
                        </label></div>
                        <div class="form-group col-md-6">
                    <label class="form-group  p-0   InputLabel w-100 ">
                        <input type="text" class="form-control AlterInput w-100"  placeholder="Ex : Something">
                         <span class="AlterInputLabel">Department</span>
                        </label>
                    </div></div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                    <label class="form-group  p-0   InputLabel w-100">
                        <input type="text" class="form-control AlterInput w-100 "  placeholder="Ex : Something">
                         <span class="AlterInputLabel">Designations</span>
                        </label></div>
                        <div class="form-group col-md-6">
                    <label class="form-group  p-0   InputLabel w-100 ">
                        <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                         <span class="AlterInputLabel">Account Leader Name<small>(its slected from books)</small></span>
                        </label>
                    </div></div>
                        
                </div>
                <div id="customButtons2" >
                    <div class="row">
                    <div class="col-sm-3">
                        <div class="add-resource-profile">
                            <img src="{{asset('assets/images/userlogo.jpg')}}" alt="Person Profile">
                        </div>    
                    </div>
                    <form class="col-sm-9">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Salutation</span>
                            </label></div>
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">First Name <sup>*</sup></span>
                            </label>
                        </div></div>    

                        <div class="form-row">
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Middle Name</span>
                            </label></div>
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Last Name or Initial</span>
                            </label>
                        </div></div> 

                        <div class="form-row">
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Nick Name or Alias</span>
                            </label></div>
                          </div> 

                          <div class="form-row">
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">DOB <sup>*</sup></span>
                            </label></div>
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Birth City</span>
                            </label>
                        </div></div> 

                        <div class="form-row">
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Blood Group</span>
                            </label></div>
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Gender</span>
                            </label>
                        </div></div> 

                        <div class="form-row">
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Marital Status</span>
                            </label></div>
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Anniversary Date</span>
                            </label>
                        </div></div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-100 ">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Mother Tongue</span>
                            </label></div>

                            <div class="form-group col-md-6">
                        <label class="form-group  p-0   InputLabel w-90">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something" style="border-top-right-radius: 0; border-bottom-right-radius:0;">
                            <span class="AlterInputLabel">Other Known Language</span>
                        </label>
                        <span class="form-control w-10  text-center float-right ToDo p-0" style="background: rgb(128,0,255);">
                           <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>
                        </span>
               </div>
            
            </div>
                    </form>
                    </div>
                </div>


                <div id="customButtons3">
                     <div class="form-row">
                            <div class="form-group col-md-2 m-0">
                        <label class="form-group  p-0   InputLabel w-100 m-0">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Primary Mobile<sup>*</sup></span>
                            </label></div> 
                            <div class="form-group col-md-2 m-0">
                        <label class="form-group  p-0   InputLabel w-100 m-0">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Other Mobile </span>
                            </label>
                        </div></div>   
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-2 m-0">
                        <label class="form-group  p-0   InputLabel w-100 m-0">
                            <input type="email" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Primary Email<sup>*</sup></span>
                            </label></div>
                            <div class="form-group col-md-2 m-0">
                        <label class="form-group  p-0   InputLabel w-100 m-0">
                            <input type="email" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Other Email</span>
                            </label>
                        </div></div> 
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-2 m-0">
                        <label class="form-group  p-0   InputLabel w-100 m-0">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Web Links</span>
                            </label></div>
                        </div> 
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-3 m-0">
                        <label class="form-group  p-0   InputLabel w-100 m-0">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">Salutation</span>
                            </label></div>
                            <div class="form-group col-md-3 m-0">
                        <label class="form-group  p-0   InputLabel w-100 m-0">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">First Name <sup>*</sup></span>
                            </label>
                        </div>
                        <div class="form-group col-md-3 m-0">
                            <label class="form-group  p-0   InputLabel w-100 m-0">
                                <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                                 <span class="AlterInputLabel">First Name <sup>*</sup></span>
                                </label>
                            </div>
                            <div class="form-group col-md-3 m-0">
                                <label class="form-group  p-0   InputLabel w-100 m-0">
                                    <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                                     <span class="AlterInputLabel">First Name <sup>*</sup></span>
                                    </label>
                                </div>
                    </div> 
                    <div class="form-row mt-4">
                        <div class="form-group col-md-3 m-0">
                    <label class="form-group  p-0   InputLabel w-100 m-0">
                        <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                         <span class="AlterInputLabel">Salutation</span>
                        </label></div>
                        <div class="form-group col-md-3 m-0">
                    <label class="form-group  p-0   InputLabel w-100 m-0">
                        <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                         <span class="AlterInputLabel">First Name <sup>*</sup></span>
                        </label>
                    </div>
                    <div class="form-group col-md-3 m-0">
                        <label class="form-group  p-0   InputLabel w-100 m-0">
                            <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                             <span class="AlterInputLabel">First Name <sup>*</sup></span>
                            </label>
                        </div>
                        <div class="form-group col-md-3 m-0">
                            <label class="form-group  p-0   InputLabel w-100 m-0">
                                <input type="text" class="form-control AlterInput w-100  "  placeholder="Ex : Something">
                                 <span class="AlterInputLabel">First Name <sup>*</sup></span>
                                </label>
                            </div>
                </div> 
                        <hr>
                </div>
                <div id="customButtons4">
                    <h4 class="pb-2">Step 4 Content</h4>
                    <form>
                        
                    </form>
                </div>
                <div id="customButtons5">
                    <h4 class="pb-2">Step 5 Content</h4>
                    <form>
                        <label class="form-group has-top-label">
                            <input class="form-control" />
                            <span>E-MAIL</span>
                        </label>

                        <label class="form-group has-top-label">
                            <input class="form-control" id="password" type="password" placeholder="" />
                            <span>PASSWORD</span>
                        </label>
                    </form>
                </div>
                <div id="customButtons6">
                    <h4 class="pb-2">Step 6 Content</h4>
                    <form>
                        <label class="form-group has-top-label">
                            <input class="form-control" />
                            <span>E-MAIL</span>
                        </label>

                        <label class="form-group has-top-label">
                            <input class="form-control" id="password" type="password" placeholder="" />
                            <span>PASSWORD</span>
                        </label>
                    </form>
                </div>
                <div id="customButtons7">
                    <h4 class="pb-2">Step 4 Content</h4>
                    <form>
                        <label class="form-group has-top-label">
                            <input class="form-control" />
                            <span>E-MAIL</span>
                        </label>

                        <label class="form-group has-top-label">
                            <input class="form-control" id="password" type="password" placeholder="" />
                            <span>PASSWORD</span>
                        </label>
                    </form>
                </div>
                <div id="customButtons8">
                    <h4 class="pb-2">Step 4 Content</h4>
                    <form>
                        <label class="form-group has-top-label">
                            <input class="form-control" />
                            <span>E-MAIL</span>
                        </label>

                        <label class="form-group has-top-label">
                            <input class="form-control" id="password" type="password" placeholder="" />
                            <span>PASSWORD</span>
                        </label>
                    </form>
                </div>
            </div>
          
            <div class="btn-toolbar custom-toolbar text-center card-body pt-0">
                <button class="propelbtn propelcurved  prev-btn propelback" type="button">Previous</button>
                <button class="propelbtn propelcurved next-btn propelsubmit" type="button">Contnue</button>
                <button class="propelbtn propelcurved reset-btn propelreset" type="submit">Reset</button>
            </div>

        </div>
    </div>
</div>
{{-- <style>
   
</style> --}}
@endsection