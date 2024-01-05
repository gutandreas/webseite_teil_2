<?php

include_once  'configure.php';

$verbindung = getConnection();
$id = $_GET['id'];

$sqlstatement = $verbindung->prepare('
    SELECT *
    FROM kandidaten, ausbildung
    WHERE kandidaten.id = :id
    AND kandidaten.id = kandidat_id
    ');

$sqlstatement->bindParam(':id', $id, PDO::PARAM_INT);
$sqlstatement->execute();
$result = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);

echo '<h3>Ausbildung</h3>';
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




