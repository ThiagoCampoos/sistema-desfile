<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $metaDescription ?? 'Admin Dashboard' }}">
    <meta name="author" content="{{ $metaAuthor ?? 'Your Company' }}">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    @stack('styles') <!-- Estilos adicionais específicos para páginas -->
    @vite(['resources/js/app.js'])
    @vite(['resources/css/responsive.css'])
</head>
<body>
<!-- Layout Wrapper -->
<div id="layout-wrapper">
    <!-- Header -->
    <x-shared.navbar/>

    <!-- Sidebar -->
    <x-shared.sidebar/>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Conteúdo Dinâmico -->
                {{ $slot }}
            </div>
        </div>

        <!-- Footer -->
        <x-shared.footer/>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
@stack('scripts') <!-- Scripts adicionais específicos para páginas -->
</body>
</html>
