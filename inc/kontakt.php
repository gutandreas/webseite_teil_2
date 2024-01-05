<?php

include_once  'configure.php';

$verbindung = getConnection();
$id = $_GET['id'];

$sqlstatement = $verbindung->prepare('
    SELECT *
    FROM kandidaten
    WHERE kandidaten.id = :id
    ');

$sqlstatement->bindParam(':id', $id, PDO::PARAM_INT);
$sqlstatement->execute();
$result = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);

echo '<h2>Kontakt</h2>';
echo '<table>';
for ($i = 0; $i < count($result); $i++) {
    $row = $result[$i];
    echo '<tr>';
    echo '<td><img src="images/phone.png" class="icon"></td>';
    echo '<td>' . $row['telefon'] . '</td>';
    echo '<tr>';
    echo '</tr>';
    echo '<td><img src="images/mail.png" class="icon"></td>';
    echo '<td>' . $row['mail'] . '</td>';
    echo '</tr>';
}

echo '</table>';

?>