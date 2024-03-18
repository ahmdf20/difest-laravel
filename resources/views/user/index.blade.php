<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card w-96 bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Selamat Datang {{ auth()->user()->name }}</h2>
                        <p>Silahkan pilih menu disamping untuk mengakses menu lainnya👍</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Session::get('message'))
    <script>
        Swal.fire({
            title: `{{ Session::get('title') }}`,
            text: `{{ Session::get('message') }}`,
            icon: `{{ Session::get('icon') }}`
        })
    </script>
    @endif
</x-dashboard-layout>