<div class="min-h-screen w-full bg-gray-300 p-6">
    <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
        wire:click="toggleBtn">{{ $btnCon }}</button>
    @if ($btnCon == 'show')
        <livewire:role-create />
    @endif
    <livewire:role-table />
</div>
