<x-app-layout>
    <div class="container mx-auto mt-5 flex justify-between items-center">
        {{-- @include('role-permission.nav') --}}
        <button id="toggleDarkMode" class="bg-gray-800 text-white px-4 py-2 rounded">
            🌙 Mode Sombre
        </button>
    </div>

    <div class="container mx-auto mt-6 dark:text-white dark:bg-gray-900">
        @include('role-permission.message')

        <div class="bg-white dark:bg-gray-800 shadow-md rounded mt-3">
            <div class="px-4 py-2 border-b dark:border-gray-600">
                <h4 class="flex justify-between items-center text-black dark:text-white">
                    Create User
                    {{-- If you want to add a link to the user index page, you can uncomment the line below --}}
                    {{-- <a href="{{ route('users.index') }}" class="text-blue-500">Back to Users</a> --}}
                    <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Add User
                    </a>
                </h4>
            </div>

            <div class="p-4">
                  <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Name</label>
                                <input type="text" id="name" name="name"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    value="{{ old('name') }}" required>

                                @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Email</label>
                                <input type="email" id="email" name="email"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    value="{{ old('email') }}" required>

                                @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2
rounded">Create users</button>

                        </form>
            </div>
        </div>
    </div>

    {{-- Script de basculement en mode sombre --}}
    <script>
        const toggle = document.getElementById('toggleDarkMode');
        const html = document.documentElement;

        // charger l'état du localStorage
        if (localStorage.getItem('theme') === 'dark') {
            html.classList.add('dark');
        }

        toggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            // stocker le thème
            if (html.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
</x-app-layout>