<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Propel Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css')}}" />
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
