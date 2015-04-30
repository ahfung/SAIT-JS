function startApp() {
  // alert('loaded');
  console.log('loaded');
}

function clicked(e, that) {
  console.log(e, that.parentElement);
  return false;
}

function hover(e, el) {
  console.log(e,el);
}
