function switchPopup(el) {
  el.classList.toggle('active');
}

function switchHallPopup(el, name = null, id = null) {
  if (name && id) {
    el.getElementsByTagName('span')[0].textContent = name;
    el.getElementsByTagName('form')[0].action = 'delete_hall/' + id;
  }

  switchPopup(el);
}

function switchHallConfig(id) {
  currentActiveHall = document.getElementsByClassName('hall-config active');
  switchPopup(currentActiveHall[0]);
  document.getElementById('hall-config-' + id).classList.toggle('active');
}