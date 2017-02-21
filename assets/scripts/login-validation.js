function validateFirstName(){

  var firstname = document.getElementById('signUpFirstName');
  var nameSection = document.getElementById('fNameDiv');

  if(firstname.value.length >= 1 && firstname.value.length <= 35){
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

  if(lastname.value.length >= 1 && lastname.value.length <= 35){
    nameSection.className = "form-inline has-success";
    lastname.className = "form-control my-2 form-control-success";
  }
  else{
    nameSection.className = "form-inline has-danger";
    lastname.className = "form-control my-2 form-control-danger";
  }
}


function validateEmail(){

  var emailGroup = document.getElementById('emailSignUpGroup');
  console.log(emailGroup);
  var email = document.getElementById('signUpEmail');
  console.log(email);
  var emailText = email.value;
  console.log(emailText);

  if(emailText.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/) ){

    emailGroup.className = "has-success";
    email.className = "form-control my-2 form-control-success";
  }
  else{
    emailGroup.className = "has-danger";
    email.className = "form-control my-2 form-control-danger";
  }
}
