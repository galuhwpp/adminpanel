<?php
	require_once "function.php";
	session_destroy();
	redirect('login.php');
?>