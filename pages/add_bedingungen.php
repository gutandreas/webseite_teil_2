<h1>Bedingungen erfassen</h1>
<form action="server/add_bedingungen_server.php" method="post">
    <?php include_once 'inc/select_alle_kandidaten.php';?>
    <label for="jahreseinkommen">Jahreseinkommen:</label>
    <input type="text" id="jahreseinkommen" name="jahreseinkommen" required>

    <label for="ferienwochen">Anzahl Ferienwochen:</label>
    <input type="number" id="ferienwochen" name="ferienwochen" min="0" max="20" required>

    <label>Geschäftsauto:</label>
    <input type="radio" id="geschaeftsauto-ja" name="geschaeftsauto" value="1">
    <label for="geschaeftsauto-ja">Ja</label>
    <input type="radio" id="geschaeftsauto-nein" name="geschaeftsauto" value="0">
    <label for="geschaeftsauto-nein">Nein</label><br>

    <label>Eigenes Büro:</label>
    <input type="radio" id="eigenesbuero-ja" name="eigenes_buero" value="1">
    <label for="eigenesbuero-ja">Ja</label>
    <input type="radio" id="eigenesbuero-nein" name="eigenes_buero" value="0">
    <label for="eigenesbuero-nein">Nein</label><br>

    <label>Jahresarbeitszeit:</label>
    <input type="radio" id="jahresarbeitszeit-ja" name="jahresarbeitszeit" value="1">
    <label for="jahresarbeitszeit-ja">Ja</label>
    <input type="radio" id="jahresarbeitszeit-nein" name="jahresarbeitszeit" value="0">
    <label for="jahresarbeitszeit-nein">Nein</label><br>

    <input type="submit" value="Absenden">

</form>
