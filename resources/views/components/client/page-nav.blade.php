
<nav class="page-nav">
    {{-- <a class="page-nav__day page-nav__day_today page-nav__day_chosen" href="{{route('/', ['day' => 2])}}">
      <span class="page-nav__day-week">{{$showtimePeriod[0]['weekday']}}</span><span class="page-nav__day-number">{{$showtimePeriod[0]['mday']}}</span>
    </a>
    <a class="page-nav__day" href="#">
      <span class="page-nav__day-week">{{$showtimePeriod[1]['weekday']}}</span><span class="page-nav__day-number">{{$showtimePeriod[1]['mday']}}</span>
    </a>
    <a class="page-nav__day" href="#">
      <span class="page-nav__day-week">{{$showtimePeriod[2]['weekday']}}</span><span class="page-nav__day-number">{{$showtimePeriod[2]['mday']}}</span>
    </a>
    <a class="page-nav__day" href="#">
      <span class="page-nav__day-week">Чт</span><span class="page-nav__day-number">3</span>
    </a>
    <a class="page-nav__day" href="#">
      <span class="page-nav__day-week">Пт</span><span class="page-nav__day-number">4</span>
    </a>
    <a class="page-nav__day page-nav__day_weekend" href="#">
      <span class="page-nav__day-week">Сб</span><span class="page-nav__day-number">5</span>
    </a>
    <a class="page-nav__day page-nav__day_next" href="#">
    </a> --}}
    @for($i = 0; $i < count($showtimePeriod); $i++) 
      <x-client.nav-day :showtimeDate=$showtimePeriod[$i]/>
    @endfor
</nav>