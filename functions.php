<?php

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function img($name) {
    global $dirname;
    return $_SERVER['REQUEST_URI'] . "/images/$name";
}