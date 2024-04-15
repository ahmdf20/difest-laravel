<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="bg-neutral p-3 rounded-lg mx-auto max-w-7xl mt-5 text-neutral-100">
        <h1 class="text-3xl mb-4">Tabel Penilian Karya</h1>
        <hr class="py-4">
        <div class="overflow-x-auto h-96">
            <table class="table table-pin-rows">
                @foreach ($submission_grading as $key => $sg)
                <thead>
                    <tr>
                        <th>
                            {{ $sg->user->name }}
                            <br>
                            {{ $sg->grading_criteria->criteria_type }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $sg->grading_criteria->label }}</td>
                    </tr>
                    <tr>
                        <td>{{ $sg->score }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-dashboard-layout>
