<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Managing Roles and permissions') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg mt-10 mb-10">
        {{-- <h1 class="text-4xl font-extrabold mb-8 text-center text-blue-600">Create Roles and Permissions</h1> --}}

        <!-- Display success message -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-200 border border-green-300 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @endif

      <!-- Container for both forms -->
<div class="flex flex-wrap justify-between mb-10">

    <!-- Form for creating roles -->
    <div class="w-full md:w-1/2 pr-2">
        <div class="text-3xl font-semibold mb-4 text-blue-500">Create Role</div>
        <form action="{{ route('create.role') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <input type="text" name="role" placeholder="Role name" required class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="px-5 py-3 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">Create Role</button>
        </form>
    </div>

    <!-- Form for creating permissions -->
    <div class="w-full md:w-1/2 pl-2">
        <div class="text-3xl font-semibold mb-4 text-blue-500">Create Permission</div>
        <form action="{{ route('create.permission') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <input type="text" name="permission" placeholder="Permission name" required class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="px-5 py-3 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">Create Permission</button>
        </form>
    </div>
</div>


       <!-- Container for displaying roles and permissions tables -->
<div class="flex flex-wrap justify-between mb-10">
    <!-- Display roles -->
    <div class="w-full md:w-1/2 pr-2">
        <h2 class="text-3xl font-semibold mb-4 text-blue-500">Roles</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
            <thead class="bg-blue-100">
                <tr>
                    <th class="py-3 px-4 border-b text-left text-blue-700">ID</th>
                    <th class="py-3 px-4 border-b text-left text-blue-700">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="py-3 px-4 border-b">{{ $role->id }}</td>
                        <td class="py-3 px-4 border-b">{{ $role->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Display permissions -->
    <div class="w-full md:w-1/2 pl-2">
        <h2 class="text-3xl font-semibold mb-4 text-blue-500">Permissions</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
            <thead class="bg-blue-100">
                <tr>
                    <th class="py-3 px-4 border-b text-left text-blue-700">ID</th>
                    <th class="py-3 px-4 border-b text-left text-blue-700">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td class="py-3 px-4 border-b">{{ $permission->id }}</td>
                        <td class="py-3 px-4 border-b">{{ $permission->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

        <!-- Display users with role assignment options -->
        <div>
            <h2 class="text-3xl font-semibold mb-4 text-blue-500">Users</h2>
            <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="py-3 px-4 border-b text-left text-blue-700">Name</th>
                        <th class="py-3 px-4 border-b text-left text-blue-700">Email</th>
                        <th class="py-3 px-4 border-b text-left text-blue-700">Roles</th>
                        <th class="py-3 px-4 border-b text-left text-blue-700">Assign Role</th>
                        <th class="py-3 px-4 border-b text-left text-blue-700">Remove Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="py-3 px-4 border-b">{{ $user->name }}</td>
                            <td class="py-3 px-4 border-b">{{ $user->email }}</td>
                            <td class="py-3 px-4 border-b">
                                @foreach ($user->roles as $role)
                                    <span class="inline-block px-3 py-1 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full mr-2">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="py-3 px-4 border-b">
                                <form action="{{ route('assign.role', $user->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div>
                                        <select name="role" class="p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option value="" disabled selected>Select Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md shadow hover:bg-green-700">Assign Role</button>
                                </form>
                            </td>
                            <td class="py-3 px-4 border-b">
                                <form action="{{ route('remove.role', $user->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div>
                                        <select name="role" class="p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option value="" disabled selected>Select Role</option>
                                            @foreach($user->roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md shadow hover:bg-red-700">Remove Role</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Section visible to admin users only -->
        @role('admin')
        <div class="mb-8 mt-12 p-4 bg-blue-50 border border-blue-200 rounded-md">
            <h2 class="text-2xl font-semibold mb-4 text-blue-600">Admin Section</h2>
            <p class="text-gray-700">This section is only visible to admin users.</p>
        </div>
        @endrole

        <!-- Section visible to non-admin users -->
        @unlessrole('admin')
        <div class="mb-8 mt-12 p-4 bg-yellow-50 border border-yellow-200 rounded-md">
            <h2 class="text-2xl font-semibold mb-4 text-yellow-600">Non-Admin Section</h2>
            <p class="text-gray-700">This section is visible to users who are not admins.</p>
        </div>
        @endunlessrole
    </div>

</x-app-layout>
