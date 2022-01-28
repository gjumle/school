<?php
$names = array("Terka", "Petr", "Lukas", "Daniel", "Simon", "Petr", "Karel", "Lukas");

function names_count($arr) {
    $compare = array_unique($arr);
    $ret = array();
    $count = 0;
    foreach ($compare as $i) {
        foreach ($arr as $j) {
            if ($i == $j) {
                $count += 1;
            }
        }
        $ret[] = $count;
        $count = 0;
    }
    return implode(" ", $ret);
}

echo names_count($names);