/*
function loginValidate(){
  var name = document.getElementById('usrname').value;
  var password = document.getElementById('psw').value;

  if(name ==""){
    document.getElementById('error1').innerHTML = "Username or Password is missing";
    return false;
  }
  if(password==""){
    document.getElementById('error1').innerHTML = "Username or Password is missing";
    return false;
  }

}

function Validate(){

  var username = document.getElementById('myName').value;
  var nameRegex =/^[a-zA-Z0-9]+$/;
  if(!nameRegex.test(username)){
    document.getElementById('error3').innerHTML = "Please enter proper username";
    return false;
  }else{
    document.getElementById('error3').innerHTML="";
  }

  var email = document.getElementById('myEmail').value;
  var emailRegex =/^[a-z0-9._-]+@[a-z0-9.]+\.[a-z]{2,}$/i;
  if(!emailRegex.test(email)){
      document.getElementById('error2').innerHTML = "Please enter proper email";
      return false;
    } else{
      document.getElementById('error2').innerHTML="";
    }

  if(email==""){
    document.getElementById('error4'.innerHTML = "Please all information");
    return false;
  }
  if(username=""){
    document.getElementById('error4'.innerHTML = "Please all information");
    return false;
  }
}
*/

/* return true if user wirte proper email */
function emailCheck(){
  var email = document.getElementById('myEmail').value;
  var emailRegex =/^[a-z0-9._-]+@[a-z0-9.]+\.[a-z]{2,}$/i;
  return (emailRegex.test(email));
}

/*return true when email section is not empty*/
function emailCheck2(){
  return (document.getElementById('myEmail').value != "");
}

function emailValidate(){
  if(emailCheck() && emailCheck2()){
    return true;
  } else {
    return false;
  }
}

/*return true when username section is not empty and there are only characters and numbers*/
function nameValidate(){
  var username = document.getElementById('myName').value;
  var nameRegex =/^[a-zA-Z0-9]+$/;
  return (nameRegex.test(username) && username !="");
}

/*return true when both passwords are same*/
function pswValidate(){
  var psw = document.getElementById('myPword').value;
  var psw2 = document.getElementById('myPwordConfirm').value;

  return(psw == psw2);
}

/*return true when there are only characters and numbers*/
function pswValidate2(){
  var psw = document.getElementById('myPword').value;
  var passwordRegex = /^[a-zA-Z0-9]{8,}/;
  return (passwordRegex.test(psw));
}


/*print error message and return false when the forms are not validated*/
function formValidate(){

  if(!pswValidate2()){document.getElementById('error5').innerHTML="Only characters and numbers are allowed";}
  else{document.getElementById('error5').innerHTML="";}
  if(!emailValidate()){ document.getElementById('error2').innerHTML="Please enter valid email";}
  else {document.getElementById('error2').innerHTML="";}

  if(!nameValidate()){ document.getElementById('error3').innerHTML="Please enter valid username. Only characters and numbers are allowed";}
  else {document.getElementById('error3').innerHTML="";}

  if(!pswValidate()){document.getElementById('error4').innerHTML="Passwords are not same";}
  else{document.getElementById('error4').innerHTML="";}


  if(!emailValidate() || !nameValidate() || !pswValidate() || !pswValidate2()){ return false;}
  else{return true;}

}
