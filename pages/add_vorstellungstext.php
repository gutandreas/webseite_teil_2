<h1>Vorstellungstext ersetzen</h1>
<form method="post" action="server/add_vorstellungstext_server.php">
<?php include_once 'inc/select_alle_kandidaten.php';?>
<label for="vorstellungstext">Beschreibung: </label>
    <textarea id="vorstellungstext" name="vorstellungstext" rows="4" cols="50"></textarea>
<input type="submit" value="Absenden">
</form>