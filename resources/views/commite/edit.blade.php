<x-dashboard-layout>

    <x-slot name="title">{{ $title }}</x-slot>

    <div class="bg-neutral p-3 rounded-lg max-w-2xl mx-auto mt-5 text-neutral-100">
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl mb-4">Form Edit Commite</h1>
            <a href="{{ route('user.commite') }}" class="btn btn-error btn-sm">&times;</a>
        </div>
        <hr class="py-4">
        <form action="{{ route('user.commite.update', ['user' => $commite->id]) }}" method="post" class="grid gap-3 p-2">
            @method('PUT')
            @csrf
            <label class="input flex items-center gap-2">
                Username
                <input type="text" class="grow border-none" placeholder="Inputkan Username" name="username"
                    value="{{ $commite->username }}" readonly />
            </label>
            <label class="input flex items-center gap-2">
                Nama
                <input type="text" class="grow border-none" placeholder="Inputkan Nama" name="name"
                    value="{{ $commite->name }}" required />
            </label>
            <label class="input flex items-center gap-2">
                Email
                <input type="email" class="grow border-none" placeholder="example@example.com" name="email"
                    value="{{ $commite->email }}" readonly />
            </label>
            <label class="input flex items-center gap-2">
                No Telp
                <input type="text" class="grow border-none" placeholder="08XXXXXXX" name="phone"
                    value="{{ $commite->phone }}" readonly />
            </label>

            @php
                $competition = ['Karya Tulis Ilmiah', 'Cinematography', 'Mascot Design', 'Website Design'];
            @endphp

            <label class="input flex items-center gap-2">
                Dari Lomba
                <select class="select h-sm grow border-none" name="from_competition">
                    @foreach ($competition as $c)
                        <option value="{{ $c }}" {{ $commite->from_competition == $c ? 'selected' : '' }}>
                            {{ $c }}</option>
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
