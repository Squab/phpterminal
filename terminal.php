<?php
//gibhub version
// terminal.php
session_start();
include_once "functions.php";

/*
ini_set('display_errors',1);
error_reporting(E_ALL);
*/

// store session data
$_SESSION['output'];
$_SESSION['username'];

if(isset($_SESSION['username'])) {
	$username=$_SESSION['username'];
} else {
	$username="guest";
}


if(isset($_SESSION['output'])) { 
	$output=$_SESSION['output'];
} else {
	$output="";
}

if (isset($_POST['input'])) {
	$input = $_POST['input']; 
	$output =  $output . $username . ">" . "<font size=2> </font>" . $input . "<br>";
	functions();
} else {
	$input = "";
}


$_SESSION['output']=$output;
$_SESSION['username']=$username;



//build web page
echo <<<_END
<html>
	<head>
                <STYLE TYPE="text/css">
                body{
                padding: 10px;
                position: relative;
                font-family: FreeMono, monospace;
                color: #aaa;
                background-color: #000;
                font-size: 12px;
                line-height: 16px;
                } 
                input{
				background: transparent;
				border: 0; 
				color: #aaa; 
				width: 80%; 
				font-size: 12px; 
				font-family: FreeMono, monospace;
				outline: none;
				}
                </STYLE>        
		<title>Zombie Text Adventure</title>
	</head>
	<body OnLoad="document.input.input.focus();">
        $output
        <form name="input" method="post" action="terminal.php" />
        $username> 
        <input type="text" name="input" autocomplete="off" />
        <input type="submit" value= "Enter" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
	</form>
        <br>
<!--        <form method="post" action="terminal.php" />
        $username:> What is your username?
        <input type="text" name="username" autocomplete="off" />
        <input type="submit" value= "Set Username" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
	</form>
-->
        </body>
</html>
_END;

//fin
?>