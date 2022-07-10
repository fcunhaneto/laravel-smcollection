<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SeriesSituation extends Component
{
    public $actual;
    public $situation;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($actual = 'Renovada')
    {
        $this->actual = $actual;
        $this->situation = ['Renovada','Finalizada','Cancelada'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.series-situation');
    }
}
