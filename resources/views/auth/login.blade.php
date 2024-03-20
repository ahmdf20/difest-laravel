<x-guest-layout>
    <x-slot name="title">{{ __('Digital Festival') }}</x-slot>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="flex gap-3">
                <img src="{{ asset('image/icon/logo-himpunan.png') }}" width="100" alt="Logo HIMATIKOM">
                <img src="{{ asset('image/icon/difest.png') }}" width="100" alt="Logo DIFEST">
            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('custom.login') }}">
            @csrf

            <div>
                <x-label for="username" value="{{ __('Username') }}" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

    @if (Session::get('message'))
        <script>
            Swal.fire({
                title: `{{ Session::get('title') }}`,
                text: `{{ Session::get('message') }}`,
                icon: `{{ Session::get('icon') }}`
            })
        </script>
    @endif

</x-guest-layout>
