<?php
include_once 'configure.php';
$verbindung = getConnection();

$sqlstatement = $verbindung->prepare('
    SELECT *
    FROM kandidaten
');

$sqlstatement->execute();

$result = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);
echo '<div class="dropdown">
    <div class="custom-select">
        <label for="id">Kandidat: </label>
        <select name="id">';
foreach ($result as $row) {
    echo "<option value='" . $row['id'] . "'>" . $row['vorname'] . " " . $row['nachname'] . "</option>";
}
echo '</select></div>';
?>
