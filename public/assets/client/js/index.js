function seatClickStatusChange(el) {
  if (el.className == 'buying-scheme__chair buying-scheme__chair_standart') {
    el.className = 'buying-scheme__chair buying-scheme__chair_selected'
    el.dataset.seatStatus = 'selected'
  } else if (el.className == 'buying-scheme__chair buying-scheme__chair_vip') {
    el.className = 'buying-scheme__chair buying-scheme__chair_selected'
    el.dataset.seatStatus = 'selected'
  } else if (el.className == 'buying-scheme__chair buying-scheme__chair_selected') {
    el.className = 'buying-scheme__chair buying-scheme__chair_' + el.dataset.seatOriginStatus
    el.dataset.seatStatus = el.dataset.seatOriginStatus
  }
}
