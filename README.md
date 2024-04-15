# XML Parser / Formatter

This is a simple XML parser and formatter written in PHP. It is able to parse XML strings and format them in a human-readable way.

## Functions Definition

### `prettyPrintXML`

This function takes an XML string as input and returns an array representation of the XML.

- Params:
  - `$xml` (string): The XML string to be parsed.
- Returns:
  - (string): The formatted XML string with proper indentation.

## Description

This function performs several key operations to format the XML:

1. **Trimming**: Removes any leading and trailing whitespace from the input XML string.
2. **Whitespace Removal**: Uses a regular expression to eliminate whitespace between XML tags, ensuring tags are concatenated without spaces.
3. **Indentation Handling**: Iterates through each character in the XML string, adjusting indentation based on whether the current character represents the start of a tag, the end of a tag, or a self-closing tag.
4. **Output Construction**: Constructs the formatted XML by appending characters and indentation to the result string based on the current state of the parsing process (e.g., inside a tag, between tags).

## Implementation

The function initializes several local variables to manage the parsing state, such as `$indentLevel` for tracking the current level of indentation and `$inTag` to check if the current parsing position is inside a tag.
It uses a loop to process each character in the XML string. Depending on whether the character is a `<`, `>`, or other, the function adjusts the `$indentLevel` and appends the appropriate number of spaces to the result string to maintain correct indentation.

## Example

```php
$xmlInput = file_get_contents("php://stdin");
echo prettyPrintXML($xmlInput);
```

This example reads XML from standard input, formats it using the prettyPrintXML function, and outputs the formatted XML to standard output.

An `input.xml` file has been already provided as an example. If you want to try the script with this file, you can run the following command:

```bash
php example.php < input.xml
```

## Testing

Some simple tests are included in the `PrettyPrintXMLTest` class to verify the correctness of the `prettyPrintXML` function. These tests cover basic XML formatting scenarios, such as nested tags, self-closing tags, and mixed content.

### Setup

To run these tests, install dependencies (PHPUnit) declared in the `composer.json` file:

```bash
composer require --dev phpunit/phpunit
```

### Running Tests

A convenient script in the `composer.json` is provided to run the tests:

```bash
composer test
```
