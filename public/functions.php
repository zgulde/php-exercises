<?php 

function inputHas($key)
{
    return isset($_REQUEST[$key]);
}
function inputGet($key, $default = '')
{
    return inputHas($key) ? $_REQUEST[$key] : $default;
}
function escape($string)
{
    return htmlspecialchars(strip_tags($string));
}

function redirect($url)
{
    header('Location: ' . $url);
    die();
}

?>