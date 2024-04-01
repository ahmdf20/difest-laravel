<div class="navbar bg-neutral-800">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a
                        href="{{ request()->route()->getName() == 'landing.daftar-seminar' ? route('landing.index') : '#top-five' }}">Juara</a>
                </li>
                <li><a
                        href="{{ request()->route()->getName() == 'landing.daftar-seminar' ? route('landing.index') : '#sambutan-direktur' }}">Sambutan
                        Direktur</a></li>
                <li><a
                        href="{{ request()->route()->getName() == 'landing.daftar-seminar' ? route('landing.index') : '#tentang-difest' }}">Tentang
                        Difest</a></li>
                <li><a
                        href="{{ request()->route()->getName() == 'landing.daftar-seminar' ? route('landing.index') : '#perlombaan' }}">Perlombaan</a>
                </li>
                <li>
                    <a>Seminar</a>
                    <ul class="p-2">
                        <li><a href="#tentang-seminar">Tentang Seminar</a></li>
                        <li><a href="{{ route('landing.daftar-seminar') }}">Daftar Seminar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="flex gap-3">
            <img src="{{ asset('image/icon/difest.png') }}" alt="Logo Difest" width="50">
            <img src="{{ asset('image/icon/logo-himpunan.png') }}" alt="Logo HIMATIKOM" width="50">
            <a class="btn btn-ghost text-xl text-neutral-100" href="{{ route('landing.index') }}">DIFEST 5.0</a>
        </div>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li>
                <a
                    href="{{ request()->route()->getName() == 'landing.daftar-seminar' ? route('landing.index') : '#top-five' }}">Juara</a>
            </li>
            <li>
                <a
                    href="{{ request()->route()->getName() == 'landing.daftar-seminar' ? route('landing.index') : '#sambutan-direktur' }}">Sambutan
                    Direktur</a>
            </li>
            <li>
                <a
                    href="{{ request()->route()->getName() == 'landing.daftar-seminar' ? route('landing.index') : '#tentang-difest' }}">Tentang
                    Difest</a>
            </li>
            <li>
                <a
                    href="{{ request()->route()->getName() == 'landing.daftar-seminar' ? route('landing.index') : '#perlombaan' }}">Perlombaan</a>
            </li>
            <li>
                <details>
                    <summary>Seminar</summary>
                    <ul class="p-2">
                        <li>
                            <a
                                href="{{ request()->route()->getName() == 'landing.daftar-seminar' ? route('landing.index') : '#tentang-seminar' }}">Perlombaan</a>
                        </li>
                        <li><a href="{{ route('landing.daftar-seminar') }}">Daftar Seminar</a></li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
    <div class="navbar-end">
        @guest
            <a href="{{ route('login') }}" class="btn btn-success text-neutral-900">Login</a>
        @endguest
        @auth
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost text-neutral-100">
                    {{ auth()->user()?->name }}
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow rounded-box w-52 bg-neutral text-neutral-100">
                    <li>
                        <a class="justify-between" href="{{ route('user.profile') }}">
                            Profile
                        </a>
                    </li>
                    <li><a onclick="confirmLogout()">Logout</a></li>
                </ul>
            </div>
        @endauth
    </div>
</div>

<script>
    const confirmLogout = () => {
        Swal.fire({
            title: "Logout",
            text: "Apakah anda yakin ingin logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya"
        }).then((result) => {
            if (result.isConfirmed)
                window.location.href = `{{ config('app.url') }}/custom/logout`
        })
    }
</script>
