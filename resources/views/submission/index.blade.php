<x-dashboard-layout>
    <div class="bg-neutral p-3 rounded-lg mx-auto max-w-5xl mt-5 text-neutral-100">
        <h1 class="text-3xl mb-4">Tabel Submissions</h1>
        <hr class="py-4">
        <div class="overflow-x-auto">
            <table class="table" id="example">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Karya dari</th>
                        <th>Dari Lomba</th>
                        <th>Karya</th>
                        <th>Deskripsi Karya</th>
                        <th>Surat Orisinil</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissions as $key => $submission)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $submission->user?->name }}</td>
                            <td>{{ $submission->user?->from_competition }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $submission->submission) }}" target="_blank"
                                    class="btn btn-success">Karya</a>
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $submission->submission_desc) }}" target="_blank"
                                    class="btn btn-success">Deskripsi Karya</a>
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $submission->orisinil) }}" target="_blank"
                                    class="btn btn-success">Surat Orisinil</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#example').DataTable()
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
