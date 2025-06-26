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
                    Roles
                    <a href="{{route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Add Role
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
                        @foreach ($roles as $index => $role)
                        <tr
                            class="text-center {{ $index % 2 == 0 ? 'bg-gray-100 dark:bg-gray-800' : 'bg-white dark:bg-gray-900' }}">
                            <td class="border-b dark:border-gray-700 py-3">{{ $role->id }}</td>
                            <td class="border-b dark:border-gray-700">{{ $role->name }}</td>
                            <td class="border-b dark:border-gray-700">
                                <a href="{{ route('roles.edit', $role->id) }}"
                                    class="bg-green-500 text-white px-2 py-1 rounded">
                                    Edit</a>



                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button href="{{ route('roles.destroy', $role->id) }}"
                                        class="bg-red-500 text-white px-2 py-1 rounded mx-2"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                        Delete
                                    </button>
                                </form>
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