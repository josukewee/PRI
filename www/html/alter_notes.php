<?php

require_once '../prolog.php';
require INC . '/nav.php';
require INC . '/xmlTools.php';
require INC . '/db.php';


?>
<section class="flex justify-center">
        <?php
        // Display transformed XML content
        $xmlPath = "../xml/notes.xml";
        $xslPath = "../xml/notes.xsl";

        // Perform the transformation
        $transformedContent = xmlTransform($xmlPath, $xslPath);

        if ($transformedContent === false) {
            echo "Transformation failed."; // Handle the failure scenario
        } else {
            // Output the transformed XML content
            echo $transformedContent;
        }
        ?>
</section>