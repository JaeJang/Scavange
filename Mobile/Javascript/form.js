
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

  var username = document.getElementById('name').value;
  var nameRegex =/^[a-zA-Z0-9]+$/;
  if(!nameRegex.test(username)){
    document.getElementById('error3').innerHTML = "Please enter proper username";
    return false;
  }else{
    document.getElementById('error3').innerHTML="";
  }

  var email = document.getElementById('email').value;
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
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
function emailCheck(){
  var email = document.getElementById('email').value;
  var emailRegex =/^[a-z0-9._-]+@[a-z0-9.]+\.[a-z]{2,}$/i;
  return (emailRegex.test(email));
}
function emailCheck2(){
  return (document.getElementById('email').value != "");
}

function emailValidate(){
  if(emailCheck() && emailCheck2()){
    return true;
  } else {
    return false;
  }
}

function nameValidate(){
  var username = document.getElementById('name').value;
  var nameRegex =/^[a-zA-Z0-9]+$/;
  return (nameRegex.test(username) && username !="");
}

function pswValidate(){
  var psw = document.getElementById('password').value;
  var psw2 = document.getElementById('cPassword').value;

  return(psw == psw2);
}

function pswValidate2(){
  var psw = document.getElementById('password').value;
  var passwordRegex = /^[a-zA-Z0-9]{8,}/;
  return (passwordRegex.test(psw));
}


function formValidate(){

  if(!pswValidate2()){document.getElementById('errorp').innerHTML="Only characters and numbers are allowed";}
  else{document.getElementById('errorp').innerHTML="";}

  if(!emailValidate()){ document.getElementById('errore').innerHTML="Please enter valid email";}
  else {document.getElementById('errore').innerHTML="";}

  if(!nameValidate()){ document.getElementById('errorn').innerHTML="Please enter valid username. Only characters and numbers are allowed";}
  else {document.getElementById('errorn').innerHTML="";}

  if(!pswValidate()){document.getElementById('errorp2').innerHTML="Passwords are not same";}
  else{document.getElementById('errorp2').innerHTML="";}


  if(!emailValidate() || !nameValidate() || !pswValidate() || !pswValidate2()){ return false;}
  else{return true;}

}
