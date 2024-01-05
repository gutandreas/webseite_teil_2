<nav>
    <a href="index.php?page=home">Home</a>
    <a href="index.php?page=kandidatenuebersicht">Kandidatenübersicht</a>
    <a href="index.php?page=suchmaschine">Suchmaschine</a>
    <a href="index.php?page=add_kandidat">Profil anlegen</a>
    <select id="bearbeitenSelect" onchange="redirectToPage()">
        <option value="" disabled selected hidden>Profil bearbeiten...</option>
        <option value="index.php?page=add_vorstellungstext">Vorstellungstext bearbeiten</option>
        <option value="index.php?page=add_foto">Foto hinzufügen</option>
        <option value="index.php?page=add_ausbildung">Ausbildung hinzufügen</option>
        <option value="index.php?page=add_berufserfahrung">Berufserfahrung hinzufügen</option>
        <option value="index.php?page=add_kontakt">Kontakt bearbeiten</option>
        <option value="index.php?page=add_bedingungen">Bedingungen bearbeiten</option>
    </select>
</nav>
<script>
    function redirectToPage() {
        var selectElement = document.getElementById('bearbeitenSelect');
        var selectedValue = selectElement.value;

        if (selectedValue !== '') {
            window.location.href = selectedValue;
        }
    }
</script>
