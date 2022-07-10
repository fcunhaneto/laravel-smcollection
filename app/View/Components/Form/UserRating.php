<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class UserRating extends Component
{
    public $rating;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rating = null)
    {
        $this->rating = $rating;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.user-rating');
    }
}
