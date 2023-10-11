<div class="conf-step__seances-timeline">
  @foreach($showtimes as $showtime)
  <div class="conf-step__seances-movie" style="min-width: 60px; background-color: rgb(133, 255, 137); left: {{((explode(':', $showtime->start_time)[0] * 60) + (explode(':', $showtime->start_time)[1])) / 14.4}}%;">
    <button class="cross-delete-btn" onclick="switchDeletePopup(document.getElementById('showtime-delete-popup'), '{{$showtime->movie_name}}', {{$showtime->id}})">x</button>
    <p class="conf-step__seances-movie-title">{{App\Models\Showtime::find($showtime->id)->movie->name}}</p>
    <p class="conf-step__seances-movie-start">{{$showtime->start_time}}</p>
  </div>
  @endforeach
  </div>