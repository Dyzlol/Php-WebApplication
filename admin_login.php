<?php

$login = "main";
$password = "terps";

if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) &&
    $_SERVER['PHP_AUTH_USER'] == $login && $_SERVER['PHP_AUTH_PW'] == $password){

    header("Location: admin_home.php");

  } else {
	   header("WWW-Authenticate: Basic realm=\"Example System\"");
	    header("HTTP/1.0 401 Unauthorized");
	    exit;
}

?>
