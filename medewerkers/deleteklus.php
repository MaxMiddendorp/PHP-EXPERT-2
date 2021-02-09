<?php
require '../db.php';
$id = $_GET['id'];
$sql = "DELETE FROM reparaties WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
header('location: klussen.php');
?>