<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StoreComponent extends Component
{
    public $view = 'show';

    public function render()
    {
        return view('livewire.store-component');
    }

    public function create()
    {
        $this->view = 'create';
    }

    public function edit()
    {
        $this->view = 'edit';
    }

    public function show()
    {
        $this->view = 'show';
    }

    public function images()
    {
        $this->view = 'images';
    }

}
