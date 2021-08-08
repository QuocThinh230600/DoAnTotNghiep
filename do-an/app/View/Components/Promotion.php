<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Promotion extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $promotion;
    
    public function __construct(object $data = null)
    {
        $this->promotion = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.promotion');
    }
}
