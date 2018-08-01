<?php

session_start();

include 'dbConnection.php';

$conn = getDatabaseConnection("practice");

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Practice Final</title>
        <link rel="stylesheet" type="text/css" href="rps.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </head>
    <body onload="init()">
         <header>
            <h1> Program 1 </h1>
        </header>
        
        <br /><br />
        
        <h3>Question 1: 2 + _ = 4</h3><br />
        <div id="btnOne">1</div><br />
        
        <div id="btnTwo">2</div><br />
        
        <div id="btnThree">3</div><br />
        
        <h2 id ="txtOneTitle"></h2>
        
        <br /><br />
        
        <h3>Question 2: 5 + _ = 12</h3><br />
        <div id="btnSeven">7</div><br />
        
        <div id="btnEight">8</div><br />
        
        <div id="btnNine">9</div><br />
        
        <h2 id ="txtTwoTitle"></h2>
        
        <br /><br />
        
        
        
        </div>
        <script language="javascript" type="text/javascript" src="rps.js"></script>
    </body>
</html>