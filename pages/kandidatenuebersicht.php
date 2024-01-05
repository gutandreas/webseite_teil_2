<?php
$verbindung = getConnection();
$sqlstatement = $verbindung->prepare('SELECT * FROM kandidaten ORDER BY nachname');
$sqlstatement->execute();

$result = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);

echo '<h1>Kandidatenübersicht</h1>';
echo '<table>';
for ($i = 0; $i < count($result); $i++) {
    $row = $result[$i];
    echo '<tr>';
    echo '<td>' . $row["nachname"] . " " . $row["vorname"] . '</td>';
    echo '<td><a href="index.php?page=kandidat&id=' . $row["id"] . '">Seite besuchen</a></td>';
    echo '</tr>';
}

echo '</table>';
?>
