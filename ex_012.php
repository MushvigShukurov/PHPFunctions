<?php
# Instagram : mushvigsh
# Author / Shukurov Mushvig
function AddDelimiter($array)
{
    static $newArray = [];
    foreach ($array as $element) {
        array_push($newArray, ("@$element@"));
    }
    return $newArray;
}
function PlayFair($alphabet_fn = null, $key_fn = null, $text_fn = null, $status = 0)
{

    $pattern     = [
        'ə', 'ı', 'ç', 'ş', 'ğ', 'ö', 'ü', "İ", 'Ə', "Ş", "Ç", 'Ğ', 'Ö', 'Ü',
    ];
    $replacement = [
        'e', 'i', 'c', 's', 'g', 'o', 'u', 'I', "E", 'S', "C", "G", "O", "U",
    ];
    $pattern1  = '#\w#';

    


    $pattern = AddDelimiter($pattern);

    $key_fn = preg_replace($pattern, $replacement, $key_fn);
    $text_fn = preg_replace($pattern, $replacement, $text_fn);
    preg_match_all($pattern1, $key_fn,$resultKeyFn);
    preg_match_all($pattern1, $text_fn,$resultTextFn);
    $key_fn  = implode('',$resultKeyFn[0]);
    $text_fn = implode('',$resultTextFn[0]);

    $status0 = "empty";
    $status1 = "charts";
    $status2 = ["charts", "bigrams"];
    $status3 = "FullResult";
    switch ($status) {
        case 0:
            $status = $status0;
            break;
        case 1:
            $status = $status1;
            break;
        case 2:
            $status = $status2;
            break;
        case 3:
            $status = $status3;
            break;
        default:
            $status = $status0;
            break;
    }
    $defaultAlphabet  = "ABCDEFGHIKLMNOPQRSTUVWXYZ";
    $defaultKey       = 'Mushvig';
    $defaultText      = 'Shukurov';
    # Author : Mushvig Shukurov
    if ($alphabet_fn == null) {
        $alphabet_fn = $defaultAlphabet;
    }
    if ($key_fn == null) {
        $key_fn = $defaultKey;
    }
    if ($text_fn == null) {
        $text_fn = $defaultText;
    }
    $returnEtKeyi     = $key_fn;
    if ($status != "empty") {
        $alphabet_string = $alphabet_fn;
        $key = $key_fn;
        $soz = $text_fn;
        $soz = strtoupper($soz);
        if (stripos($soz, "J")) {
            $soz = str_replace('J', 'I', $soz);
        }
        $key = strtoupper($key);
        $key = strrev($key);
        $key_array = str_split($key, 1);
        $alphabet_array = str_split($alphabet_string, 1);
        foreach ($key_array as $letter) {
            if (in_array($letter, $alphabet_array)) {
                array_unshift($alphabet_array, $letter);
            }
        }
        $alphabet_array = array_unique($alphabet_array);
        $columnAndRows = array_chunk($alphabet_array, 5);

        $soz_array = str_split($soz, 1);
        $biqramlar = array_chunk($soz_array, 2);
        $newBiqramlar = [];
        foreach ($biqramlar as $biqram) {
            if (count($biqram) !== 2) {
                array_push($biqram, "X");
            }
            if ($biqram[0] === $biqram[1]) {
                $biqram[1] = "X";
            }
            array_push($newBiqramlar, $biqram);
        }
        $newBiqramString = '';
        foreach ($newBiqramlar as $newBiqram) {
            foreach ($newBiqram as $element) {
                $newBiqramString .= $element;
            }
        }

        $newBiqramString_array = str_split($newBiqramString);
        $Biqramindexes = [];
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5; $j++) {
                foreach ($newBiqramString_array as $letter) {
                    if ($columnAndRows[$i][$j] === $letter) {
                        $Biqramindexes[$letter] = [$i, $j];
                    }
                }
            }
        }
        $newBiqramIndexes = [];
        foreach ($newBiqramlar as $newBiqram) {
            foreach ($newBiqram as $elements) {
                array_push($newBiqramIndexes, $Biqramindexes[$elements]);
            }
        }
        $newBiqramIndexes = array_chunk($newBiqramIndexes, 2);
        $endBiqramIndexes = [];
        foreach ($newBiqramIndexes as $biqrams) {
            #setirler
            $firstSetireGore = $biqrams[0][0];
            $secondSetireGore = $biqrams[1][0];

            if ($firstSetireGore == $secondSetireGore) {
                $biqrams[0][1] += 1;
                $biqrams[1][1] += 1;
                if ($biqrams[0][1] > 4) {
                    $biqrams[0][1] -= 5;
                } else if ($biqrams[1][1] > 4) {
                    $biqrams[1][1] -= 5;
                }
            } else {
                # sutunlar
                $first = $biqrams[0][1];
                $second = $biqrams[1][1];
                if ($first != $second) {
                    $biqrams[0][1] = $second;
                    $biqrams[1][1] = $first;
                } else {
                    $biqrams[0][0] += 1;
                    $biqrams[1][0] += 1;
                    if ($biqrams[0][0] > 4) {
                        $biqrams[0][0] -= 5;
                    } else if ($biqrams[1][0] > 4) {
                        $biqrams[1][0] -= 5;
                    }
                }
            }
            foreach ($biqrams as $indexMassiv) {
                array_push($endBiqramIndexes, $indexMassiv);
            }
        }
        $sonSoz = '';
        foreach ($endBiqramIndexes as $indexes) {
            $i = $indexes[0];
            $j = $indexes[1];
            $herf = $columnAndRows[$i][$j];
            $sonSoz .= $herf;
        }
        if ($status == "charts") {
            return $columnAndRows;
        } else if (is_array($status) && $status[0] == "charts" && $status[1] == "bigrams") {
            return [$columnAndRows, $newBiqramString];
        } else if ($status == "FullResult") {
            $desResult = array($columnAndRows, $newBiqramString, $sonSoz, $returnEtKeyi);
            return $desResult;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

$playfair_result = PlayFair(null, null, null, 3);
echo "<pre>";
print_r($playfair_result);