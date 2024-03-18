<div class="navbar bg-neutral">
    <div class="flex-1">

        <label
            for="my-drawer-2"
            class="btn drawer-button lg:hidden"
        >
            <i class="fa-solid fa-bars"></i>
        </label>

        <a class="btn btn-ghost text-xl text-neutral-100">DIFEST 5.0</a>
    </div>
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <div
                tabindex="0"
                role="button"
                class="btn btn-ghost text-neutral-100"
            >
                {{ auth()->user()->name }}
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow rounded-box w-52 bg-neutral text-neutral-100"
            >
                <li>
                    <a
                        class="justify-between"
                        href="{{ route('profile.show') }}"
                    >
                        Profile
                    </a>
                </li>
                <li><a onclick="confirmLogout()">Logout</a></li>
            </ul>
        </div>
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
            window.location.href = `http://127.0.0.1:8000/custom/logout`
        })
    }
</script>