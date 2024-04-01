<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ asset('image/icon/difest.png') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    {{-- <script src="{{ asset('build/assets/app-710b364f.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-286d727a.css') }}"> --}}
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- JQeury --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Data Tables --}}
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.tailwindcss.js"></script>

    {{-- Sweetalert 2 --}}
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    {{-- Custom --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Grandstander">
    <style>
        * {
            font-family: 'Grandstander', sans-serif;
        }

        body {
            scroll-behavior: smooth;
        }
    </style>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</head>

<body class="font-sans antialiased">
    @if (!in_array(request()->route()->getName(), ['login', 'custom.login']))
        @livewire('navbar-landing')
    @endif

    <main class="h-screen
    @if (in_array(request()->route()->getName(), ['login', 'custom.login'])) bg-neutral-100 @endif">
        {{ $slot }}

        @livewire('footer-landing')
    </main>

    @if (Session::get('message'))
        <script>
            Swal.fire({
                title: `{{ Session::get('title') }}`,
                icon: `{{ Session::get('icon') }}`,
                text: `{{ Session::get('message') }}`,
            })
        </script>
    @endif

    @livewireScripts
</body>

</html>
