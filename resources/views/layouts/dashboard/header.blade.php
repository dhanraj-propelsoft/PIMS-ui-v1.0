<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Propel Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css')}}" />
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/fullcalendar.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-float-label.min.css')}}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css')}}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/vendor/propelDropdownSearch.min.css')}}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css')}}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-datepicker3.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/dropzone.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-tagsinput.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/component-custom-switch.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-stars.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/cropper.min.css')}}" />

    <link rel="stylesheet" href="{{ asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dore.light.bluenavy.min.css')}}">
    {{-- New Style Added by Vallatharasu --}}
    <link rel="stylesheet" href="{{ asset('css/propel.theme.layout.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/propel.input.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/propel.table.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/propel.button.css')}}" />

    <link rel="shortcut icon" href="{{ asset('assets/images/logo.ico') }}" type="image/x-icon">  
    <link rel="icon" href="{{ asset('assets/images/logo.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/vendor/smart_wizard.min.css')}}" />

    
</head>

<body class="propel-spinner">
    <section class="spinner-container"><span class="loader-83"> </span></section>
    @include('layouts.dashboard.module-bar')
    
    <div class="propel-right-side">
        <div class="propel-top-bar d-flex justify-content-between align-items-center">
            <div class="propel-top-bar-left-side">
            <div class="propel-hamburger-menu " >
                <svg width="24" height="24" class="rotate-0" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg" onclick="rotate(this);">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor"></path>
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor"></path>
                </svg>
            </div>
            <div class="propel-arrow propel-left-arrow">
                <svg width="24" height="24" class="rotate-0" class="icon-menu" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg" >
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor"></path>
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor"></path>
                </svg>
            </div>
            <div class="propel-arrow propel-right-arrow">
                <svg width="24" height="24" class="rotate" class="icon-menu" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg" >
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor"></path>
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor"></path>
                </svg>
            </div>
            <button class="propelbtn propeliconbtn propelbtncurved propel-window-fullscreen">
                
            </button>
            <div class="propel-subscriber-container">
        
               
                <span class="demo">{{Session::get('organizationName')}}</span>
                
            </div>            
        </div>
            <div class="propel-brand-container ">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="Propel Brand Image" class="propel-logo-image">
                <div class="propel-brand">
                    <p class="propel-brand-name">Propel Soft</p>
                    <p class="propel-caption">Accelerating Business Ahead</p>
                </div>
            </div>
        </div>
        <script>
            function rotate(e) {
                $(e).toggleClass("rotate rotate-0");;
            }
        </script>
