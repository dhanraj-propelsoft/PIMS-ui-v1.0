@include('layouts.modules.header')

@include('layouts.modules.side_menu')

<main>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
</main>

@include('layouts.modules.footer')