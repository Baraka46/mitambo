<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Packages') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-background text-primary-foreground min-h-screen flex items-center justify-center">
                <div class="w-full max-w-7xl">
                    {{-- <h2 class="text-3xl font-semibold mb-4 text-blue-500">Packages</h2> --}}
                    <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="py-3 px-4 border-b text-left text-blue-700">Tracking ID</th>
                                <th class="py-3 px-4 border-b text-left text-blue-700">Godown</th>
                                <th class="py-3 px-4 border-b text-left text-blue-700">Section</th>
                                <th class="py-3 px-4 border-b text-left text-blue-700">Row</th>
                                <th class="py-3 px-4 border-b text-left text-blue-700">Position</th>
                                <th class="py-3 px-4 border-b text-left text-blue-700">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($godownPackages as $package)
                                <tr>
                                    <td class="py-3 px-4 border-b">{{ $package->tracking_id }}</td>
                                    <td class="py-3 px-4 border-b">{{ $package->godown }}</td>
                                    <td class="py-3 px-4 border-b">{{ $package->section }}</td>
                                    <td class="py-3 px-4 border-b">{{ $package->row }}</td>
                                    <td class="py-3 px-4 border-b">{{ $package->position }}</td>
                                    <td class="py-3 px-4 border-b">{{ $package->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
