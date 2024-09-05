<div class="flex flex-col items-center space-y-4 p-6 bg-gray-100 rounded-lg shadow-md">
    <h1 class="text-4xl font-bold text-gray-800">{{ $count }}</h1>

    <div class="flex space-x-4">
        <button class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition"
            wire:click="increment">+</button>
        <button class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-700 transition"
            wire:click="decrement">-</button>
    </div>

    @if ($error)
        <h2 class="text-red-500 text-lg font-medium">{{ $error }}</h2>
    @endif
</div>
