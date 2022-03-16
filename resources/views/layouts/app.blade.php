
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('images/logo.svg') }}">
    <link rel="icon" href="{{ asset('images/logo.svg') }}" type="image/png">
    <meta name="theme-color" content="#00C292">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @yield('styles')
</head>

<body>
    <div>
        @include('layouts.header')
        
        <x-loading />
        
        <!-- Page Content -->
        <main class="min-h-screen bg-secondary-light text-white">
            <div class="max-w-7xl mx-auto pt-5 px-2 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        @include('layouts.footer')
    </div>
    <!-- Scripts -->

    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ mix('js/common/loading.js') }}" defer></script>

    @yield('scripts')
</body>

</html>