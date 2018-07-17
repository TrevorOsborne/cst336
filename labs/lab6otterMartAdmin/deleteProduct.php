<?php

session_start();

include 'dbConnection.php'; //Have to have access to the db file code

$conn = getDatabaseConnection("ottermart");

if(!isset( $_SESSION['adminName'])) 
{
    //redirects back to login.php if $_SESSION doesn't contain admin credentials
    header("Location:login.php");
}

$sql = "DELETE FROM om_product WHERE productId = " . $_GET['productId'];
$statement = $conn->prepare($sql);
$statement->execute();

header("Location: admin.php");


?>