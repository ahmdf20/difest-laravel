@php
@endphp

<ul class="menu p-4 w-80 min-h-full gap-3 bg-neutral text-neutral-100">
    @foreach ($sidebarMenu as $menu)
        @if (in_array(auth()->user()->role, $menu['access']))
            <li>
                <a class="{{ request()->routeIs($menu['path']) ? 'btn btn-primary' : '' }}"
                    href="{{ route($menu['path']) }}">{{ $menu['name'] }}</a>
            </li>
        @endif
    @endforeach
    <li><a onclick="confirmLogout()">Logout</a></li>
</ul>
