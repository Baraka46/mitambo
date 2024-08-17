<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use WithPagination;

class SearchDatabases extends Component
{
    public $search = '';
    public $model;
 
public function mount($model){
    $this->model=$model;
}

    public function render()

    {
        $users = [];

        if ($this->search) {
            $modelClass = 'App\\Models\\' . $this->model;

            if($this->model=='CustomerPackageDetail'){
                $results = $modelClass::where('customer_name', 'like', '%' . $this->search . '%')->orWhere('shipping_number', 'like', '%' . $this->search . '%')->orWhere('contact', 'like', '%' . $this->search . '%')->paginate(10);
            }elseif($this->model=='User'){
                $results = $modelClass::where('name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->paginate(10);
            }elseif($this->model=='Godown_package'){
                $results = $modelClass::where('tracking_id', 'like', '%' . $this->search . '%')->orWhere('godown', 'like', '%' . $this->search . '%')->orWhere('section', 'like', '%' . $this->search . '%')->orWhere('row', 'like', '%' . $this->search . '%')->paginate(10);
            }

        }else{
            $modelClass = 'App\\Models\\' . $this->model;
            // $results = $modelClass::all();
            $results = $modelClass::paginate(10);
        }

        // livewire views
        return view('livewire.search'.$this->model, [
            'results' => $results,
        ]);

    }

}