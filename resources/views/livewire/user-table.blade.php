<div class="overflow-x-auto p-6">
    <!-- Edit Form -->
    @if ($isEditing)
        <table class="min-w-full bg-white border border-gray-300 rounded-lg my-10 shadow-md">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-700">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Username</th>
                    <th class="px-4 py-3">Phone</th>
                    <th class="px-4 py-3">Address</th>
                    <th class="px-4 py-3">Gender</th>
                    <th class="px-4 py-3">Active</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <form wire:submit.prevent="store">
                    <tr class="border-t bg-gray-50">
                        <td class="px-4 py-2">
                            <input type="text" class="w-full px-4 py-2 border rounded-lg" wire:model="name"
                                placeholder="Name">
                        </td>
                        <td class="px-4 py-2">
                            <input type="email" class="w-full px-4 py-2 border rounded-lg" wire:model="email"
                                placeholder="Email">
                        </td>
                        <td class="px-4 py-2">
                            <input type="text" class="w-full px-4 py-2 border rounded-lg" wire:model="username"
                                placeholder="Username">
                        </td>
                        <td class="px-4 py-2">
                            <input type="text" class="w-full px-4 py-2 border rounded-lg" wire:model="phone"
                                placeholder="Phone">
                        </td>
                        <td class="px-4 py-2">
                            <input type="text" class="w-full px-4 py-2 border rounded-lg" wire:model="address"
                                placeholder="Address">
                        </td>
                        <td class="px-4 py-2">
                            <select wire:model="gender" class="w-full px-4 py-2 border rounded-lg">
                                <option value="0">Female</option>
                                <option value="1">Male</option>
                            </select>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <input type="checkbox" value="1" wire:model="active"
                                class="h-5 w-5 text-indigo-600 rounded" {{ $active == 1 ? 'checked' : '' }}>
                        </td>
                        <td class="px-4 py-2">
                            <!-- Role Selection -->
                            <select wire:model="role_id" class="w-full px-4 py-2 border rounded-lg">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-4 py-2">
                            <button type="submit" wire:click="store"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                Save
                            </button>
                            <button type="button" wire:click="cancel"
                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                Cancel
                            </button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    @endif


    <!-- User Table -->
    <div class=" mb-2 flex justify-between">
        <div class="flex h-fit items-center">
            <input type="text" class="w-full px-4 py-2 border rounded-lg h-fit" wire:model.debounce.500ms="search"
                placeholder="search name or email">
            <p>{{ $search }}</p>
        </div>
        <div>
            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg" wire:click="showAll">Show All</button>
            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
                wire:click="toggleActive">{{ $isActive ? 'Inactive' : 'Active' }}</button>
        </div>
    </div>
    <table class="min-w-full bg-white border border-gray-300 shadow-lg shadow-slate-400">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Username</th>
                <th class="px-4 py-2">Phone</th>
                <th class="px-4 py-2">Address</th>
                <th class="px-4 py-2">Gender</th>
                <th class="px-4 py-2">Active</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-t">
                    <td class="px-4 py-2 text-center">{{ $user->name }}</td>
                    <td class="px-4 py-2 text-center">{{ $user->email }}</td>
                    <td class="px-4 py-2 text-center">{{ $user->username }}</td>
                    <td class="px-4 py-2 text-center">{{ $user->phone }}</td>
                    <td class="px-4 py-2 text-center">{{ $user->address }}</td>
                    <td class="px-4 py-2 text-center">{{ $user->gender ? 'Male' : 'Female' }}</td>
                    <td class="px-4 py-2 text-center">{{ $user->active ? 'Yes' : 'No' }}</td>
                    <td class="px-4 py-2 text-center">{{ $user->role->name }}</td>
                    <td class="px-4 py-2 text-center">
                        <button wire:click="edit({{ $user->id }})"
                            class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                        <button wire:click="destroy({{ $user->id }})"
                            class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $users->links() }} <!-- Pagination links -->
    </div>

</div>
