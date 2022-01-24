<?php
# Author : Shukurov Mushvig
function AverageNumbers()
{
    $array = func_get_args();
    if(empty($array)){
        return "Enter number";
    }
    $total = 0;
    foreach ($array as $item) {
        if (is_numeric($item)) {
            $total += $item;
        } else {
            return 'Error';
        }
    }
    return ($total / count($array));
}
echo function_exists('AverageNumbers') ? AverageNumbers(5,7,45,9) : 'Function Not Found'; # Result : 16.5
# Instagram : mushvigsh
