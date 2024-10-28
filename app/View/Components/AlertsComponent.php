<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AlertsComponent extends Component
{
    public $severity;
    public $title;
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($severity, $title, $message)
    {
        $this->severity = $severity;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alerts-component');
    }
}
