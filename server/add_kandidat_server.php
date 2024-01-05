<?php
include_once __DIR__ . '/../inc/configure.php';
$verbindung = getConnection();

$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$mail = $_POST["mail"];
$telefonnummer = $_POST["telefon"];

$sql = "INSERT INTO kandidaten (vorname, nachname, mail, telefon) VALUES (:vorname, :nachname, :mail, :telefonnummer)";
$stmt = $verbindung->prepare($sql);

$stmt->bindParam(':vorname', $vorname);
$stmt->bindParam(':nachname', $nachname);
$stmt->bindParam(':mail', $mail);
$stmt->bindParam(':telefonnummer', $telefonnummer);

$stmt->execute();

header("Location: ../index.php?page=aufnahme_okay");
?>
