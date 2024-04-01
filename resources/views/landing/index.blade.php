<x-guest-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    {{-- Section Top Five --}}
    @livewire('page.section-top-five')

    {{-- Section Direktur --}}
    @livewire('page.section-direktur')

    {{-- Section Difest --}}
    @livewire('page.section-difest')

    @livewire('page.section-lomba')

    @livewire('page.section-about-seminar')

</x-guest-layout>
