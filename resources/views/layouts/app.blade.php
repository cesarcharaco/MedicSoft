<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MedicSoft</title>

    @include('layouts.partials.html-header')
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="Wrapper">

    @include('layouts.partials.mainheader')
    <!-- Left side column. contains the logo and sidebar -->

    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        {{-- @include('layouts.partials.contentheader') --}}
        
        <section class="content">
            <div class="row">
                @yield('content')
            </div>
        </section>
    </div>
    
    @include('layouts.partials.footer')
</div>

@include('layouts.partials.scripts')
</body>
</html>
