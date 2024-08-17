    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <input type="text" wire:model.live="search" placeholder="Search here..." class="border rounded px-4 py-2 mb-4">
            {{-- <div class="bg-background text-primary-foreground min-h-screen flex items-center justify-center"> --}}
            <div class="bg-background text-primary-foreground flex items-center justify-center">
                <div class="w-full max-w-7xl">
                    <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="py-3 px-4 border-b text-left text-blue-700">S/N</th>
                                <th class="py-3 px-4 border-b text-left text-blue-700">Customer Name</th>
                                <th class="py-3 px-4 border-b text-left text-blue-700">Shipping Number</th>
                                <th class="py-3 px-4 border-b text-left text-blue-700">S</th>
                                <th class="py-3 px-4 border-b text-left text-blue-700">M</th>
                                <th class="py-3 px-4 border-b text-left text-blue-700">Contact</th>
                                {{-- <th class="py-3 px-4 border-b text-left text-blue-700">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td class="py-3 px-4 border-b">{{ $result->id }}</td>
                                    <td class="py-3 px-4 border-b">{{ $result->customer_name }}</td>
                                    <td class="py-3 px-4 border-b">{{ $result->shipping_number }}</td>
                                    <td class="py-3 px-4 border-b">{{ $result->s }}</td>
                                    <td class="py-3 px-4 border-b">{{ $result->m }}</td>
                                    <td class="py-3 px-4 border-b">{{ $result->contact }}</td>
                                    {{-- <td class="py-3 px-4 border-b">
                                        <a href="{{ route('results.show', $result) }}" class="text-blue-500 hover:underline">View</a>
                                        <a href="{{ route('results.show', $result) }}" class="text-blue-500 hover:underline">View</a>
                                        <a href="{{ route('results.edit', $result) }}" class="text-blue-500 hover:underline ml-4">Edit</a>
                                        <form action="{{ route('results.destroy', $result) }}" method="POST" style="display:inline;"> 
                                        
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline ml-4" onclick="return confirm('Are you sure you want to delete this result?')">Delete</button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

