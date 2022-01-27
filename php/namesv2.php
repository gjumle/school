<?php
$names = array("Terka", "Petr", "Lukas", "Daniel", "Simon", "Petr", "Karel");

function names_count($arr) {
    $compare = array_unique($arr);
    $i = 0;
    $ret = array();
    $count = 0;
    foreach ($arr as $i) {
        foreach ($compare as $j) {
            if ($i == $j) {
                $count += 1;
            }
        }
        array_push($ret, $count);
        $count = 0;
    }
    return implode(" ", $ret);
}

echo names_count($names);