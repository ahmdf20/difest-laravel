<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="bg-neutral p-3 rounded-lg mx-auto max-w-5xl mt-5 text-neutral-100">
        <h1 class="text-3xl mb-4">Tabel Pendaftar Seminar</h1>
        <hr class="py-4">
        <div class="overflow-x-auto">
            <table
                class="table"
                id="table_seminar"
            >
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pendaftar</th>
                        <th>Status</th>
                        <th>Asal Instansi</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Kedatangan</th>
                        <th>Metode Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seminars as $key => $s)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->status == '0' ? 'Pelajar / Mahasiswa' : 'Umum' }}</td>
                        <td>{{ $s->instance ? $s->instance : 'Tidak ada' }}</td>
                        <td>{{ $s->address ? $s->address : 'Tidak ada' }}</td>
                        <td>{{ $s->phone }}</td>
                        <td>{{ $s->is_offline == '0' ? 'Offline' : 'Online' }}</td>
                        <td>
                            @switch($s->payment_method)
                            @case('0')
                            Cash
                            @break
                            @case('1')
                            Transfer
                            @break
                            @default
                            Tidak ada
                            @endswitch
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#table_seminar').DataTable()
    </script>

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