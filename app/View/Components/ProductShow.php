<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class ProductShow extends Component // Corrected class name to PascalCase
{
    public $sanpham; // Property name retained for clarity

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->sanpham = Product::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-show');
    }
}
