<?php
require '../prolog.php';
require INC . '/nav.php';
require INC . '/boxes.php';
require INC . '/xmlTools.php';

if (!isUser())
    die;

?>

<script>
    function onSubmit(e) {
        e.preventDefault()
        this.submit()
    }

    document.loginForm.addEventListener('submit', onSubmit)
</script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="bg-light rounded px-4 pt-4 pb-2 mb-4" enctype="multipart/form-data" method="POST">
                <div class="mb-3">
                    <label for="fileInput" class="form-label">Nahrajte recept:</label>
                    <input title="tt" id="fileInput" name="xml" class="form-control" type="file" accept="text/xml" data-max-file-size="2M">
                </div>
                <button class="btn btn-primary" type="submit">Odeslat</button>
            </form>
        </div>
    </div>
</div>

<?php

if (($xmlFile = @$_FILES['xml']) && ($tmpName = @$xmlFile['tmp_name'])) {
    $isValid = xmlValidate($tmpName, XML . '/notes.xsd');
    if (!$isValid) {
        errorBox('XML soubor není validní.');
    } else {
        $target = '../xml/notes.xml';
        if (file_exists($target)) {
            addNotesFromXml($target, $tmpName);
            successBox("OK - Notes updated with new content.");
        } else {
            errorBox('Failed to upload the file.');
            }
        }
    }



// Function to add notes from the uploaded XML file to the existing XML file
function addNotesFromXml($existingFilePath, $newFilePath) {
    // Load the existing XML file
    $existingDoc = new DOMDocument();
    $existingDoc->load($existingFilePath);

    // Load the new XML file
    $newDoc = new DOMDocument();
    $newDoc->load($newFilePath);

    // Get the <notes> element from the existing document
    $existingNotes = $existingDoc->getElementsByTagName('notes')->item(0);

    // Get all <note> elements from the new document
    $newNotes = $newDoc->getElementsByTagName('note');

    // Import and append each new note to the existing notes
    foreach ($newNotes as $newNote) {
        $importedNote = $existingDoc->importNode($newNote, true);
        $existingNotes->appendChild($importedNote);
    }

    // Save the updated XML back to the existing file
    $existingDoc->save($existingFilePath);

    echo "Notes successfully added!";
}
?>
