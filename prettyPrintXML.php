<?php
function prettyPrintXML($xml)
{
    $xml = trim($xml);
    $xml = preg_replace('/>\s+</', '><', $xml); // Remove whitespace between tags
    $indentLevel = 0;
    $formattedXML = '';
    $len = strlen($xml);
    $inTag = false;

    for ($i = 0; $i < $len; $i++) {
        $char = $xml[$i];

        if ($char == '<') {
            if ($xml[$i + 1] == '/') {
                // Closing tag
                $indentLevel = max(0, $indentLevel - 1);
                $formattedXML .= "\n" . str_repeat("  ", $indentLevel);
            } else {
                // Opening tag or self-closing tag
                if (!$inTag) {
                    $formattedXML .= "\n" . str_repeat("  ", $indentLevel);
                }
                if ($xml[$i + 1] != '?' && $xml[$i + 1] != '!' && $xml[$i + 1] != '/') {
                    $indentLevel++;
                }
            }
            $inTag = true;
        }

        $formattedXML .= $char;

        if ($char == '>') {
            $inTag = false;
            if ($xml[$i - 1] == '/') {
                // Self-closing tag
                $indentLevel = max(0, $indentLevel - 1);
            }
        }
    }

    return $formattedXML;
}
