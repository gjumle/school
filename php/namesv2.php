<?php
$names = array("Terka", "Petr", "Lukas", "Daniel", "Simon", "Petr", "Karel", "Lukas");

function names_count($arr) {
    $compare = array_unique($arr);
    $i = 0;
    $ret = array();
    $count = 0;
    $tret = array();
    foreach ($arr as $i) {
        foreach ($compare as $j) {
            if ($i == $j) {
                $count += 1;
            }
        }
        $ret[] = $count;
        $count = 0;
    }
    foreach ($compare as $y) {
        $tret = $compare[$y] . " x " . $ret[$y];
        $y += 1;
    }
    return implode(" ", $tret);
}

echo names_count($names);