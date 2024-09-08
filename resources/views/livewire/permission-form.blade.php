<div class="p-6 bg-slate-300">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="toggleCreate">Create
        Permission</button>
    @if ($createPermission)
        <livewire:permission-create />
    @endif
    <div class="mt-10">
        <livewire:permission-table />
    </div>
</div>
