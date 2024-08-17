@extends('layouts.myjetlayout', ['subheading' => 'Packages'])

@section('content')

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-background text-primary-foreground min-h-screen flex items-center justify-center">
                <div class="w-full max-w-7xl">
                    {{-- Search Form --}}
                    <form id="search-form" class="mb-4 flex items-center">
                        <input type="text" name="tracking_id" id="tracking_id" placeholder="Tracking ID" class="border rounded px-4 py-2 mr-2" value="{{ request('tracking_id') }}">
                        <input type="text" name="godown" id="godown" placeholder="Godown" class="border rounded px-4 py-2 mr-2" value="{{ request('godown') }}">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
                    </form>

                    {{-- Packages Table --}}
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
                        <tbody id="packages-table-body">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('search-form');
            const inputs = form.querySelectorAll('input');
            const tbody = document.getElementById('packages-table-body');

            inputs.forEach(input => {
                input.addEventListener('keyup', function () {
                    const formData = new FormData(form);
                    const searchParams = new URLSearchParams(formData);

                    fetch(`{{ route('officer.search.ajax') }}?` + searchParams.toString(), {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        tbody.innerHTML = '';
                        data.forEach(package => {
                            tbody.innerHTML += `
                                <tr>
                                    <td class="py-3 px-4 border-b">${package.tracking_id}</td>
                                    <td class="py-3 px-4 border-b">${package.godown}</td>
                                    <td class="py-3 px-4 border-b">${package.section}</td>
                                    <td class="py-3 px-4 border-b">${package.row}</td>
                                    <td class="py-3 px-4 border-b">${package.position}</td>
                                    <td class="py-3 px-4 border-b">${package.status}</td>
                                </tr>
                            `;
                        });
                    });
                });
            });
        });
    </script>
    
@endsection
