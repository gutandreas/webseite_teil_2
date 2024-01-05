<h1>Suchmaschine</h1>

<form id="suchmaschine_form" method="POST">
    <label for="jahreseinkommen">Jahreseinkommen:</label>
    <input type="text" pattern="\d*" id="jahreseinkommen" name="jahreseinkommen" value="100000" required><br>

    <label for="ferienwochen">Anzahl Ferienwochen:</label>
    <input type="number" id="ferienwochen" name="ferienwochen" min="0" max="20" value="5" required><br>

    <label>Geschäftsauto:</label>
    <input type="radio" id="geschaeftsauto-ja" name="geschaeftsauto" value="1" checked>
    <label for="geschaeftsauto-ja">Ja</label>
    <input type="radio" id="geschaeftsauto-nein" name="geschaeftsauto" value="0">
    <label for="geschaeftsauto-nein">Nein</label><br>

    <label>Eigenes Büro:</label>
    <input type="radio" id="eigenesbuero-ja" name="eigenes_buero" value="1" checked>
    <label for="eigenesbuero-ja">Ja</label>
    <input type="radio" id="eigenesbuero-nein" name="eigenes_buero" value="0">
    <label for="eigenesbuero-nein">Nein</label><br>

    <label>Jahresarbeitszeit:</label>
    <input type="radio" id="jahresarbeitszeit-ja" name="jahresarbeitszeit" value="1" checked>
    <label for="jahresarbeitszeit-ja">Ja</label>
    <input type="radio" id="jahresarbeitszeit-nein" name="jahresarbeitszeit" value="0">
    <label for="jahresarbeitszeit-nein">Nein</label><br>

    <input type="submit" value="Absenden">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo '<h1>Resultate:<h1>';
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

    if (count($result) == 0) {
        echo '<p>Die Suche ergab keine Treffer!</p>';
    } else {
        echo '<table>';
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row["nachname"] . " " . $row["vorname"] . '</td>';
            echo '<td><a href="index.php?page=kandidat&id=' . $row["kand_id"] . '">Seite besuchen</a></td>';
            echo '</tr>';
        }
        echo '</table>';

    }
}
?>


