<?php
// každá webová stránka začíná prologem

// --- adresáře ---
define('INC', __DIR__ . '/include');        // include files
define('XML', __DIR__ . '/xml');            // XML files
define('DRINKS', '/var/mixolog/drinks');    // uploaded data

// --- konfigurace stránek ---
define('TITLE', 'Notes');

// kde transformovat XMLs
define('TRANSFORM_SERVER_SIDE', true);

// --- session ---
session_start();  // ze všeho nejdříve začít seanci, pak používat $_SESSION

// jméno přihlášeného uživatele (s prefixem) nebo ''
function getJmeno($prefix = ''): string
{
    $jmeno = @$_SESSION['jmeno'];
    return $jmeno ? "$prefix$jmeno" : '';
}

// nastav nebo smaž jméno přihlášeného uživatele
function setJmeno($jmeno = '')
{
    if ($jmeno)
        $_SESSION['jmeno'] = $jmeno;
    else
        unset($_SESSION['jmeno']);
}

// Je přihlášen uživatel?
function isUser(): bool
{
    return !!getJmeno();
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>
        <?= TITLE ?>
    </title>
</head>

<body>
