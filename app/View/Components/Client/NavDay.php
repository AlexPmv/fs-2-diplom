<?php

namespace App\View\Components\Client;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class NavDay extends Component
{
    public $navDayData;
    
    /**
     * Create a new component instance.
     */
    public function __construct($showtimeDate)
    {
        $this->navDayData = $showtimeDate;
        $this->navDayData['class'] = 'page-nav__day';
        $this->сlassFormation();
    }

    protected function сlassFormation() {
        if ($this->navDayData['date'] === date('Y-m-d')) {
            $this->navDayData['class'] .= ' page-nav__day_today';
        }

        if ($this->navDayData['date'] === $this->navDayData['selectedDate']) {
            $this->navDayData['class'] .= ' page-nav__day_chosen';
        }

        if ($this->navDayData['weekday'] === 'сб' || $this->navDayData['weekday'] === 'вс') {
            $this->navDayData['class'] .= ' page-nav__day_weekend';
        }

        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.nav-day');
    }
}
