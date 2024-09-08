<div class="p-6 bg-white shadow-md rounded w-fit mx-auto">
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Role Name:</label>
            <input type="text" id="name" wire:model="name"
                class="form-input mt-1 block  border-gray-300 rounded-md shadow-sm w-fit border">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Create Role
        </button>
    </form>

    <div class="flex">
        @foreach ($permissions as $per)
            <div class="m-2 px-4 py-2 rounded border w-fit">
                {{ $per->feature->name }} {{ $per->name }}
                <input type="checkbox" wire:click="addPermission({{ $per->id }})">
            </div>
        @endforeach
    </div>

</div>
