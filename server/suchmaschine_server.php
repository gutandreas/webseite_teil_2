<?php

include_once __DIR__ . '/../inc/configure.php';
$verbindung = getConnection();

$jahreseinkommen = $_POST["jahreseinkommen"];
$ferienwochen = $_POST["ferienwochen"];
$geschaeftsauto = $_POST["geschaeftsauto"];
$eigenes_buero = $_POST["eigenes_buero"];
$jahresarbeitszeit = $_POST["jahresarbeitszeit"];


$sql = "SELECT *, kandidaten.id AS kand_id FROM kandidaten, bedingungen 
        WHERE kandidaten.id = bedingungen.kandidat_id 
        AND jahreseinkommen <= :jahreseinkommen 
        AND ferienwochen <= :ferienwochen
        AND (geschaeftsauto = :geschaeftsauto OR geschaeftsauto = 0)
        AND (eigenes_buero = :eigenes_buero OR eigenes_buero = 0)
        AND (jahresarbeitszeit = :jahresarbeitszeit OR jahresarbeitszeit = 0)";
$stmt = $verbindung->prepare($sql);

$stmt->bindValue(':jahreseinkommen', $jahreseinkommen);
$stmt->bindValue(':ferienwochen', $ferienwochen);
$stmt->bindValue(':geschaeftsauto', $geschaeftsauto);
$stmt->bindValue(':eigenes_buero', $eigenes_buero);
$stmt->bindValue(':jahresarbeitszeit', $jahresarbeitszeit);

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dateiPfad = '../pages/suchmaschine.php';

$inhalt = file_get_contents($dateiPfad);

echo $inhalt;

if (count($result) == 0) {
    echo '<p>Die Suche ergab keine Treffer!</p>';
} else {
    echo '<table>
        <th>Name</th><th>Jahreseinkommen</th><th>Ferienwochen</th><th>Geschäftsauto</th><th>Eigenes Büro</th>
        <th>Jahresarbeitszeit</th><th>Link</th>';
    foreach ($result as $row) {
        echo '<tr>';
        echo '<td>' . $row["nachname"] . " " . $row["vorname"] . '</td>';
        echo '<td>' . $row["jahreseinkommen"] . '</td>';
        echo '<td>' . $row["ferienwochen"] . '</td>';
        echo '<td>' . ($row["geschaeftsauto"] == 0 ? "Ja" : "Nein") . '</td>';
        echo '<td>' . ($row["eigenes_buero"] == 0 ? "Ja" : "Nein") . '</td>';
        echo '<td>' . ($row["jahresarbeitszeit"] == 0 ? "Ja" : "Nein") . '</td>';
        echo '<td><a href="index.php?page=kandidat&id=' . $row["kand_id"] . '">Seite besuchen</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}

?>
