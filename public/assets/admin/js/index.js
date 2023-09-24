function switchPopup(el) {
  if(el) {
    el.classList.toggle('active');
  }
}

function switchHallPopup(el, name = null, id = null) {
  if (name && id) {
    el.getElementsByTagName('span')[0].textContent = name;
    el.getElementsByTagName('form')[0].action = 'delete_hall/' + id;
  }

  if(el) {
    switchPopup(el);
  }
}

function switchHallTabs(id, className) {
  currentActiveHall = document.getElementsByClassName(className + ' ' + 'active');
  switchPopup(currentActiveHall[0]);
  document.getElementById(className + '-' + id).classList.toggle('active');
}

function seatClickStatusChange(el) {
  if (el.className == 'conf-step__chair conf-step__chair_standart') {
    el.className = 'conf-step__chair conf-step__chair_vip'
    el.dataset.seatStatus = 'vip'
  } else if (el.className == 'conf-step__chair conf-step__chair_vip') {
    el.className = 'conf-step__chair conf-step__chair_disabled'
    el.dataset.seatStatus = 'disabled'
  } else if (el.className == 'conf-step__chair conf-step__chair_disabled') {
    el.className = 'conf-step__chair conf-step__chair_standart'
    el.dataset.seatStatus = 'standart'
  }
}

async function updateHallConfig(el) {
  requestData = [];
  csrfToken = el.dataset.csrfToken
  seatsCollection = el.closest('.hall-config').querySelectorAll('[data-seat-id]')

  for (seat of seatsCollection) {
    requestData.push({id: seat.dataset.seatId, status: seat.dataset.seatStatus});
  }

  let response = await fetch('update_hall_config', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8',
      'X-CSRF-TOKEN': csrfToken
    },
    body: JSON.stringify(requestData)
  })

  result = await response.json();
 
  if (result) {
    infoPopup = document.getElementById('info-popup');
    if (infoPopup) {
      infoPopup.getElementsByClassName('message-info')[0].textContent = result;
      switchPopup(infoPopup);
    }
  }
}