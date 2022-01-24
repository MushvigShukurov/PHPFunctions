<?php
# Author : Shukurov Mushvig
# Massiv daxilindeki 4 hərfli sözləri tapan funksiya
function SearchElement($element){
    $pattern = "#\b[a-zA-ZçÇşŞƏəıİğĞöÖüÜ]{4}\b#ui";
    $result  = preg_match($pattern,$element);
    return $result;
};

$array = ['Salam','Sual','Iki','Fuad','Dörd','Alma'];

$result = array_map("SearchElement",$array);

# Result :
foreach($result as $index=>$status):

    if($status){
        echo $array[$index]."&nbsp;";
    }

endforeach;
// Sual Fuad Dörd Alma 
#  Instagram : mushvigh