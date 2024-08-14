<x-guest-layout>
    <!-- Titre du formulaire -->
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">ISTE-SOFT - Register</h1>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <x-input-label for="name" :value="__('Name')" class="text-lg font-semibold text-gray-700" />
            <x-text-input id="name" class="block mt-1 w-full h-12 px-4 border-gray-300 bg-white rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                          type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 space-y-2">
            <x-input-label for="email" :value="__('Email')" class="text-lg font-semibold text-gray-700" />
            <x-text-input id="email" class="block mt-1 w-full h-12 px-4 border-gray-300 bg-white rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                          type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4 space-y-2">
            <x-input-label for="password" :value="__('Password')" class="text-lg font-semibold text-gray-700" />
            <x-text-input id="password" class="block mt-1 w-full h-12 px-4 border-gray-300 bg-white rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                          type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 space-y-2">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg font-semibold text-gray-700" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full h-12 px-4 border-gray-300 bg-white rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                          type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg px-6 py-3 shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
