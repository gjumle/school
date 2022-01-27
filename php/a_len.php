<?php

$a = array(1, 2, 3);
$i = 0;

function a_len($arr) {
    global $i;
    global $a;
    while ($arr[$i]) {
        $i += 1;
        if ($arr[$i] === true) {
            continue;
        }
        else {
            break;
        }
    }
    return $i;
}

echo a_len($a);


