<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonTrash extends Component
{
    public $messageAlert;
    public $router;
    public $itemId;
    public $tituloModal;

    /**
     * Constructor del componente
     */
    public function __construct($messageAlert, $router, $itemId, $tituloModal)
    {   
        $this->messageAlert = $messageAlert;
        $this->router = $router;
        $this->itemId = $itemId;
        $this->tituloModal = $tituloModal;
    }

    /**
     * Retorna la vista que representa el componente.
     */
    public function render()
    {
        return view('components.button-trash');
    }
}
