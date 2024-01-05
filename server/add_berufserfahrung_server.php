<?php

include_once __DIR__ . '/../inc/configure.php';
$verbindung = getConnection();

$id = $_POST['id'];
$start = $_POST["start"];
$ende = $_POST["ende"];
$beschreibung = $_POST["beschreibung"];

$sql = "INSERT INTO berufserfahrung (start, ende, beschreibung, kandidat_id) VALUES (:start, :ende, :beschreibung, :kandidat_id)";
$stmt = $verbindung->prepare($sql);

// Bind parameters
$stmt->bindParam(':start', $start);
$stmt->bindParam(':ende', $ende);
$stmt->bindParam(':beschreibung', $beschreibung);
$stmt->bindParam(':kandidat_id', $id, PDO::PARAM_INT);

$stmt->execute();

header("Location: ../index.php?page=aufnahme_okay");
?>
