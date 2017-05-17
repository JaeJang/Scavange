<?php
session_start();
unset($_SESSION['USERID']);
session_write_close();
header("location: mobile_login.html");
exit();
 ?>
