<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card bg-neutral shadow-xl">
                    <div class="card-body">
                        <h1 class="text-3xl text-center">Selamat Datang {{ auth()->user()->name }}</h1>
                        <p class="text-center">Silahkan pilih menu disamping untuk mengakses menu lainnya👍</p>
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
