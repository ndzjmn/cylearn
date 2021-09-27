<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lessons List') }}
        </h2>
        <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/spruce@1.1.0/dist/spruce.umd.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('modules')
            </div>
        </div>
    </div>
</x-app-layout>
