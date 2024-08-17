<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DynamicForm extends Component
{
    public $godowns = [];
    public $sections = [];
    public $rows = [];
    public $selectedGodown = null;
    public $selectedSection = null;

    public function mount()
    {
        // Fetching godown list from the database
        $godowns = DB::table('godown_list')->select('id', 'godown as name')->distinct()->get();

        // Debugging output to check the fetched data
        error_log('Godowns fetched: ' . $godowns->toJson());

        $this->godowns = $godowns;
    }

    public function updatedSelectedGodown($godown)
    {
        $this->sections = DB::table('godown_list')->select('id', 'section as name')->where('godown', $godown)->distinct()->get();
        $this->rows = [];
        $this->selectedSection = null;
    }

    public function updatedSelectedSection($section)
    {
        $this->rows = DB::table('godown_list')->select('id', 'row as name')
        ->where('godown', $this->selectedGodown)
        ->where('section', $section)
        ->distinct()
        ->get();
    }

    public function render()
    {
        return view('livewire.dynamic-form',['godowns' => $this->godowns,
            'sections' => $this->sections,
            'rows' => $this->rows
        ])->layout('layouts.guest');
    }
}

