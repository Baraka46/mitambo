    @livewireStyles
    {{-- @livewire('search-user', ['model'=>'User']) --}}
    @extends('layouts.myjetlayout', ['subheading' => 'results'])

@section('content')
   @livewire('search-databases', ['model'=> 'CustomerPackageDetail'])
    @endsection

    @livewireScripts
