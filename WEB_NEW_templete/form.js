
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

function emailCheck(){
  var email = document.getElementById('myEmail').value;
  var emailRegex =/^[a-z0-9._-]+@[a-z0-9.]+\.[a-z]{2,}$/i;
  return (emailRegex.test(email));
}
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

function nameValidate(){
  var username = document.getElementById('myName').value;
  var nameRegex =/^[a-zA-Z0-9]+$/;
  return (nameRegex.test(username) && username !="");
}


function formValidate(){
  if(!emailValidate()){ document.getElementById('error2').innerHTML="Please enter valid email";}
  else {document.getElementById('error2').innerHTML="";}

  if(!nameValidate()){ document.getElementById('error3').innerHTML="Please enter valid username. Only characters and numbers are allowed";}
  else {document.getElementById('error3').innerHTML="";}


  if(!emailValidate() || !nameValidate()){ return false;}
  else{return true;}

}
