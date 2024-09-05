<div class="max-w-lg mx-auto bg-white p-8 border shadow-lg shadow-slate-400 rounded">
    <div>
        <h1 class="text-3xl font-bold text-center">User Create</h1>
    </div>
    @if (session()->has('message'))
        <div class="text-green-500 font-bold">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store" class="space-y-6  p-6">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" wire:model="name"
                class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" id="username" wire:model="username"
                class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500">
            @error('username')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" wire:model="email"
                class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" wire:model="password"
                class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-semibold">
            Create User
        </button>
    </form>
</div>
