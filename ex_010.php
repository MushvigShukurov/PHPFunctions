<?php 
# Massivlərin Kəsişməsi
$massiv_a = [4,78,34,2,1,56];
$massiv_b = [67,6,78,1,56,3];
# IG/mushvigsh
function Intersection($a,$b)
{
    $newMassiv = [];
    if(!is_array($a) || !is_array($b)){
        return 'False';
    } else {
        foreach($a as $item)
        {
            foreach($b as $elem)
            {
                if($item==$elem)
                {
                    array_push($newMassiv,$item);
                }
            }
        }
        return $newMassiv;
    }
}
# Author : Shukurov Mushvig
echo "<pre>";
print_r(Intersection($massiv_a,$massiv_b));
echo "</pre>";
