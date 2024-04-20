<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="bg-neutral p-3 rounded-lg max-w-5xl mx-auto mt-5 text-neutral-100">
        <h1 class="text-3xl mb-4">Tabel Participant</h1>
        <hr class="py-4">
        <a
            class="btn btn-sm btn-success mb-3"
            href="{{ route('top-five.tambah') }}"
        >Tambah</a>
        <div class="overflow-x-auto w-full">
            <table
                class="table"
                id="table_topfive"
            >
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Asal Lomba</th>
                        <th>Judul</th>
                        <th>Sekola Asal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($top5 as $key => $top)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $top->user->name }}</td>
                        <td>{{ $top->user->from_competition }}</td>
                        <td>{{ $top->judul }}</td>
                        <td>{{ $top->asal_sekola }}</td>
                        <td>
                            <a
                                onclick="handleHapus({{ $top->id }})"
                                class="btn btn-error"
                            >Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#table_topfive').DataTable()

        function handleHapus(id)
        {
            Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda mungkin tidak dapat mengembalikan data yang telah dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ config('app.url') }}/top-five/${id}/hapus`,
                        method: 'POST',
                        data: {
                            _token: `{{ csrf_token() }}`,
                            _method: 'DELETE'
                        },
                        success:function(res) {
                            if (res.icon == 'success') {
                                Swal.fire({
                                    title: `${res.title}`,
                                    text: `${res.message}`,
                                    icon: `${res.icon}`
                                }).then((result2) => {
                                    if (result2.isConfirmed) {
                                        window.location.reload()
                                    }
                                });
                            }
                        },
                        error: function(error) {
                            console.error(error)
                        }
                    })
                }
            });
        }
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
