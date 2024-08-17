@livewireStyles
{{-- @livewire('search-user', ['model'=>'User']) --}}
@extends('layouts.myjetlayout', ['subheading' => 'Packages'])

@section('content')
@livewire('search-databases', ['model'=> 'Godown_package'])

@endsection

@livewireScripts
