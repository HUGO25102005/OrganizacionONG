<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalForm extends Component
{
    public $btnTitulo;
    public $tituloModal;
    public $router;
    public $btnDanger;
    public $btnSuccess;

    public function __construct($btnTitulo, $tituloModal, $router, $btnDanger, $btnSuccess)
    {
        $this->btnTitulo = $btnTitulo;
        $this->tituloModal = $tituloModal;
        $this->router = $router;
        $this->btnDanger = $btnDanger;
        $this->btnSuccess = $btnSuccess;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-form');
    }
}
