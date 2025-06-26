<x-app-layout>
    <div class="container mx-auto mt-6">
        <div class="row">
            <div class="col-md-12">
                {{-- Affichage des erreurs de validation, le cas échéant --}}
                @if ($errors->any())
                <ul class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative"
                    role="alert">

                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="bg-white shadow-md rounded mt-3">
                    <div class="px-4 py-2 border-b">
                        <h4 class="flex justify-between items-center">
                            update Roles
                            <a href="{{ route('roles.index') }}" class="bg-red-500
text-white px-4 py-2 rounded">Back</a>
                        </h4>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Role
                                    Name</label>
                                <input type="text" id="name" name="name"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    value="{{ $role->name }}" required>

                                @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2
rounded">update Role</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>