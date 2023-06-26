
@error('success')
<div class="message-container success-message">
    <span class="message">{{ $message }}</span>
    <span class="close-parent message-close">X</span>
</div>
@enderror

@error('warning')
<div class="message-container warning-message">
    <span class="message">{{ $message }}</span>
    <span class="close-parent message-close">X</span>
</div>
@enderror

@error('danger')
<div class="message-container danger-message">
    <span class="message">{{ $message }}</span>
    <span class="close-parent message-close">X</span>
</div>
@enderror

@error('info')
<div class="message-container info-message">
    <span class="message">{{ $message }}</span>
    <span class="close-parent message-close">X</span>
</div>
@enderror

<script src="{{ asset('js/vendor/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('js/custom.js')}}"></script>
<script src="{{ asset('js/vendor/propelDropdownSearch.min.js')}}"></script>
<script src="{{ asset('js/vendor/bootstrap-datepicker.js')}}"></script>
{{-- Vallatharasu js File --}}
<script src="{{ asset('js/propel.login.js')}}"></script>
<script src="{{ asset('js/propel.theme.layout.js')}}"></script>
<script src="{{ asset('js/propel.button.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/propel.splash.js')}}"></script>
<script src="{{ asset('js/dore.script.js')}}"></script>

</body>

</html>
