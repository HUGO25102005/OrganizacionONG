<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SecNavModalForm extends Component
{
    /**
     * Create a new component instance.
     */
    public $nameSec;
    public $nameTab;
    public function __construct( $nameSec, $nameTab)
    {
        //
        $this->nameSec = $nameSec;
        $this->nameTab = $nameTab;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sec-nav-modal-form');
    }
}
