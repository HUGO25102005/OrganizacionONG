<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonAccept extends Component
{
    /**
     * Create a new component instance.
     */
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
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-accept');
    }
}
