<div class="p-6 max-w-7xl mx-auto bg-white rounded-lg shadow-md">
    <h1 class="text-xl font-bold mb-4">Permissions Table</h1>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    @if ($editMode)
        <div class="mb-6 p-6 border rounded shadow-lg">
            <h2 class="text-lg font-semibold mb-2">Edit Permission</h2>
            <form wire:submit.prevent="update">
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
                    Update Permission
                </button>
                <button type="button" wire:click="$set('editMode', false)"
                    class="ml-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cancel
                </button>
            </form>
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-300 shadow-lg shadow-slate-400">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="text-center px-4 py-2 border-b">Name</th>
                <th class="text-center px-4 py-2 border-b">Feature</th>
                <th class="text-center px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr class="border-t hover:bg-gray-50">
                    <td class="text-center px-4 py-2 border-b">{{ $permission->name }}</td>
                    <td class="text-center px-4 py-2 border-b">
                        {{ $permission->feature->name }}
                    </td>
                    <td class="text-center px-4 py-2 border-b">
                        <button wire:click="edit({{ $permission->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                        <button wire:click="delete({{ $permission->id }})"
                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $permissions->links() }}
    </div>
</div>
