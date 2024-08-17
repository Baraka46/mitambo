<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Packages') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-background text-primary-foreground flex items-center justify-center">
                <form class="bg-card shadow-lg rounded-lg p-8 w-full max-w-4xl" method="POST" action="{{ route('godown_packages.store') }}">
                    @csrf
                    <h2 class="text-2xl font-bold mb-4">Add Package</h2>
                    
                    <div class="grid grid-cols-2 gap-6 mb-4">
                        <div>
                            <label for="tracking_id" class="block text-sm font-medium">Tracking ID</label>
                            <input type="text" id="tracking_id" name="tracking_id" placeholder="Tracking ID" class="w-full px-3 py-2 rounded-lg border focus:outline-none focus:ring focus:ring-primary" />
                        </div>
                        
                        <div>
                            <label for="godown" class="block text-sm font-medium">Godown</label>
                            <input type="text" id="godown" name="godown" placeholder="Godown" class="w-full px-3 py-2 rounded-lg border focus:outline-none focus:ring focus:ring-primary" autocomplete="off" />
                        </div>
                        
                        <div>
                            <label for="section" class="block text-sm font-medium">Section</label>
                            <input type="text" id="section" name="section" placeholder="Section" class="w-full px-3 py-2 rounded-lg border focus:outline-none focus:ring focus:ring-primary" />
                        </div>
                        
                        <div>
                            <label for="row" class="block text-sm font-medium">Row</label>
                            <input type="text" id="row" name="row" placeholder="Row" class="w-full px-3 py-2 rounded-lg border focus:outline-none focus:ring focus:ring-primary" />
                        </div>
                        
                        <div>
                            <label for="position" class="block text-sm font-medium">Position</label>
                            <input type="text" id="position" name="position" placeholder="Position" class="w-full px-3 py-2 rounded-lg border focus:outline-none focus:ring focus:ring-primary" />
                        </div>
                    </div>
                    
                    <button type="submit" class="bg-primary text-primary-foreground py-2 px-4 rounded-lg hover:bg-primary/80 transition-colors">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
