<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class UserChannel extends Component
{
    public $actual;
    public $channels;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($actual = null)
    {
        $this->actual = $actual;
        $this->channels = \App\Models\Channel::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.user-channel');
    }
}
