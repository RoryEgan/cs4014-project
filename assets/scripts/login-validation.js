function validateLogin() {
  var emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var email = document.getElementById('signInEmail');
  var password = document.getElementById('signInPassword');
  var emailSignInGroup = document.getElementById('emailSignInGroup');
  var passwordSignInGroup = document.getElementById('passwordSignInGroup');

  if (!email.value.match(emailRegex)) {
    emailSignInGroup.className += " has-danger";
  //  email.className += " form-control-danger";
  }

  if(password.value.length < 6){
  //  password.className += " form-control-danger";
    passwordSignInGroup.className += " has-danger";
  }
}

function validatePassword() {

}


function validateFirstName(){

  var firstname = document.getElementById('signUpFirstName');
  var nameSection = document.getElementById('fNameDiv');

  if(firstname.value.length >= 1 ){
    nameSection.className = "form-inline has-success";
    firstname.className = "form-control my-2 form-control-success";
  }
  else{
    nameSection.className = "form-inline has-danger";
    firstname.className = "form-control my-2 form-control-danger";
  }
}

function validateLastName(){

  var lastname = document.getElementById('signUpLastName');
  var nameSection = document.getElementById('lNameDiv');

  if(lastname.value.length >= 1 ){
    nameSection.className = "form-inline has-success";
    lastname.className = "form-control my-2 form-control-success";
  }
  else{
    nameSection.className = "form-inline has-danger";
    lastname.className = "form-control my-2 form-control-danger";
  }
}
