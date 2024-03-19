<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="bg-neutral p-3 rounded-lg max-w-5xl mx-auto mt-5 text-neutral-100">
        <h1 class="text-3xl mb-4">Tabel Participant</h1>
        <hr class="py-4">
        <div class="overflow-x-auto w-full">
            <table class="table" id="table_participant">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Dari Lomba</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $key => $participant)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $participant->username }}</td>
                            <td>{{ $participant->name }}</td>
                            <td>{{ $participant->email }}</td>
                            <td>{{ $participant->from_competition }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#table_participant').DataTable()
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
