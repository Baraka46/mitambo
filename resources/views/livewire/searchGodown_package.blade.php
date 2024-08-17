    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <input type="text" wire:model.live="search" placeholder="Search here..." class="border rounded px-4 py-2 mb-4">
            <div class="bg-background text-primary-foreground flex items-center justify-center">
                <div class="w-full max-w-7xl">
                    {{-- <h2 class="text-3xl font-semibold mb-4 text-blue-500">results</h2> --}}
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
                            @foreach ($results as $result)
                                <tr>
                                    <td class="py-3 px-4 border-b">{{ $result->tracking_id }}</td>
                                    <td class="py-3 px-4 border-b">{{ $result->godown }}</td>
                                    <td class="py-3 px-4 border-b">{{ $result->section }}</td>
                                    <td class="py-3 px-4 border-b">{{ $result->row }}</td>
                                    <td class="py-3 px-4 border-b">{{ $result->position }}</td>
                                    <td class="py-3 px-4 border-b">{{ $result->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if($results->hasPages())
        {{ $results->links() }}
        @endif
    </div>
