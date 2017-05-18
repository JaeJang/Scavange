<?php
function isLoggedIn(){
  return(isset($_SESSION['USERID']) && (trim($_SESSION['USERID']) !=''));
}
?>
