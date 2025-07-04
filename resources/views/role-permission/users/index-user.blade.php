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
                    Permissions
                    <a href="{{route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Add User
                    </a>
                </h4>
            </div>

            <div class="p-4">
                <table class="min-w-full border border-gray-300 dark:border-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                        <tr>
                            <th class="border-b dark:border-gray-600">Id</th>
                            <th class="border-b dark:border-gray-600">Name</th>
                            <th class="border-b dark:border-gray-600">Email</th>
                            <th class="border-b dark:border-gray-600">Roles</th>
                            <th class="border-b dark:border-gray-600" width="40%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr
                            class="text-center {{ $index % 2 == 0 ? 'bg-gray-100 dark:bg-gray-800' : 'bg-white dark:bg-gray-900' }}">
                            <td class="border-b dark:border-gray-700 py-3">{{ $user->id }}</td>
                            <td class="border-b dark:border-gray-700">{{ $user->name }}</td>
                            <td class="border-b dark:border-gray-700">{{ $user->email }}</td>
                            <td class="border-b dark:border-gray-700">-----</td>
                            {{-- <td class="border-b dark:border-gray-700">{{ $user->role }}</td> --}}
                            <td class="border-b dark:border-gray-700">

                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="bg-green-500 text-white px-2 py-1 rounded">
                                    Edit</a>



                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button href="{{ route('users.destroy', $user->id) }}"
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