<?php
session_start();

include 'dbConnection.php';
$conn = getDatabaseConnection("final");

$score = $_POST['score'];

$sql = "INSERT INTO scores (score) 
        VALUES (:score)";
$data = array(
    ":score" => $score
);
$stmt = $connect->prepare($sql);
$stmt->execute($data);


//Adding new score to database


?>