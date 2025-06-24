<x-app-layout>
    <div class="container mx-auto mt-5 flex justify-between items-center">
        @include('role-permission.nav')
        <button id="toggleDarkMode" class="bg-gray-800 text-white px-4 py-2 rounded">
            🌙 Mode Sombre
        </button>
    </div>

    <div class="container mx-auto mt-6 dark:text-white dark:bg-gray-900">
        @include('role-permission.message')

        <div class="bg-white dark:bg-gray-800 shadow-md rounded mt-3">
            <div class="px-4 py-2 border-b dark:border-gray-600">
                <h4 class="flex justify-between items-center text-black dark:text-white">
                    Permissions
                    <a href="{{ url('permissions/create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Add Permission
                    </a>
                </h4>
            </div>

            <div class="p-4">
                <table class="min-w-full border border-gray-300 dark:border-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                        <tr>
                            <th class="border-b dark:border-gray-600">Id</th>
                            <th class="border-b dark:border-gray-600">Name</th>
                            <th class="border-b dark:border-gray-600" width="40%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $index => $permission)
                        <tr
                            class="text-center {{ $index % 2 == 0 ? 'bg-gray-100 dark:bg-gray-800' : 'bg-white dark:bg-gray-900' }}">
                            <td class="border-b dark:border-gray-700 py-3">{{ $permission->id }}</td>
                            <td class="border-b dark:border-gray-700">{{ $permission->name }}</td>
                            <td class="border-b dark:border-gray-700">
                                <a href="{{ url('permissions/' . $permission->id . '/edit') }}"
                                    class="bg-green-500 text-white px-2 py-1 rounded">Edit</a>
                                <a href="{{ url('permissions/' . $permission->id . '/delete') }}"
                                    class="bg-red-500 text-white px-2 py-1 rounded mx-2"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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