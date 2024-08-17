<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __(  'Details' ) }} --}}
            {{ $subheading }}
        </h2>
    </x-slot>
@yield('content')
</x-app-layout>