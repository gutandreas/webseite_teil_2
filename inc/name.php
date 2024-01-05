<?php

include_once  'configure.php';

$verbindung = getConnection();
$id = $_GET['id'];

$sqlstatement = $verbindung->prepare('
    SELECT *
    FROM kandidaten
    WHERE id = :id
    ');

$sqlstatement->bindParam(':id', $id, PDO::PARAM_INT);
$sqlstatement->execute();
$result = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($result); $i++) {
    $row = $result[$i];
    echo '<h1>' . $row['vorname'] . ' ' . $row['nachname'] . '</h1>';
}

?>




