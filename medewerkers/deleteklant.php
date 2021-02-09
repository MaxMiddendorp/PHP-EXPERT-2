<?php
require '../db.php';
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
header('location: klanten.php');
?>