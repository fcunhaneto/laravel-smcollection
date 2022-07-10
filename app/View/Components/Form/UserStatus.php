<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class UserStatus extends Component
{
    public $actual;
    public $user_status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $actual = null)
    {
        $this->actual = $actual;
        if ( $type == 'series') {
            $this->user_status = ['Interessado', 'Acompanhando', 'Aguardando nova temporada', 'Desativado'];
        } else {
            $this->user_status = ['Interessado', 'Reprisar', 'Pausado', 'Desativado'];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.user-status');
    }
}
