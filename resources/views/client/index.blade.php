<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ИдёмВКино</title>
  <link rel="stylesheet" href="{{asset('assets/client/css/normalize.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/styles.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
</head>

<body>
  <header class="page-header">
    <h1 class="page-header__title">Идём<span>в</span>кино</h1>
  </header>

  <x-client.page-nav :selectedDate=$date/>
  
  <main>
    <section class="movie">
      <div class="movie__info">
        <div class="movie__poster">
          <img class="movie__poster-image" alt="Звёздные войны постер" src="{{url('/assets/client/i/poster1.jpg')}}">
        </div>
        <div class="movie__description">
          <h2 class="movie__title">Звёздные войны XXIII: Атака клонированных клонов</h2>
          <p class="movie__synopsis">Две сотни лет назад малороссийские хутора разоряла шайка нехристей-ляхов во главе с могущественным колдуном.</p>
          <p class="movie__data">
            <span class="movie__data-duration">130 минут</span>
            <span class="movie__data-origin">США</span>
          </p>
        </div>
      </div>  
      
      <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">Зал 1</h3>
        <ul class="movie-seances__list">
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">10:20</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">14:10</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">18:40</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">22:00</a></li>
        </ul>
      </div>
      <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">Зал 2</h3>
        <ul class="movie-seances__list">
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">11:15</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">14:40</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">16:00</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">18:30</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">21:00</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">23:30</a></li>     
        </ul>
      </div>      
    </section>
    
    <section class="movie">
      <div class="movie__info">      
        <div class="movie__poster">
          <img class="movie__poster-image" alt="Альфа постер" src="{{url('/assets/client/i/poster2.jpg')}}" >
        </div>
        <div class="movie__description">        
          <h2 class="movie__title">Альфа</h2>
          <p class="movie__synopsis">20 тысяч лет назад Земля была холодным и неуютным местом, в котором смерть подстерегала человека на каждом шагу.</p>
          <p class="movie__data">
            <span class="movie__data-duration">96 минут</span>
            <span class="movie__data-origin">Франция</span>
          </p>
        </div>    
      </div>  
      <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">Зал 1</h3>
        <ul class="movie-seances__list">
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">10:20</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">14:10</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">18:40</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">22:00</a></li>
        </ul>
      </div>
      <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">Зал 2</h3>
        <ul class="movie-seances__list">
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">11:15</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">14:40</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">16:00</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">18:30</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">21:00</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">23:30</a></li>     
        </ul>
      </div>      
    </section>   
    
    <section class="movie">
      <div class="movie__info">      
        <div class="movie__poster">
          <img class="movie__poster-image" alt="Хищник постер" src="{{url('/assets/client/i/poster2.jpg')}}">
        </div>
        <div class="movie__description">        
          <h2 class="movie__title">Хищник</h2>
          <p class="movie__synopsis">Самые опасные хищники Вселенной, прибыв из глубин космоса, высаживаются на улицах маленького городка, чтобы начать свою кровавую охоту. Генетически модернизировав себя с помощью ДНК других видов, охотники стали ещё сильнее, умнее и беспощаднее.</p>
          <p class="movie__data">
            <span class="movie__data-duration">101 минута</span>
            <span class="movie__data-origin">Канада, США</span>
          </p>
        </div>    
      </div>  
      <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">Зал 1</h3>
        <ul class="movie-seances__list">
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">09:00</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">10:10</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">12:55</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">14:15</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">14:50</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">16:30</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">18:00</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">18:50</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">19:50</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">20:55</a></li>
          <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">22:00</a></li>
        </ul>
      </div>     
    </section>     
  </main>
  
</body>
</html>