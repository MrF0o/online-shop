<?php

function findObjectById($id, $array)
{

    foreach ($array as $i => $element) {
        if ($id == $element['id']) {
            return $i;
        }
    }

    return -1;
}
