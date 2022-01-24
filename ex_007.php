<?php 
# Generate Password
# Instagram : mushvigsh
function GeneratePassword($length,$status=0)
{
    $characters = 'qazwsxedcrfvtgbyhnujmikolp';
    $charUpper  = strtoupper($characters);
    $characters = $charUpper.$characters;
    $numbers    = '0987654321';
    if($status==1){
        $characters .= $numbers;
    }
    $characters = str_shuffle($characters);
    $characters = substr($characters,0,$length);
    return $characters;
}

echo GeneratePassword(5);
# Author : Shukurov Mushvig
