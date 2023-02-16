<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }} , {{Auth::user()->name}}
        </h2>
        <p>Here You can manage your account.</p>
    </x-slot>
</x-app-layout>

