<nav class="bg-gray-800 p-4 shadow-lg">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo/Brand Name -->
        <div class="text-white text-2xl font-semibold">

        </div>

        <!-- Navigation Buttons -->
        <div class="space-x-4">
            <a href="{{ route('register') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Register
            </a>
            <a href="{{ route('user') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                User
            </a>
            <a href="{{ route('role') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Role
            </a>
            <a href="{{ route('permission') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Permission
            </a>
        </div>
    </div>
</nav>
