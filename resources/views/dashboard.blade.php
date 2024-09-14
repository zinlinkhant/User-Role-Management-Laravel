<x-header>

    <livewire:layout.navigation />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Your username is {{ Auth::user()->name }} <br>
                    You are {{ Auth::user()->role->name }}
                </div>
            </div>
        </div>
    </div>

</x-header>
