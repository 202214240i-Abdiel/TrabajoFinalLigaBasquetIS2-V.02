<x-guest-layout>
    <h2 style="text-align:center; margin-bottom: 20px;">Recuperar contraseña</h2>

    <div class="mb-4 text-sm text-gray-600">
        Escribe tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" value="Correo electrónico" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Enviar enlace
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
