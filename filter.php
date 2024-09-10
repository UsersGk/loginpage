<?php
function filterInput($data)
{
    $data = rtrim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
