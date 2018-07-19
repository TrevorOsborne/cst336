<?php

session_start(); 

include 'dbConnection.php'; //Have to have access to the db file code

$conn = getDatabaseConnection("channel_islands");

if(!isset( $_SESSION['adminName'])) 
{
    //redirects back to login.php if $_SESSION doesn't contain admin credentials
    header("Location:login.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <script>
            function confirmDelete() {
            return confirm("Are you sure you want to delete the product?");
            }
        </script>
    </head>
    <body>
        <h1> Main Admin Page </h1>
        
        <h3> Welcome <?=$_SESSION['adminName']?>!</h3><br />
   
        <form action="logout.php">
            <input type="submit" class = 'btn btn-secondary' id = "beginning" value="Logout"/>
        </form>
        
        <br />
        
    </body>
</html>
