<x-dashboard-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="bg-neutral p-3 rounded-lg max-w-xl mx-auto mt-5 text-neutral-100">
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl mb-4">Form Penilaian Karya</h1>
            <a href="{{ route('submission-grading') }}" class="btn btn-error btn-sm">&times;</a>
        </div>
        <hr class="py-4">
        <form action="{{ route('submission-grading.penilaian-karya.store', ['submission' => $submission->id]) }}"
            method="post" class="grid gap-3 p-2">
            @csrf
            @foreach ($grading_criterias as $key => $gc)
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">{{ $gc->label }}</span>
                    </div>
                    <input type="hidden" name="submission_grading[{{ $key }}]" value="{{ $gc->id }}">
                    <input type="text" placeholder="Masukkan Nilai" class="input input-bordered"
                        name="penilaian[{{ $gc->id }}]" value="{{ $submission_gradings[$key]->score ?? '' }}"
                        {{ empty($submission_gradings) ? '' : 'readonly' }} required />
                </label>
            @endforeach
            @if (empty($submission_gradings))
                <button class="btn btn-success">Submit Nilai</button>
            @endif
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
