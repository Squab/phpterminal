<?php 
//git hub version
//terminal.php


<?php
// terminal.php

session_start();
// store session data
$_SESSION['output'];
$_SESSION['username'];

if(isset($_POST['username'])){
	if (isset($_SESSION['username']) and $_SESSION['username']!="guest") {
	
		//TODO if set new username before exit error, must exit first

	
	} else {
    	if (isset($_POST['username'])) 
        	$_SESSION['username'] = $_POST['username'];
    	else 
        	$_SESSION['username'] = "guest";
	} 
} else {
		if($_SESSION['username']=="")
			$_SESSION['username']="guest";
}

$username =  $_SESSION['username'];


//set input to add to output
if (isset($_POST['input'])) {
    $input = $_POST['input']; 
    if($input == "exit"){
        $input = "";
        session_destroy();
        unset($_SESSION['output']);
        $_SESSION['username']="guest";
    }
    $_SESSION['output']=  $_SESSION['output'] . $username . "> " . $input . "<br>";
}
else {
    $input = "";
}

$username =  $_SESSION['username'];
$output = $_SESSION['output']; 

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
                line-height: 14px;
                } 
                input{
				background: transparent;
				border: 0; 
				color: #aaa; 
				width: 80%; 
				font-size: 1em; 
				font-family: FreeMono, monospace;
				outline: none;
				}
                </STYLE>        
		<title>Form Test</title>
	</head>
	<body OnLoad="document.input.input.focus();">
        $output
        <form name="input" method="post" action="terminal.php" />
        $username>
        <input type="text" name="input" autocomplete="off" />
        <input type="submit" value= "Enter" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
	</form>
        <br>
        <form method="post" action="terminal.php" />
        $username:> What is your username?
        <input type="text" name="username" autocomplete="off" />
        <input type="submit" value= "Set Username" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
	</form>
        </body>
</html>
_END;

//fin
?>