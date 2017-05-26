<?php
function isLoggedIn(){
  return(isset($_SESSION['USERID']) && (trim($_SESSION['USERID']) !=''));
}

function stringSplit($str){
  $str = strtolower($str);
  $strnum = strlen($str);
  $str = substr($str,0 ,$strnum-1);
  $str2 = explode(',',$str);


  return $str2;
}
?>
