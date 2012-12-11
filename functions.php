<?php
//github version

/*ini_set('display_errors',1);
error_reporting(E_ALL); */

function functions(){
	global $input; 
	if($input == "exit")
		term_exit();
	$temp1 = substr($input, 0, 13);	
	if($temp1 == "set username ")
		set_username();
	$temp2 = substr($input, 0, 6);
	if($temp2 == "color ")
		color_change();
	if($input=="help")
		help();
	if($input=="clear")
		clear();
}


//exit
function term_exit(){
	global $input; global $username; global $output;
	$input="";
	unset($_SESSION['output']);
	session_destroy();
	$_SESSION['color']='#aaa';
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

//change text color
function color_change(){
	global $input; global $color;
	$_SESSION['color'] = substr($input, 6);
}

//clear
function clear(){
	global $output;
	unset($_SESSION['output']);
	$output = $_SESSION['output'];
}

//help
function help(){
	global $input; global $username; global $output;
	$help =	"<br>command&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  description<br>
	set username [name]&nbsp;&nbsp;&nbsp;																			  sets username<br>
	color [color] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;													  changes text color<br>
	clear&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		  clears console<br>
	help&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  shows available commands<br>
	exit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  reset to default<br><br>";
	$output =  $output . $help;
}


?>