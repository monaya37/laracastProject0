<?php

namespace App\View\Components;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class CategoryDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.category-dropdown', [
        'categories' => Category::all(),
        'currentCategory' =>  Category::firstwhere('slug' ,request('categroy'))

        ]
    );
    }
}
