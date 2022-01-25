<?php
# IG/mushvigsh 
# Author/Shukurov Mushvig

# Sezar Şifrələmə üçün funksiya :
function AddDelimiter($array)
{
    static $newArray = [];
    foreach ($array as $element) {
        array_push($newArray, ("@$element@"));
    }
    return $newArray;
}
function Cryption($password, $key, $status = 1)
{
    $pattern     = [
        'ə', 'ı', 'ç', 'ş', 'ğ', 'ö', 'ü', "İ", 'Ə', "Ş", "Ç", 'Ğ', 'Ö', 'Ü',
    ];
    $replacement = [
        'e', 'i', 'c', 's', 'g', 'o', 'u', 'I', "E", 'S', "C", "G", "O", "U",
    ];
    $pattern1  = '#[a-zA-Z0-9]#';




    $pattern = AddDelimiter($pattern);

    $password = preg_replace($pattern, $replacement, $password);
    preg_match_all($pattern1, $password, $newText);
    $password = implode('', $newText[0]);
    $newPassword   = '';
    $chLower       = 'a4bcde5fghi6jklmnopqrstuvwxyz0';
    // $chUpper       = strtoupper($chLower);
    $chUpper       = 'AB1CDE2FGHI3JK7LMNOPQR8STUV9WXYZ';
    $numbers       = '';
    $characters    = $chLower . $chUpper;
    $characters    = $characters . $numbers;
    $password      = str_split($password);
    if ($key > count($password)) {
        $key = $key % strlen($characters);
    }
    if ($status === 1) {
        foreach ($password as $value) {
            $position  = strpos($characters, $value);
            if ($position != '') {
                $index     = (int)$position + (int)$key;
                $index = $index - strlen($characters);
                if ($index >= strlen($characters) - 1) {
                    (int)$index = $index - strlen($characters);
                } elseif ($index < 0) {
                    $index = $index + strlen($characters);
                }
                $newChr    = $characters[$index];
            } else {
                $newChr    = $value;
            }
            $newPassword  .= $newChr;
        }
    } else {
        foreach ($password as $value) {
            $position  = strpos($characters, $value);
            if ($position != '') {
                $index     = (int)$position - (int)$key;
                if ($index >= strlen($characters) - 1) {
                    (int)$index = $index - strlen($characters);
                } elseif ($index < 0) {
                    $index = $index + strlen($characters);
                }
                $newChr    = $characters[$index];
            } else {
                $newChr    = $value;
            }
            $newPassword  .= $newChr;
        }
    }
    return $newPassword;
}
# Funksiyanı Çalışdır :

# Şifrələ
echo Cryption("ShukurovMushvig",311,1); # Result : TivlvspwNvtiw6h
# Deşifrə et
echo Cryption("TivlvspwNvtiw6h",311,0); # Result : ShukurovMushvig