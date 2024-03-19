<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="bg-neutral p-3 rounded-lg max-w-5xl mx-auto mt-5 text-neutral-100">
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl mb-4">Form Edit Kriteria Penilaian</h1>
            <a href="{{ route('grading-criteria') }}" class="btn btn-error btn-sm">&times;</a>
        </div>
        <hr class="py-4">
        <form action="{{ route('grading-criteria.update', ['grading_criteria' => $grading_criteria->id]) }}"
            method="post" class="grid gap-3 p-2">
            @method('PUT')
            @csrf
            <label class="input flex items-center gap-2">
                Lomba
                <select class="select h-sm grow border-none" name="competition">
                    <option disabled selected value="pilih">-- Pilih --</option>
                    @foreach ($competitions as $key => $competition)
                        <option value="{{ $competition->id }}"
                            {{ $grading_criteria->comp_id == $competition->id ? 'selected' : '' }}>
                            {{ $competition->comp_name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <label class="input flex items-center gap-2">
                Kriteria
                <input type="text" class="grow border-none" placeholder="Inputkan Kriteria penilaian lomba"
                    name="label" value="{{ $grading_criteria->label }}" required />
            </label>
            @php
                $criteria_type = ['Penilaian Karya', 'Penilaian Presentasi'];
            @endphp
            <label class="input flex items-center gap-2">
                Tipe Penilaian
                <select class="select h-sm grow border-none" name="criteria_type">
                    <option disabled selected value="pilih">-- Pilih --</option>
                    @foreach ($criteria_type as $ct)
                        <option value="{{ $ct }}"
                            {{ $ct == $grading_criteria->criteria_type ? 'selected' : '' }}>
                            {{ $ct }}</option>
                    @endforeach
                </select>
            </label>
            <button class="btn btn-success">Edit</button>
        </form>
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
