@role('officer')
@livewire('search-databases', ['model'=> 'CustomerPackageDetail'])
@endrole

@role('godown_supervisor')
@livewire('search-databases', ['model'=> 'Godown_package'])
@endrole