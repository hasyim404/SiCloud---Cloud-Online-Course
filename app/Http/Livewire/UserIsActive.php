<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class UserIsActive extends Component
{
    public Model $model;
    public $field;
    public $isactive;
    
    public function mount()
    {
        $this->isactive = (bool) $this->model->getAttribute($this->field);
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
    }
    
    public function render()
    {
        return view('livewire.user-is-active');
    }
}
