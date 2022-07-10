<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SeriesSeasons extends Component
{
    public $seasons;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($seasons = 1)
    {
        $this->seasons = $seasons;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.series-seasons');
    }
}
