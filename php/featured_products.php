<?php


include('config.php');

$stmt = $con -> prepare("SELECT * FROM games LIMIT 8");

$stmt->execute();

$featured_products = $stmt -> get_result();


?>