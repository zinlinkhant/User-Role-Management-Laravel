<div>
    @if ($editMode)
        <form wire:submit.prevent="update" class="p-6 bg-white shadow-md rounded my-10">
            <div class="mt-5">
                <label for="name">Role Name</label>
                <input type="text" wire:model="name" id="name" class="border px-4 py-2 rounded w-full">
            </div>

            <label for="permissions">Permissions</label>
            <ul class="flex gap-4">
                @foreach ($allPermissions as $permission)
                    <li>
                        <input type="checkbox" wire:model="permissionsSelected" value="{{ $permission->id }}">
                        {{ $permission->name }}
                    </li>
                @endforeach
            </ul>
            <div class="mt-5">
                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                    Update
                </button>
                <button type="button" wire:click="$set('editMode', false)"
                    class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600">
                    Cancel
                </button>
            </div>
        </form>
    @endif




    <h1 class="w-fit px-5 py-2 text-2xl rounded-lg mt-20 bg-white mb-5">Role Data Table</h1>
    <table class="min-w-full bg-white border border-gray-300 shadow-lg shadow-slate-400">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="text-center px-4 py-2 border-b">Role Name</th>
                <th class="text-center px-4 py-2 border-b">Permissions</th>
                <th class="text-center px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr class="border-t hover:bg-gray-50">
                    <td class="text-center px-4 py-2 border-b">{{ $role->name }}</td>
                    <td class="text-center px-4 py-2 border-b flex justify-center">
                        <ul class=" ml-5 flex gap-4">
                            @foreach ($role->permissions as $per)
                                <li class="border px-2 py-1 border-slate-400 rounded">{{ $per->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="text-center px-4 py-2 border-b text-center">
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600"
                            wire:click="edit({{ $role->id }})">Edit</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                            wire:click="destroy({{ $role->id }})"
                            onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
