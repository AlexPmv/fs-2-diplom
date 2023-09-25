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
  token = el.dataset.token
  seatsCollection = el.closest('.hall-config').querySelectorAll('[data-seat-id]')

  for (seat of seatsCollection) {
    requestData.push({id: seat.dataset.seatId, status: seat.dataset.seatStatus});
  }

  let response = await fetch('update_hall_config', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8',
      'X-CSRF-TOKEN': token
    },
    body: JSON.stringify(requestData)
  })

  result = await response.json();
 
  if (result) {
    showResponseMessage(result);
    return;
  }
}

async function updateHallPrice(el) {
  token = el.dataset.token
  halId = el.dataset.hallId
  priceCollection = el.closest('.hall-price').querySelectorAll('.conf-step__input')

  let response = await fetch('update_hall_price', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8',
      'X-CSRF-TOKEN': token
    },
    body: JSON.stringify({id: halId, priceStandart: priceCollection[0].value, priceVip: priceCollection[1].value})
  })

  result = await response.json();
 
  if (result.errors) {
    showResponseMessage(result.errors, 'error');
    return
  }

  if (result) {
    showResponseMessage(result);
    return;
  }
}

function showResponseMessage (result, status = 'success') {
  if (status === 'error') {
    infoPopup = document.getElementById('info-popup');
    infoPopup.querySelector('h2').textContent = 'Ошибка!';
    messages = infoPopup.querySelector('.messages__wrapper');
    if (infoPopup) {
      messages.textContent = '';
      child = messages.lastElementChild; 
    
      if (child) {
        while (child) {
          messages.removeChild(child);
          child = messages.lastElementChild;
        }
      }

      result.forEach(error => {
        p = document.createElement("p");
        p.className = 'message';
        p.style = 'padding: 2px';
        p.textContent = error
        messages.appendChild(p);
      });
    } 

    switchPopup(infoPopup);
    return
  }

  if (status === 'success') {
    infoPopup = document.getElementById('info-popup');
    infoPopup.querySelector('h2').textContent = 'Сообщение!';
    messages = infoPopup.querySelector('.messages__wrapper')
    if (infoPopup) {
      child = messages.lastElementChild; 
      
      if (child) {
        while (child) {
          messages.removeChild(child);
          child = messages.lastElementChild;
        }
      }
     
      messages.textContent = result;
      switchPopup(infoPopup);
    }
  }
}