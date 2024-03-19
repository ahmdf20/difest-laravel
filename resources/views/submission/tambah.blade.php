<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="bg-neutral p-3 rounded-lg max-w-5xl mx-auto mt-5 text-neutral-100">
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl mb-4">Form Karya Peserta</h1>
            <a href="{{ route('submission') }}" class="btn btn-error btn-sm">&times;</a>
        </div>
        <hr class="py-4">
        <form action="{{ route('submission.store') }}" method="post" class="grid gap-3 p-2" enctype="multipart/form-data">
            @csrf
            <label class="input flex items-center gap-2">
                Participant
                <select class="select h-sm grow border-none" name="participant">
                    <option selected value="pilih">-- Pilih --</option>
                    @foreach ($participants as $key => $participant)
                        <option value="{{ $participant->id }}">{{ $participant->name }}</option>
                    @endforeach
                </select>
            </label>
            @error('participant')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <small></small>
            <label class="input flex items-center gap-2">
                Dari Lomba
                <select class="select h-sm grow border-none" name="competition">
                    <option selected value="pilih">-- Pilih --</option>
                    @foreach ($competitions as $key => $competition)
                        <option value="{{ $competition->id }}">{{ $competition->comp_name }}</option>
                    @endforeach
                </select>
            </label>
            @error('competition')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <label class="input flex items-center gap-2">
                Karya
                <input type="file" class="file-input file-input-ghost grow border-none" name="submission" />
            </label>
            @error('submission')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <label class="input flex items-center gap-2">
                Deskripsi Karya
                <input type="file" class="file-input file-input-ghost grow border-none" name="submission_desc" />
            </label>
            @error('submission_desc')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <label class="input flex items-center gap-2">
                Surat Orisinil
                <input type="file" class="file-input file-input-ghost grow border-none" name="orisinil" />
            </label>
            @error('orisinil')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
            <button class="btn btn-success">Tambah</button>
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
