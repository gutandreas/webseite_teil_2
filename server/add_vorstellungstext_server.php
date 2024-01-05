<?php

include_once __DIR__ . '/../inc/configure.php';
$verbindung = getConnection();

$id = $_POST['id'];
$vorstellungstext = $_POST["vorstellungstext"];

$sql = "DELETE FROM vorstellung WHERE kandidat_id = :id";
$stmt = $verbindung->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();

$sql = "INSERT INTO vorstellung (vorstellungstext, kandidat_id) VALUES (:vorstellungstext, :kandidat_id)";
$stmt = $verbindung->prepare($sql);

$stmt->bindParam(':vorstellungstext', $vorstellungstext);
$stmt->bindParam(':kandidat_id', $id, PDO::PARAM_INT);

$stmt->execute();

header("Location: ../index.php?page=aufnahme_okay");
?>
