<?php

session_start();

include 'dbConnection.php'; //Have to have access to the db file code

$conn = getDatabaseConnection("channel_islands");

if(!isset( $_SESSION['adminName'])) 
{
    //redirects back to login.php if $_SESSION doesn't contain admin credentials
    header("Location:login.php");
}

$sql = "DELETE FROM aircraft WHERE cert_type = " . $_GET['cert_type'];
$statement = $conn->prepare($sql);
$statement->execute();

header("Location: certificatesSubAdmin.php");


?>