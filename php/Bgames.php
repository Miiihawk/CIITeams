<?php


include('config.php');

$stmt = $con -> prepare("SELECT * FROM games LIMIT 20");

$stmt->execute();

$gamer = $stmt -> get_result();


?>