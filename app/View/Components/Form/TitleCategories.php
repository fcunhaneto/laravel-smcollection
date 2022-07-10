<?php

namespace App\View\Components\Form;

use App\Models\Category;
use App\Models\Title;
use Illuminate\View\Component;

class TitleCategories extends Component
{
    public $categories;
    public $haystack = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null)
    {
        $this->categories = Category::orderBy('name')->get();

        if ( $title ) {
            $this->haystack = [];
            foreach ($title->categories as $ch) {
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
        return view('components.form.title-categories');
    }
}
