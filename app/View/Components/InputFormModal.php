<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputFormModal extends Component
{
    /**
     * Create a new component instance.
     */
   
    public $name;
    public $labelText;
    public $type;
    public $id;
    public $required;
    public $value;
    public $placeholder;
    public function __construct(
        $name,
        $labelText,
        $type,
        $id,
        $placeholder,

    ){
        $this->name = $name;
        $this->labelText = $labelText;
        $this->type = $type;
        $this->id = $id;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-form-modal');
    }
}
