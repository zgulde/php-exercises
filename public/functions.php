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

/**
 * redirects to a given url and kills the script
 * @param  string $url the url to redirect to
 */
function redirect($url)
{
    header('Location: ' . $url);
    die();
}

?>
