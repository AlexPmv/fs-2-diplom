<?php

namespace App\View\Components\Client;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
\Moment\Moment::setLocale('ru_RU');

class PageNav extends Component
{
    public $showtimePeriod = [];

    /**
     * Create a new component instance.
     */
    public function __construct($selectedDate)
    {
        for ($i = 0; $i < 7; $i++) {
            $showtimeDate = [];
            $time = new \Moment\Moment('now', 'Europe/Moscow');
            $time->addDays($i);
            $showtimeDate['weekday'] = $time->format('D');
            $showtimeDate['mday'] = $time->format('d') . ' ' . $time->format('M');
            $showtimeDate['date'] = $time->format('Y-m-d');

            if ($selectedDate === null) {
                $currentDate = new \Moment\Moment('now', 'Europe/Moscow');
                $showtimeDate['selectedDate'] = $currentDate->format('Y-m-d');
            } else {
                $showtimeDate['selectedDate'] = $selectedDate;
            }

            $this->showtimePeriod[$i] = $showtimeDate;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.page-nav');
    }
}
