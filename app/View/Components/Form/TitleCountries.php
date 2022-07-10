<?php

namespace App\View\Components\Form;

use App\Models\Country;
use Illuminate\View\Component;

class TitleCountries extends Component
{
    public $countries;
    public $haystack = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null)
    {
        $this->countries = Country::orderBy('name')->get();
        if ( $title ) {
            $this->haystack = [];
            foreach ($title->countries as $ch) {
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
        return view('components.form.title-countries');
    }
}
