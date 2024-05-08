<?php

namespace App\View\Components\ecom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductsRow extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public function __construct($title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.ecom.products-row');
    }
}
