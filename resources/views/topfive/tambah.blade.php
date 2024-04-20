<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="bg-neutral p-3 rounded-lg max-w-5xl mx-auto mt-5 text-neutral-100">
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl mb-4">Form Top Five</h1>
            <a
                href="{{ route('top-five') }}"
                class="btn btn-error btn-sm"
            >&times;</a>
        </div>
        <hr class="py-4">
        <form
            action="{{ route('top-five.store') }}"
            method="post"
            class="grid gap-3 p-2"
            enctype="multipart/form-data"
        >
            @csrf
            <label class="input flex items-center gap-2">
                Participant
                <select
                    class="select h-sm grow border-none"
                    name="participant"
                >
                    <option
                        selected
                        value="pilih"
                    >-- Pilih --</option>
                    @foreach ($participants as $key => $participant)
                    <option value="{{ $participant->id }}">{{ $participant->name }}</option>
                    @endforeach
                </select>
            </label>
            @error('participant')
            <small class="text-red-500">{{ $message }}</small>
            @enderror
            <label class="input flex items-center gap-2">
                Judul Karya
                <input
                    type="text"
                    class="grow border-none"
                    name="judul"
                />
            </label>
            @error('judul')
            <small class="text-red-500">{{ $message }}</small>
            @enderror
            <label class="input flex items-center gap-2">
                Asal Sekolah
                <input
                    type="text"
                    class="grow border-none"
                    name="asal_sekola"
                />
            </label>
            @error('asal_sekola')
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
