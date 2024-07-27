<?php
function convertToUppercase($str) {
    if (is_string($str) && !empty($str)) {
        $i = 0;
        $result = '';
        while ($i < strlen($str)) {
            $result .= strtoupper($str[$i]);
            $i++;
        }
        return $result;
    } else {
        return "Input harus berupa string tidak boleh kosong.";
    }
}

// Contoh penggunaan
$inputString = "hello, world!";
$uppercaseString = convertToUppercase($inputString);
echo $uppercaseString; // Output: HELLO, WORLD!

$emptyString = "";
$uppercaseEmptyString = convertToUppercase($emptyString);
echo $uppercaseEmptyString; // Output: Input harus berupa string tidak boleh kosong.