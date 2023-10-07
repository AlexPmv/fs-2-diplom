<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use Illuminate\Http\Request;
\Moment\Moment::setLocale('ru_RU');

class CinemaCatalogController extends Controller
{
    public $showtimePeriod = [];
    public $selectedDate;
    public $catalogData = [];
    public function index($date = null)
    {
        $dateExist = false;

        for ($i = 0; $i < 7; $i++) {
            $showtimeDate = [];
            $time = new \Moment\Moment('now', 'Europe/Moscow');
            $time->addDays($i);
            $showtimeDate['weekday'] = $time->format('D');
            $showtimeDate['mday'] = $time->format('d') . ' ' . $time->format('M');
            $showtimeDate['date'] = $time->format('Y-m-d');

            if ($showtimeDate['date'] === $date) {
                $dateExist = true;
            }

            $this->showtimePeriod[$i] = $showtimeDate;
        }

        $currentDate = (new \Moment\Moment('now', 'Europe/Moscow'))->format('Y-m-d');

        if (!$dateExist) {
            $this->selectedDate = $currentDate;
        } else {
            $this->selectedDate = $date;
        };

        $this->getCatalogData();

        return view('client.index', ['showtimePeriod' => $this->showtimePeriod, 'selectedDate' => $this->selectedDate, 'catalogData' => $this->catalogData]);
    }

    public function getCatalogData()
    {
        $activeHalls = Hall::all()->where('active', true);
        $hallsWithShowtimes = [];

        foreach($activeHalls as $hall) {
            $hallsWithShowtimes[] = Hall::find($hall->id)->showtimes;
        }

        $movieIdfromShowtimes = [];

        foreach($hallsWithShowtimes as $showtimes) {
            foreach($showtimes as $showtime) {
                $movieIdfromShowtimes[] = $showtime['movie_id'];
            }
        }

        $todayMoviesId = [];
  
        foreach (array_unique($movieIdfromShowtimes) as $movieId) {
            $todayMoviesId[] = $movieId;
        }

        for ($i = 0; $i < count($todayMoviesId); $i++) {
            $currentMovieId = $todayMoviesId[$i];
            $movieData[$i]['movie_id'] = $currentMovieId;
            $movieData[$i]['showtimesByHalls'] = [];

            foreach($hallsWithShowtimes as $showtimes) {
                $currentHallShowtimes = [];
                $currentHallShowtimes['hall_id'] = $showtimes[0]['hall_id'];
                $currentHallShowtimes['showtimes'] = [];

                foreach($showtimes as $showtime) {
                    if ($showtime['movie_id'] === $currentMovieId) {
                        $currentHallShowtimes['showtimes'][] = $showtime;
                    };
                };

                $movieData[$i]['showtimesByHalls'][] = $currentHallShowtimes;
            }

            $this->catalogData[] = $movieData[$i];
        }
    }
}
