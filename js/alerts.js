const hideAlert = () => {
  const el = document.querySelector('.alert');
  if (el)
    el.parentElement.removeChild(el);
};

// type is either 'success' or 'error'
const showAlert = (type, msg, time = 2) => {
  hideAlert();
  const markup = `<div class="alert alert--${type}">${msg}</div>`;
  //add alert at top of the body
  document.querySelector('body').insertAdjacentHTML('afterbegin', markup);
  window.setTimeout(hideAlert, time * 1000);  //multiply user sec with 1000 to conv to millisecs
};