<?php
//github version

/*ini_set('display_errors',1);
error_reporting(E_ALL); */

function functions(){
	global $input; 
	if($input == "exit")
		check_exit();
	$temp1=substr($input, 0, 13);	
	if($temp1 == "set username ")
		set_username();
	if($input=="help")
		help();
}


//exit
function check_exit(){
	global $input; global $username; global $output;
	$input="";
	unset($_SESSION['output']);
	session_destroy();
	$output = $_SESSION['output'];
	$username="guest";
}


//login
function set_username(){
	global $input; global $username; global $output;
	$temp2=substr($input, 13);
	$username = $temp2;
	unset($_SESSION['output']);
	$output = $_SESSION['output'];
}

function help(){
	global $input; global $username; global $output;
	$help =	"command	 description 	example<br>set username [name]	sets username set username X<br>exit reset to default exit<br>";
	$output =  $output . $help;
}


?>