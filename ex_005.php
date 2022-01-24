<?php 
# Author : Shukurov Mushvig
# eyni folder daxilindeki butun PHP fayllarinin adini ekrana yazdir
function SearchFiles(){
    $fileNameArray = glob('*.php',GLOB_BRACE);
    return $fileNameArray;
}

foreach(SearchFiles() as $fileName)
{
    echo "<a href='./".$fileName."'>".$fileName."</a><br>";
}
# Instagram : mushvigsh
?>
