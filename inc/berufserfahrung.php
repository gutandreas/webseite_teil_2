<?php

include_once  'configure.php';

$verbindung = getConnection();
$id = $_GET['id'];

$sqlstatement = $verbindung->prepare('
    SELECT *
    FROM kandidaten, berufserfahrung
    WHERE kandidaten.id = :id
    AND kandidaten.id = kandidat_id
    ORDER BY ende DESC 
    ');

$sqlstatement->bindParam(':id', $id, PDO::PARAM_INT);
$sqlstatement->execute();
$result = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);

echo '<h3>Berufserfahrung</h3>';
echo '<table>';
for ($i = 0; $i < count($result); $i++) {
    $row = $result[$i];
    echo '<tr>';
    echo '<td>' . $row['start'] . '-' . $row['ende'] . '</td>';
    echo '<td>' . $row['beschreibung'] . '</td>';
    echo '</tr>';
}

echo '</table>';

?>