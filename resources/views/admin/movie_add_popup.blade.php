<div class="popup" id="movie-add-popup">
  <div class="popup__container">
    <div class="popup__content">
      <div class="popup__header">
        <h2 class="popup__title">
          Добавление фильма
          <a class="popup__dismiss"><img src="{{url('/assets/admin/i/close.png')}}" alt="Закрыть" onclick="switchPopup(document.getElementById('movie-add-popup'))"></a>
        </h2>

      </div>
      <div class="popup__wrapper">
        <form action="add_movie" method="post" accept-charset="utf-8">
          @csrf
          <label class="conf-step__label conf-step__label-fullsize" for="name">
            Название фильма:
            <input class="conf-step__input" type="text" placeholder="Например, &laquo;Гражданин Кейн&raquo;" name="name" required style="margin-bottom: 15px">
            Продолжительность фильма (в минутах):
            <input class="conf-step__input" type="number" placeholder="Например, 120" name="duration" required style="margin-bottom: 15px">
            Постер:
            <input class="conf-step__input" type="file" name="file" required>
          </label>
          <div class="conf-step__buttons text-center">
            <input type="submit" value="Добавить фильм" class="conf-step__button conf-step__button-accent">
            <button type="button" class="conf-step__button conf-step__button-regular" onclick="switchPopup(document.getElementById('movie-add-popup'))">Отменить</button>            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>