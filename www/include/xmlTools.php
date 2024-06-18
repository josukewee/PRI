<?php


function get_all_records () {
    $xml = simplexml_load_file('../xml/notes.xml');
    if($validation = xmlValidate('../xml/notes.xml', '../xml/notes.xsd')) {
        echo '<div class="alert alert-success mt-3">Xml is valid!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Xml is not valid!</div>';
    }
    return $xml;
}

function xmlPrintErrors()
{ ?>
    <table>
        <?php foreach (libxml_get_errors() as $error) { ?>
            <tr>
                <td>
                    <?= $error->line ?>
                </td>
                <td>
                    <?= $error->message ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php
}


function xmlValidate($xmlPath, $xsdPath): bool
{
    $doc = new DOMDocument;

    // proběhne kontrola well-formed
    libxml_use_internal_errors(true);
    $doc->loadXML(file_get_contents($xmlPath));
    xmlPrintErrors();
    libxml_use_internal_errors(false);

    // validace
    libxml_use_internal_errors(true);
    $isValid = $doc->schemaValidate($xsdPath);
    xmlPrintErrors();
    libxml_use_internal_errors(false);

    return $isValid;
}


function xmlTransform($xmlPath, $xslPath): false|string
{
    $xml = new DOMDocument;
    $xsl = new DOMDocument;
    $xslt = new XSLTProcessor();

    if (@!$xml->load($xmlPath) || !$xsl->load($xslPath) || !$xslt->importStylesheet($xsl))
        return false;

    return $xslt->transformToXml($xml);
}
?>