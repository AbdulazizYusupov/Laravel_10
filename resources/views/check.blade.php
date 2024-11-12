<x-guest-layout>

    <form method="POST" action="{{ route('check') }}">
        @csrf
        <div>
            <x-input-label for="value" :value="__('Code')"/>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <x-text-input id="value" class="block mt-1 w-full" type="number" name="value" required></x-text-input>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Check') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

