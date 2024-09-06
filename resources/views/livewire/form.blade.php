<div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        wire:click="toggleCreate">{{ $btnText }}</button>
    @if ($create)
        <livewire:user-create />
    @endif
    <h1 class="w-fit mx-auto px-5 py-2 text-2xl rounded-lg mt-20 bg-white">User Data Table</h1>
    <livewire:user-table />
</div>
