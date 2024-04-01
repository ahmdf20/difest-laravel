<section class="flex flex-wrap gap-[2.5rem] py-[5rem] items-center justify-center px-3 md:px-3 bg-neutral-100"
    id="perlombaan">
    @foreach ($lomba as $key => $l)
        <div class="card w-96 shadow-3xl h-[50rem] transition-transform transform hover:scale-105"
            id="lomba_{{ $key + 1 }}">
            <figure><img src="{{ asset('image' . $l->comp_image) }}" class="bg-neutral-200"
                    alt="Image of {{ $l->comp_name }}" />
            </figure>
            <div class="card-body bg-hijau-difest rounded-b-xl">
                <h2 class="card-title text-kuning-difest">{{ $l->comp_name }}</h2>
                <p class="text-neutral-950 text-justify">
                    {!! $l->comp_desc !!}
                </p>
            </div>
        </div>
    @endforeach
</section>
