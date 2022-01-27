<?php
$names = array("Terka", "Petr", "Lukas", "Daniel", "Simon");

function name_count($arr) {
    global  $names;
    $i = 0;
    $ret = 0;
    while ($i <= count($arr)-1) {
        if ($arr == $names[$i]) {
            $ret += 1;
        }
    }
    return "Pocet jmen" . $ret;
}

echo name_count($names);