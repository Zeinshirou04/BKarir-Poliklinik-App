<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LabeledTextarea extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $name = null,
        public string $type = "text",
        public bool $required = false,
        public string $label = "Label",
        public string $placeholder = "Write here...",
        public $model = null,
        public bool $disabled = false,
        public bool $readonly = false,
        public string $cols = "30",
        public string $rows = "3"
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.labeled-textarea');
    }
}
