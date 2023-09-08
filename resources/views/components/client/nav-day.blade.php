
<a class="{{$navDayData['class']}}" href="{{route('/', ['date' => $navDayData['date']])}}">
    <span class="page-nav__day-week">{{$navDayData['weekday']}}</span><span class="page-nav__day-number">{{$navDayData['mday']}}</span>
</a>