<?php

function check($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $searched_chars= array('{','}','%');
    $clean_data= str_replace($searched_chars,"",$data);
    return $clean_data;
}

?>