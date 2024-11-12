<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @error('error')
                    {{ $message }}
                    @enderror
                    <h1 class="text-white">You're logged in!</h1><br><br>
                    @if(auth()->user()->hasVerifiedEmail())
                        <h1 class="text-white">You're verified!</h1><br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
