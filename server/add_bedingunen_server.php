<?php

include_once __DIR__ . '/../inc/configure.php';
$verbindung = getConnection();

$id = $_POST["id"];
$jahreseinkommen = $_POST["jahreseinkommen"];
$ferienwochen = $_POST["ferienwochen"];
$geschaeftsauto = $_POST["geschaeftsauto"];
$eigenes_buero = $_POST["eigenes_buero"];
$jahresarbeitszeit = $_POST["jahresarbeitszeit"];

$sql = "DELETE FROM bedingungen WHERE kandidat_id = :id";
$stmt = $verbindung->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$sql = "INSERT INTO bedingungen (jahreseinkommen, ferienwochen, geschaeftsauto, eigenes_buero, jahresarbeitszeit, kandidat_id) 
        VALUES (:jahreseinkommen, :ferienwochen, :geschaeftsauto, :eigenes_buero, :jahresarbeitszeit, :kandidat_id)";
$stmt = $verbindung->prepare($sql);

$stmt->bindParam(':jahreseinkommen', $jahreseinkommen);
$stmt->bindParam(':ferienwochen', $ferienwochen);
$stmt->bindParam(':geschaeftsauto', $geschaeftsauto);
$stmt->bindParam(':eigenes_buero', $eigenes_buero);
$stmt->bindParam(':jahresarbeitszeit', $jahresarbeitszeit);
$stmt->bindParam(':kandidat_id', $id);

$stmt->execute();

header("Location: ../index.php?page=aufnahme_okay");


?>