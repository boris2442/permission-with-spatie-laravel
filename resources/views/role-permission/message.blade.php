  @if (session()->has('success'))
        <div class="bg-green-200 text-green-800 dark:bg-green-700 dark:text-white px-4 py-2">
            {{ session('success') }}
        </div>
        @endif
        @if (session()->has('error'))
        <div class="bg-red-200 text-red-800 dark:bg-red-700 dark:text-white px-4 py-2">
            {{ session('error') }}
        </div>
        @endif