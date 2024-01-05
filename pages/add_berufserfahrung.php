<h1>Berufserfahrung hinzufügen</h1>
<form id=berufserfahrung_form method="post" action="server/add_berufserfahrung_server.php"">
    <?php include_once 'inc/select_alle_kandidaten.php'; ?>
    <label for="start">Start: </label><input type="number" name="start" min="1950" value="2000" required>
    <label for="ende">Ende: </label><input type="number" name="ende" min="1950" value="2010" required>
    <label for="beschreibung">Beschreibung: </label><input type="text" name="beschreibung" required>
    <input type="submit" value="Absenden">
</form>
