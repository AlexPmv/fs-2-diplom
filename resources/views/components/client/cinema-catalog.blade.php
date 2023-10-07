@foreach($catalogData as $movieData)
  <section class="movie">
    <x-client.movie-info :movieId="$movieData['movie_id']"/>
    @foreach($movieData['showtimesByHalls'] as $showtimesByHalls)
      <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">{{App\Models\Hall::find($showtimesByHalls['hall_id'])->name}}</h3>
          <ul class="movie-seances__list">
            @foreach($showtimesByHalls['showtimes'] as $showtime)
              <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">{{$showtime->start_time}}</a></li>
            @endforeach
          </ul>
      </div>
    @endforeach
  </section>
@endforeach