<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-3">
                <div class="card bg-neutral-900 text-neutral-100 shadow-xl">
                    <div class="card-body">
                        <h1 class="text-3xl text-center">Selamat Datang {{ auth()->user()->name }}</h1>
                        <p class="text-center">Silahkan pilih menu disamping untuk mengakses menu lainnya👍</p>
                    </div>
                </div>
            </div>

            <div class="card bg-neutral-900 text-neutral-100 shadow-xl">
                <div class="card-body">
                    <h1 class="text-3xl text-center mb-5">🎉Berikut merupakan daftar peserta yang lolos 5 besar🎉</h1>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="overflow-x-auto w-full">
                            <table
                                class="table"
                                id="table_topfive"
                            >
                                <!-- head -->
                                <thead class="bg-neutral-100 text-neutral-900">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Asal Lomba</th>
                                        <th>Judul</th>
                                        <th>Sekola Asal</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-neutral-100 text-neutral-900">
                                    @foreach ($top5 as $key => $top)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <td>{{ $top->name }}</td>
                                        <td>{{ $top->from_competition }}</td>
                                        <td>{{ $top->judul }}</td>
                                        <td>{{ $top->asal_sekola }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
