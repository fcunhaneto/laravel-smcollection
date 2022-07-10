<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Summary extends Component
{
    public $summary;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($summary = null)
    {
        $this->summary = $summary;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.summary');
    }
}
