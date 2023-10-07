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

  <nav class="page-nav">
    @for($i = 0; $i < count($showtimePeriod); $i++) 
      <x-client.nav-day :showtimeDate="$showtimePeriod[$i]" :selectedDate="$selectedDate"/>
    @endfor
  </nav>

  <main style="margin-bottom: 50px">
    <x-client.cinema-catalog :catalogData="$catalogData"/>
  </main>

</body>
</html>