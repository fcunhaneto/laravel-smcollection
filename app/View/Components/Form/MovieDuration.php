<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class MovieDuration extends Component
{
    public $duration;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($duration = null)
    {
        $this->duration = $duration;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.movie-duration');
    }
}
