<?php

namespace App\Livewire\Portal360;

use App\Models\Encuestas360\Encuesta360;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;
use Livewire\Component;

class EliminarEncuestaDev extends Component
{
    

    public function render()
    {
        return view('livewire.portal360.eliminar-encuesta-dev')->layout('layouts.portal360');
    }
}
