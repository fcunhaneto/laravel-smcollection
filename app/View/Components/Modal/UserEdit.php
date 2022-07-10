<?php

namespace App\View\Components\Modal;

use App\Models\Title;
use Illuminate\View\Component;

class UserEdit extends Component
{
    public $title;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Title $title, $type)
    {
        $this->title = $title;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.user-edit');
    }
}
