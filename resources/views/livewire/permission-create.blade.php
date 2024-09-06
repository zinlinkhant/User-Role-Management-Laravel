<div class="p-6 max-w-lg mx-auto bg-white rounded-lg shadow-md">
    <h1 class="text-xl font-bold mb-4">Create Permission</h1>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Permission Name:</label>
            <input id="name" type="text" wire:model="name" class="form-input mt-1 block w-full"
                placeholder="Enter permission name">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="feature_id" class="block text-sm font-medium text-gray-700">Feature:</label>
            <select id="feature_id" wire:model="feature_id" class="form-select mt-1 block w-full">
                <option value="">Select a feature</option>
                @foreach ($features as $feature)
                    <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                @endforeach
            </select>
            @error('feature_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Create Permission
        </button>
    </form>
</div>
