<?php
require 'prettyPrintXML.php';

// example usage (comment if testing with PHPUnit)
$xmlInput = file_get_contents("php://stdin");
echo prettyPrintXML($xmlInput);