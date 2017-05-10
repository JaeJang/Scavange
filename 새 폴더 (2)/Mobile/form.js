function $(id){ var element = document.getElementById(id); return element;}
function loginValidate(){
  var name = document.getElementById('usrname').value;
  var password = document.getElementById('psw').value;

  if(name ==""){
    $('error1').innerHTML = "Username or Password is missing";
    return false;
  }
  if(password==""){
    $('error1').innerHTML = "Username or Password is missing";
    return false;
  }

}
