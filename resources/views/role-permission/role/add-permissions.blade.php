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
                    Roles : {{$role->name}}
                    <a href="{{route('roles.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">
                        Back To roles
                    </a>
                </h4>
            </div>

            <div class="p-4">
                <form method="POST" action="{{ route('roles.givePermissionToRole', $role->id) }}">
                    @method('PATCH')
                    @csrf
                    <label for="">Permissions</label>
                    <div class='grid mt-5 grid-cols-3 gap-3 my-5'>
                        @foreach($permissions as $permission)
                        <div class='flex'>
                            <label for="permission" class='flex'></label>
                            <input type="checkbox" name="permission[]" {{in_array($permission->id, $rolePermissions)?
                            'checked' : ''}}

                            class=""
                            id="permission"
                            value="{{$permission->name}}"
                            />
                            <span class='ml-2 text-gray-600'> {{$permission->name}}</span>
                        </div>
                        @endforeach

                    </div>

                    <button type="submit" href="{{route('roles.index') }}"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Update
                    </button>
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