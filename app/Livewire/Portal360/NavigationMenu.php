<?php

namespace App\Livewire\Portal360;

use Livewire\Component;

class NavigationMenu extends Component
{

    public $isSidebarOpen = false;

    public function mount()
    {
        // Leer el estado del menú desde localStorage al cargar el componente
        $this->isSidebarOpen = json_decode(session()->get('isSidebarOpen', false));
    }

    public function toggleSidebar()
    {
        $this->isSidebarOpen = !$this->isSidebarOpen;
        
        // Guardar el estado del menú en localStorage
        session()->put('isSidebarOpen', json_encode($this->isSidebarOpen));
    }

    public function render()
    {
        return view('livewire.portal360.navigation-menu')->layout('layouts.portal360');
    }
}


//resources\views\navigation-menudev.blade.php