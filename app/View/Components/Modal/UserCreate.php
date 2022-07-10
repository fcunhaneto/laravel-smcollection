<?php

namespace App\View\Components\Modal;

use App\Models\Title;
use Illuminate\View\Component;

class UserCreate extends Component
{
    public $title;
    public $type;
    public $channel;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Title $title, $type)
    {
        $this->title = $title;
        $this->type = $type;
        $channels= explode(',', $title->title_channels);
        $this->channel = $channels[0];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.user-create');
    }
}
