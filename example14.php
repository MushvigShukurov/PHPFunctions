<?php
$massiv = [4, 2, 9,10,1,-8];
for ($i = 0; $i < count($massiv); $i++) {
    $min = $massiv[$i];
    for ($j = $i+1; $j < count($massiv); $j++) {
        if ($massiv[$i] > $massiv[$j]) {
            $min = $massiv[$j];
            $massiv[$j] = $massiv[$i];
            $massiv[$i] = $min;
        }
        
    }
    // echo $massiv[$i]."<br>";
}
# IG/mushvigsh
echo "<pre>";
print_r($massiv);
echo "</pre>";
