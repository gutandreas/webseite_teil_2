<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Die Webseite für Kaderleute</title>
    <link rel="stylesheet" href="styles/example_style.css">
</head>

<body>
<?php
require_once __DIR__.'/inc/configure.php';
require_once __DIR__.'/inc/nav.php';

$page = $_GET['page'];
$dateipfad = __DIR__ . '/pages/' . $page . ".php";

if (file_exists($dateipfad)){
    include_once $dateipfad;
}
else {
    include_once __DIR__ . '/pages/error.php';
}
?>


