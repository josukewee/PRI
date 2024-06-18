<?php // přečti a odešli XML soubor s receptem

$note = @$_GET['note'];
$route = "../xml/notes.xml";

header("Content-type: text/xml;");
if (file_exists($route))
    readfile($route);