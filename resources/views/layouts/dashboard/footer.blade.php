
</div>
</div>
</div>



<script src="{{ asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('js/vendor/moment.min.js')}}"></script>
<script src="{{ asset('js/vendor/fullcalendar.min.js')}}"></script>
<script src="{{ asset('js/vendor/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('js/vendor/datatables.min.js')}}"></script>
<script src="{{ asset('js/vendor/bootstrap-notify.min.js')}}"></script>
{{-- <script src="{{ asset('js/vendor/select2.full.js')}}"></script> --}}
<script src="{{ asset('js/vendor/propelDropdownSearch.min.js')}}"></script>
<script src="{{ asset('js/vendor/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('js/vendor/dropzone.min.js')}}"></script>
<script src="{{ asset('js/vendor/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ asset('js/vendor/nouislider.min.js')}}"></script>
<script src="{{ asset('js/vendor/jquery.barrating.min.js')}}"></script>
<script src="{{ asset('js/vendor/cropper.min.js')}}"></script>
<script src="{{ asset('js/vendor/typeahead.bundle.js')}}"></script>
<script src="{{ asset('js/vendor/mousetrap.min.js')}}"></script>
<script src="{{ asset('js/dore-plugins/select.from.library.js')}}"></script>
<script src="{{ asset('js/vendor/jquery.smartWizard.min.js')}}"></script>
<script src="{{ asset('js/dore.script.js')}}"></script>
{{-- <script src="{{ asset('js/scripts.js')}}"></script> --}}

<script type="text/javascript" src="{{ asset('js/sweetalert.js')}}"></script>


@if(session()->has('message'))
<div class="propel-alert-container">
<div class="propel-alert propel-alert-success"> 
    <p>
        {{ session()->get('message') }} 
       
    </p>

   <script>
    setTimeout(function(){
        
    $(".propel-alert-container").fadeOut(200);

}, 3500);
//popup parent Close
$('.propel-alert-container').click(function(){
    $(this).fadeOut(200);
});

   </script> 
</div>
</div>
@endif
{{-- " <div class='default-alert-container'></div><div class='default-alert card'><div class='card-header'>Propel Soft Says</div><div><p>"+info+"</p></div></div>" --}}
<div class="default-alert-container">
 <div class='default-alert card'>
    <div class='card-header text-white p-2 default-alert-header'>Propel Soft Says </div>
    <div>
        <p class="propel-alert-info"></p> 
    </div>
    <p class="default-alert-btns row justify-content-around w-100 m-auto">
        <button class="propelbtn propelsubmit propel-hover  w-30 float-right" onclick="closeSuperGrandpa(this)">Close</button>
    </p> 
</div>
</div>
</div>
{{-- new Active js Added by Vallatharsu --}}

<script type="text/javascript" src="{{ asset('js/propel.splash.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/propel.button.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/propel.theme.layout.js')}}"></script>
</body>

</html>
