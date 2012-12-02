<?php
//github version

function check_exit(){
	global $input; global $username; global $output;
	if($input == "exit"){
		$input="";
		unset($_SESSION['output']);
		session_destroy();
		$output = $_SESSION['output'];
		$username="guest";
	}
}




?>