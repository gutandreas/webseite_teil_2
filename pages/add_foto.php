<h1>Foto hinzufügen</h1>
<form method="post" action="server/add_foto_server.php" enctype="multipart/form-data">
<?php include_once __DIR__.'/../inc/select_alle_kandidaten.php'; ?>
<label for="foto">Foto: </label><input type="file" id="foto" name="foto" accept="image/*">
<input type="submit" value="Absenden">
</form>
