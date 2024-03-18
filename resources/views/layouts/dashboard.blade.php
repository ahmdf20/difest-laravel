<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    >
    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    />

    <link
        rel="shortcut icon"
        href="{{ asset('image/icon/difest.png') }}"
        type="image/x-icon"
    >

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    {{-- JQeury --}}
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>

    {{-- Data Tables --}}
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.tailwindcss.js"></script>

    {{-- Sweetalert 2 --}}
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')
        <div class="drawer lg:drawer-open">
            <input
                id="my-drawer-2"
                type="checkbox"
                class="drawer-toggle"
            />
            <div class="drawer-content">
                <!-- Page Content -->
                <main class="p-3">
                    {{ $slot }}
                </main>
            </div>
            <div class="drawer-side">
                <label
                    for="my-drawer-2"
                    aria-label="close sidebar"
                    class="drawer-overlay"
                ></label>
                <ul class="menu p-4 w-80 min-h-full gap-3 bg-neutral text-neutral-100">
                    <!-- Sidebar content here -->
                    <li>
                        <a
                            class="{{ request()->routeIs('user.dashboard') ? 'btn btn-primary' : '' }}"
                            href="{{ route('user.dashboard') }}"
                        >Dashboard</a>
                    </li>
                    <li><a>Commite</a></li>
                    <li><a>Judge</a></li>
                    <li>
                        <a
                            class="{{ request()->routeIs('user.participant') ? 'btn btn-primary' : '' }}"
                            href="{{ route('user.participant') }}"
                        >Participant</a>
                    </li>
                    <li><a>Karya</a></li>
                    <li><a>Penilaian Karya</a></li>
                    <li><a onclick="confirmLogout()">Logout</a></li>
                </ul>

            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>