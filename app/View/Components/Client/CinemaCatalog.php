<?php

namespace App\View\Components\client;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
\Moment\Moment::setLocale('ru_RU');

class CinemaCatalog extends Component
{
    public $catalogData;
    /**
     * Create a new component instance.
     */
    public function __construct($catalogData)
    {
        $this->catalogData = $catalogData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.cinema-catalog');
    }
}