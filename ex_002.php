<?php 
# Author : Shukurov Mushvig
function checkEmail($email)
{
    # html special chars
    $email = htmlspecialchars($email);
    $pattern = "#^[a-zA-Z0-9-_\.]+@[a-z]+(.[a-z0-9]+)?\.[a-z]{2,}(.[a-z0-9]{2})?$#";
    $check   = preg_match($pattern, $email);
    return $check ? 1 : 0;
}
# Instagram : mushvigsh