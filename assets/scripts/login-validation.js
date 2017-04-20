function checkHoneypot() {

  if(!document.getElementById("gotcha").value) {
    return true;
  }

  else {
    return false;
  }
}

function validateFirstName() {

  var firstname = document.getElementById('signUpFirstName');
  var firstnametext = firstname.value;
  var nameSection = document.getElementById('fNameDiv');

  if(firstnametext.match('^[a-zA-Z]{3,16}$')) {
    nameSection.className = "form-inline has-success";
    firstname.className = "form-control my-2 form-control-success";
  }
  else {
    nameSection.className = "form-inline has-danger";
    firstname.className = "form-control my-2 form-control-danger";
  }
}

function validateLastName() {

  var lastname = document.getElementById('signUpLastName');
  var lastnametext = lastname.value;
  var nameSection = document.getElementById('lNameDiv');

  if(lastnametext.match('^[a-zA-Z]{3,16}$')) {
    nameSection.className = "form-inline has-success";
    lastname.className = "form-control my-2 form-control-success";
  }
  else {
    nameSection.className = "form-inline has-danger";
    lastname.className = "form-control my-2 form-control-danger";
  }
}


function validateEmail() {

  var emailGroup = document.getElementById('emailSignUpGroup');
  var email = document.getElementById('signUpEmail');
  var emailText = email.value;

  if(emailText.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/)) {

    if(emailText.indexOf("@studentmail.ul.ie", emailText.length - "@studentmail.ul.ie".length) !== -1){
      emailGroup.className = "has-success";
      email.className = "form-control my-2 form-control-success";
    }
    else {
      emailGroup.className = "has-danger";
      email.className = "form-control my-2 form-control-danger";
    }
  }
  else {
    emailGroup.className = "has-danger";
    email.className = "form-control my-2 form-control-danger";
  }
}

function validatePassword() {

  var passwordGroup = document.getElementById('passwordGroup');
  var password = document.getElementById('signUpPassword');
  var passwordText = password.value;

  if(passwordText.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/)) {

    passwordGroup.className = "has-success";
    password.className = "form-control my-2 form-control-success";
  }
  else {
    passwordGroup.className = "has-danger";
    password.className = "form-control my-2 form-control-danger";
  }
}

function confirmPassword() {

  var check = document.getElementById('signUpPassword');
  var checkText = check.value;

  var confirmGroup = document.getElementById('passwordConfirmGroup');
  var confirm = document.getElementById('signUpPasswordConfirm');
  var confirmText = confirm.value;

  if(confirmText == checkText) {

    confirmGroup.className = "has-success";
    confirm.className = "form-control my-2 form-control-success";
  }
  else {
    confirmGroup.className = "has-danger";
    confirm.className = "form-control my-2 form-control-danger";
  }

}
