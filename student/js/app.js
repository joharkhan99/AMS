function openNav() {
  document.getElementById('sidenav').style.width = "190px";
  document.querySelector('.bars').style.display = "none";
}

function closeNav() {
  document.getElementById('sidenav').style.width = "0";
  document.querySelector('.bars').style.display = "block";
}

const hideAlert = () => {
  const el = document.querySelector('.alert');
  if (el)
    el.parentElement.removeChild(el);
};

// type is either 'success' or 'error'
const showAlert = (type, msg, time = 5) => {
  hideAlert();
  const markup = `<div class="alert alert--${type}">${msg}</div>`;
  //add alert at top of the body
  document.querySelector('body').insertAdjacentHTML('afterbegin', markup);
  window.setTimeout(hideAlert, time * 1000);  //multiply user sec with 1000 to conv to millisecs
};

function hideBtn() {
  document.querySelector('.mark-btn').setAttribute('disabled', 'true');
}