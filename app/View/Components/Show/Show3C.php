<?php

namespace App\View\Components\Show;

use Illuminate\View\Component;

class Show3C extends Component
{
    public $str = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($c3, $cls = '')
    {
        if ( $c3 ) {
            $this->str = $this->createStr($c3, $cls);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show.show3-c');
    }

    /**
     * Create string from database title channels, categories and countries
     *
     * @param $p
     * @return string
     */
    public function createStr($p, $cls) {
        $arr = explode(',', $p);
        $total = count($arr) -1;
        $str = '';
        for($i = 0; $i <= $total; $i++) {
            if($i === $total) {
                $str .= '<span class="' . $cls . '" >' . $arr[$i] . '</span>';
            } else {
                $str .= '<span class="' . $cls . '" >' . $arr[$i] . '</span>' . ' | ';
            }
        }
        return $str;
    }
}
