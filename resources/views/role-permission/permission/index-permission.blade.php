x-app-layout>
<div class="container mx-auto mt-5">
    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded mx-1">Roles</a>
    <a href="#" class="bg-teal-500 text-white px-4 py-2 rounded mx-1">Permissions</a>
    <a href="#" class="bg-yellow-500 text-white px-4 py-2 rounded mx-1">Users</a>
</div>
<div class="container mx-auto mt-6">
    @if (session()->has('success'))
    <div class="bg-green-200 text-green-800 px-4 py-2">
        {{ session('success') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="bg-red-200 text-red-800 px-4 py-2">
        {{ session('error') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white shadow-md rounded mt-3">
                <div class="px-4 py-2 border-b">
                    <h4 class="flex justify-between items-center">
                        Permissions
                        <a href="{{ url('permissions/create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add
                            Permission</a>
                    </h4>
                </div>
                <div class="p-4">
                    <table class="min-w-full border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border-b">Id</th>
                                <th class="border-b">Name</th>
                                <th class="border-b" width="40%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Boucle pour afficher chaque permission --}}
                            @foreach ($permissions as $index => $permission)
                            <tr class="text-center mt-2 {{ $index % 2 == 0 ? 'bggray-100' : 'bg-white' }}">
                                <td class="border-b py-3">{{ $permission->id }}</td>
                                <td class="border-b">{{ $permission->name }}</td>
                                <td class="border-b">
                                    {{-- Lien pour éditer la permission --}}
                                    <a href="{{ url('permissions/' .
$permission->id . '/edit') }}" class="bg-green-500 text-white my-5 px-2 py-1
rounded">Edit</a>
                                    {-- Lien pour supprimer la permission --}}
                                    <a href="{{ url('permissions/'.$permission->id.
'/delete') }}" class="bg-red-500 text-white px-2 py-1
rounded mx-2" onclick="return confirm('Êtes-vous sûr de
vouloir supprimer ce produit ?');">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>