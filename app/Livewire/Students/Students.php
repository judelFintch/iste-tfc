<?php

namespace App\Livewire\Students;

use Livewire\Component;

class Students extends Component
{
    public function render()
    {
        return view('livewire.students.students')->layout('layouts.students'); // Assure-toi que ce chemin est correct
    
    }
}
