<?php

include_once  'configure.php';

$verbindung = getConnection();
$id = $_GET['id'];

$sqlstatement = $verbindung->prepare('
    SELECT vorstellungstext
    FROM kandidaten, vorstellung
    WHERE kandidaten.id = :id
    AND kandidaten.id = kandidat_id
    ');

$sqlstatement->bindParam(':id', $id, PDO::PARAM_INT);
$sqlstatement->execute();
$result = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);

echo '<h2>Vorstellung</h2>';
for ($i = 0; $i < count($result); $i++) {
    $row = $result[$i];

    echo '<p>' . $row['vorstellungstext'] . '</p>';
}


?>




