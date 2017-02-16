function validateEmail() {
  var emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var email = document.getElementById('signInEmail');

  if (!email.value.match(emailRegex)) {
    alert("email is invalid");
  }
  else {
    alert("email is valid");
  }
}

function validatePassword() {
  alert("we should validate the password now");
}
