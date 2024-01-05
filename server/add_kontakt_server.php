<?php

include_once __DIR__ . '/../inc/configure.php';
$verbindung = getConnection();

$id = $_POST['id'];
$telefon = $_POST["telefon"];
$mail = $_POST["mail"];

$sql = "UPDATE kandidaten SET telefon = :telefon, mail = :mail WHERE id = :id";
$stmt = $verbindung->prepare($sql);

$stmt->bindParam(':telefon', $telefon);
$stmt->bindParam(':mail', $mail);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

header("Location: ../index.php?page=aufnahme_okay");
?>
