
<nav class="page-nav">
    @for($i = 0; $i < count($showtimePeriod); $i++) 
      <x-client.nav-day :showtimeDate=$showtimePeriod[$i]/>
    @endfor
</nav>