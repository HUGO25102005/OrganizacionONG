<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SupportWidget extends Component
{
    public $roles;

    /**
     * Crear una nueva instancia del componente.
     *
     * @param array $roles
     */
    public function __construct($roles = ['Administrador', 'Voluntario'])
    {
        $this->roles = $roles;
    }

    /**
     * Renderizar la vista del componente.
     */
    public function render()
    {
        return view('components.support-widget');
    }
}
