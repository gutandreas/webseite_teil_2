<?php

include_once  'configure.php';

$verbindung = getConnection();
$id = $_GET['id'];

$sqlstatement = $verbindung->prepare('
    SELECT *
    FROM kandidaten, fotos
    WHERE kandidaten.id = :id
    AND kandidaten.id = kandidat_id
    ');

$sqlstatement->bindParam(':id', $id, PDO::PARAM_INT);
$sqlstatement->execute();
$result = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);

echo '<h2>Fotos</h2>';
echo '<table>';
for ($i = 0; $i < count($result); $i++) {
    $row = $result[$i];
    echo '<img src="upload/' . $row["dateiname"] . '" class="passfoto">';
}

echo '</table>';

?>




