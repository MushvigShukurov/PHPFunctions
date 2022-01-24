<?php
# INstagram : mushvigsh 
$text = '23+3-2*9-(9/3)ş_)(!"№(=-21=-01';
# Text -dəki rəqəm və hərf olmayan simvolları tap
function ChooseChar($text)
{
    $pattern = '/\W/u';
    preg_match_all($pattern,$text,$chars);
    return $chars;
}
echo "<pre>";
print_r(ChooseChar($text));
echo "</pre>";
# Author : Shukurov Mu