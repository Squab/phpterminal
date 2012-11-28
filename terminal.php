<?php 
//git hub version
//terminal.php
session_start();
// store session data
$_SESSION['output'];
$_SESSION['username'];

//set username
if (isset($_SESSION['username']) and $_SESSION['username']!="guest") {
    $username =  $_SESSION['username'];
} else {
    if (isset($_POST['username'])) 
        $_SESSION['username'] = $_POST['username'];
    else 
        $_SESSION['username'] = "guest";
    $username =  $_SESSION['username'];
}

//set "name" which is just stuff to add to output
if (isset($_POST['name'])) {
    $name = $_POST['name']; 
    if($name == "exit"){
        $name = "";
        session_destroy();
        unset($_SESSION['output']);
        unset($_SESSION['username']);
        $username = $_SESSION['username'];   
    }
    $_SESSION['output']= $_SESSION['output'] . $name;
    $output = $_SESSION['output']; 
}
else {
    $name = "";
    $output = $_SESSION['output']; 
}

//build web page
echo <<<_END
<html>
	<head>
                <STYLE TYPE="text/css">
                body{
                padding: 10px;
                position: relative;
                overflow: hidden;    
                font-family: FreeMono, monospace;
                color: #aaa;
                background-color: #000;
                font-size: 12px;
                line-height: 14px;
                } 
                </STYLE>        
		<title>Form Test</title>
	</head>
	<body>
        $username:> Your output is $output<br />

        
        <form method="post" action="terminal.php" />
        $username:> Add to output:
        <input type="text" name="name" />
        <input type="submit" value= "Enter" />
	</form>
        
        <form method="post" action="terminal.php" />
        $username:> What is your username?
        <input type="text" name="username" />
        <input type="submit" value= "Set Username" />
	</form>
        </body>
</html>
_END;

//fin
?>