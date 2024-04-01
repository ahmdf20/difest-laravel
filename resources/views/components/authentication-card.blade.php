<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-nautral-100">
    <div>
        {{ $logo }}
    </div>

    <div
        class="w-full sm:max-w-md mt-6 px-6 py-4 bg-neutral-200 shadow-lg overflow-hidden sm:rounded-lg text-neutral-900">
        {{ $slot }}
    </div>
</div>
