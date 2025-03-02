<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class Card extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
    public function render()
    {
        return view('livewire.card');
    }
}
