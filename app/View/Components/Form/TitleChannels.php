<?php

namespace App\View\Components\Form;

use App\Models\Channel;
use App\Models\Title;
use Illuminate\View\Component;

class TitleChannels extends Component
{
    public $channels;
    public $haystack = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null)
    {
        $this->channels = Channel::orderBy('name')->get();
        if ( $title ) {
            $this->haystack = [];
            foreach ($title->channels as $ch) {
                $this->haystack[] = $ch->id;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.title-channels');
    }
}
