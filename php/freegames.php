<?php


include('config.php');

$stmt = $con -> prepare("SELECT * FROM `games` WHERE `price` = 0.00 LIMIT 8");

$stmt->execute();

$free = $stmt -> get_result();


?>