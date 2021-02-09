<?php
require '../db.php';
$id = $_GET['id'];
$sql = "DELETE FROM fietsen WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
header('location: fietsen.php');
?>