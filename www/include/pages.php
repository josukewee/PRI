<?php
// seznam stránek (href => title)
$pages = [
    '/login.php' => 'Přihlášení',
    '/upload.php' => 'Upload',
    '/notes.php' => 'Your notes',
    '/alter_notes.php' => 'Alter notes',
];

// přihlášený uživatel smí nahrávat recepty
if (isUser())
    $pages['/upload.php'] = 'Nahrát';