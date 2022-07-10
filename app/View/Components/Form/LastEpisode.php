<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class LastEpisode extends Component
{
    public $last;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($last = null)
    {
        $this->last = $last;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.last-episode');
    }
}
