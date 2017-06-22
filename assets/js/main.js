
document.addEventListener('DOMContentLoaded', function(){

  // Remember Me is checked by default
  document.getElementById('rememberme').checked = true;

  // Add class to stop animation once complete
  var logo = document.querySelector('.logo');
  logo.addEventListener('animationend', function() {
    logo.classList.add('js-complete');
  });

});
