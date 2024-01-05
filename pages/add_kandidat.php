<h1>Profil anlegen</h1>
<form method="post" action="server/add_kandidat_server.php">
    <label for="vorname">Vorname:</label> <input type="text" id="vorname" name="vorname" required>
    <label for="nachname">Nachname:</label> <input type="text" id="nachname" name="nachname" required>
    <label for="mail">E-Mail:</label> <input type="email" id="mail" name="mail" required>
    <label for="telefon">Telefon:</label> <input type="tel" id="telefon" name="telefon" required>
    <input type="submit" value="Absenden">
</form>