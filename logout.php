<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time() - 86400, '/');
}

session_destroy();

// redirecting the user to the login page

echo "<script>window.location.href = 'login.php?action=logout';</script>";
?>