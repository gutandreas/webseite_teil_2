<h1>Ausbildung hinzufügen</h1>
<form id=ausbildung_form method="post" action="server/add_ausbildung_server.php">
    <?php include_once __DIR__.'/../inc/select_alle_kandidaten.php'; ?>
    <label for="start">Start: </label><input type="number" id="start" name="start" min="1950" value="2000" required>
    <label for="ende">Ende: </label><input type="number" id="ende" name="ende" min="1950" value="2010" required>
    <label for="beschreibung">Beschreibung: </label><input type="text" id="beschreibung" name="beschreibung" required>
    <input type="submit" value="Absenden">
</form>