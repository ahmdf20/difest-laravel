<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="bg-neutral p-3 rounded-lg max-w-7xl mx-auto mt-5 text-neutral-100">
        <h1 class="text-3xl mb-4">Tabel Kriteria Penilaian</h1>
        <hr class="py-4">
        <a class="btn btn-sm btn-success mb-3" href="{{ route('grading-criteria.tambah') }}">Tambah Kriteria</a>
        <div class="overflow-x-auto w-full">
            <table class="table" id="table_judge">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Lomba</th>
                        <th>Kriteria Penilaian</th>
                        <th>Tipe Penilaian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grading_criterias as $key => $gc)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $gc->comp_name }}</td>
                            <td>{{ $gc->label }}</td>
                            <td>{{ $gc->criteria_type }}</td>
                            <td>
                                <div class="dropdown dropdown-hover">
                                    <div tabindex="0" role="button" class="btn m-1">Opsi</div>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                        <li><a
                                                href="{{ route('grading-criteria.edit', ['grading_criteria' => $gc->gc_id]) }}">Edit</a>
                                        </li>
                                        <li><a onclick="handleDelete({{ $gc->gc_id }})">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $('#table_judge').DataTable()

        const handleDelete = (id) => {
            Swal.fire({
                title: "Menghapus data",
                text: "Anda yakin untuk menghapus data ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `http://127.0.0.1:8000/grading-criteria/${id}/hapus`
                }
            })
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
