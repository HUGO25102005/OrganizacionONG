<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProgramasModal extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $content;
    public $modalId;
    public $objetive;
    public $dateinit;
    public $dateEnd;

    public function __construct($title, $content, $modalId, $objetive, $dateinit, $dateEnd)
    {
        //
        $this->title = $title;
        $this->content = $content;
        $this->modalId = $modalId;
        $this->objetive = $objetive;
        $this->dateinit = $dateinit;
        $this->dateEnd = $dateEnd;
    }
    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.programas-modal');
    }
}
