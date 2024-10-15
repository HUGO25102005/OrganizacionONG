<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalViewInfo extends Component
{
    /**
     * Create a new component instance.
     */

    public $classButton;
    // public $slot;
    public function __construct($classButton)
    {
        $this->classButton = $classButton;
        // $this->slot = $slot;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-view-info');
    }
}
