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

    public function __construct($severity, $title, $message)
    {
        $this->severity = $severity;
        $this->title = $title;
        $this->message = $message;
    }

    public function render()
    {
        return view('components.alerts-component');
    }
}

