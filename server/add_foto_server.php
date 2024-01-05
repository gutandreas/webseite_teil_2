<?php

include_once __DIR__ . '/../inc/configure.php';
$verbindung = getConnection();

$id = $_POST['id'];

$uploadVerzeichnis = '../upload/';
$originalDateiname = $_FILES['foto']['name'];
$neuerDateiname = uniqid() . '_' . $originalDateiname;
move_uploaded_file($_FILES['foto']['tmp_name'], $uploadVerzeichnis . $neuerDateiname);

$sql = "INSERT INTO `fotos` (dateiname, kandidat_id) VALUES (:dateiname, :id)";
$stmt = $verbindung->prepare($sql);

$stmt->bindValue(':dateiname', $neuerDateiname);
$stmt->bindValue(':id', $id);

$stmt->execute();

header("Location: ../index.php?page=aufnahme_okay");

?>
