<?php
$birthDay = '07-01-2003'; # format : gun-ay-il --- 7-yanvar-2021
function CalculateAge($birthDay)
{
    $list = timezone_identifiers_list();
    date_default_timezone_set($list[221]);
    // date_default_timezone_set('Asia/Baku');
    $date = time();
    $birthDay = strtotime($birthDay);
    $age = $date - $birthDay;
    $age = floor($age / (60 * 60 * 24 * 365));
    return $age;
}
# Instagram : mushvigsh
# Author    : Shukurov Mushvig
echo CalculateAge($birthDay);    # Result : 19