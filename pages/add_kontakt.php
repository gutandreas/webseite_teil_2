<h1>Kontakt bearbeiten</h1>
<form id="kontakt_form" method="post" action="server/add_kontakt_server.php">
    <?php include_once 'inc/select_alle_kandidaten.php'; ?>
    <label for="telefon">Telefon: </label><input type="tel" id="telefon" name="telefon" required>
    <label for="mail">e-Mail: </label><input type="email" id="mail" name="mail" required>
    <input type="submit" value="Absenden">
</form>