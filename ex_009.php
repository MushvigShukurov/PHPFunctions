<?php
$birthday = '07-01-2003'; # 7 yanvar 2003

function CalculateAge($birthday){
    $pattern = '#\b[0-9]{4}\b#';
    preg_match_all($pattern,$birthday,$year);
    $year = implode('',$year[0]);
    $now  = date('Y');
    $age = ($now-$year);
    return $age;
}

echo CalculateAge($birthday);