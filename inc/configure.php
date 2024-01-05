<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$umgebung = 1;

if ($umgebung == 1) {
    $db_host = 'localhost';
    $db_user = 'root';
    $db_passwort = '';
    $db_name = 'php-projekt';
} elseif ($umgebung == 2) {
    $db_host = '217.160.10.113';
    $db_user = 'fritzmeier';
    $db_passwort = 't3vLpPxK27oil17f';
    $db_name = 'db_fritzmeier';
}

$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

function getConnection()
{
    global $db_user, $db_passwort, $dsn;
    try {
        $verbindung = new PDO($dsn, $db_user, $db_passwort, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $verbindung;

    } catch (PDOException $e) {

        die("Verbindung fehlgeschlagen: " . $e->getMessage());
    }
}

?>